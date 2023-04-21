<?php

namespace App\Http\Controllers\Admin\Pos;
use App\Actions\ProductAction;
use App\Coupon;
use App\Customer;
use App\Product\Brand;
use App\Product\Color;
use App\Product\PoductSubCategory;
use App\Product\Product;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product\ProductCategory;
use App\Product\Size;
use App\Product\Unit;
use App\User;
use App\VirtualCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PosController extends Controller
{
    private const BASE_PATH = 'backend.pos.';

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $all_products = Product::where('status',1)->latest()->get();
        $all_cart_products = VirtualCart::where('status',1)->get();
        $all_customers = Customer::select('id','name')->get();

        return view(self::BASE_PATH . 'pos-index')->with([
            'all_products' => $all_products,
            'all_cart_products' => $all_cart_products,
            'all_customers' => $all_customers
        ]);
    }

    public function get_misc_contents_by_ajax(Request $request)
    {
        $request_content = $request->misc_content;
        $categories = ProductCategory::where('status','publish')->orderBy('id','desc')->take(10)->get();
        $subcategories = PoductSubCategory::where('status','publish')->orderBy('id','desc')->take(10)->get();
        $brands = Brand::where('status','publish')->orderBy('id','desc')->take(10)->get();

        $data_markup = '';
        if($request_content == 'category'){
            $data_markup = $this->get_misc_contents_markup($categories,'info',$request_content);
        }
        if($request_content == 'subcategory'){
            $data_markup = $this->get_misc_contents_markup($subcategories,'primary',$request_content);
        }
        if($request_content == 'brand'){
            $data_markup = $this->get_misc_contents_markup($brands,'dark',$request_content);
        }

        return response()->json(['markup' => $data_markup , 'content' => $request_content ]);

    }

    private function get_misc_contents_markup($content_data,$color,$request_content)
    {
        $markup = '';
        foreach ($content_data as $data){
            $id = $data->id;
            $name = $data->name;
            $markup.= <<<ITEM
                    <a href="" class="content_item badge badge-{$color} mx-1 px-2 py-2 mb-2" data-content="{$request_content}" data-id="{$id}">{$name}</a>  
            ITEM;
        }

        return $markup;
    }

    public function get_products_by_misc_contents_ajax(Request $request)
    {
        $request_content = $request->misc_content;
        $id = $request->id;

        $all_products = Product::where('status',1);

        if($request_content == 'category'){
            $all_products = $all_products->where('product_category_id',$id)->get();
        }
        if($request_content == 'subcategory'){
            $all_products = $all_products->where('product_subcategory_id',$id)->get();
        }
        if($request_content == 'brand'){
            $all_products = $all_products->where('brand_id',$id)->get();
        }

        return view(self::BASE_PATH.'render-js-string-blade.misc-products',compact('all_products'))->render();
    }


    public function fetch_all_cart_data()
    {
        $all_cart_products = VirtualCart::where('status',1)->get();
        $cart_total_amount =  VirtualCart::where('status',1)->sum('total_price');

        $all_data = view('backend.pos.partials.js-string-blade.cart-data',compact('all_cart_products'))->render();
        $cart_data = $all_data;
        $count_data = count($all_cart_products);

        return response()->json(['data' => $cart_data,
            'count_result' => $count_data,
            'total' => $cart_total_amount
        ]);
    }

    public function product_add_to_cart_pos(Request $request)
    {
         $product = Product::find($request->product_id);
         $cart = VirtualCart::where('product_id',$request->product_id)->first();

         if(!empty($cart) && $cart->product_id == $request->product_id){

             if($cart->quantity > 4){
                 return response()->json(['type' => 'max_exceed','msg' => __('You can not add above 5 products..!')]);
             }
             $cart->quantity = ($cart->quantity + 1);
             $cart->total_price = ($cart->quantity * $cart->unit_price);
             $cart->save();

         }else{
             VirtualCart::create([
                 'product_id' => $product->id,
                 'product_name' => $product->product_name,
                 'unit_price' => $product->sale_price,
                 'quantity' => 1,
                 'total_price' => $product->sale_price,
             ]);
         }

         return response()->json(['data' => 'ok']);
    }

    public function product_add_to_cart_pos_plus_minus(Request $request)
    {
        if($request->type == 'plus'){

            $cart = VirtualCart::find($request->id);

            if($cart->quantity > 4){
                return response()->json(['type' => 'max_exceed','msg' => __('You can not add above 5 products..!')]);
            }

            $cart->quantity = ($cart->quantity + 1);
            $cart->total_price = ($cart->quantity * $cart->unit_price);
            $cart->save();
        }

        if($request->type == 'minus'){

            $cart = VirtualCart::find($request->id);

            if($cart->quantity < 2){
                return response()->json(['type' => 'min_exceed','msg' => __('Product can not be less then 1 ')]);
            }

            $cart->quantity = ($cart->quantity - 1);
            $cart->total_price = ($cart->quantity * $cart->unit_price);
            $cart->save();
        }

        return response()->json(['data' => 'ok']);
    }


    public function product_pos_item_delete(Request $request)
    {
        $cart_item = VirtualCart::findOrFail($request->cart_id);
        $cart_item->delete();

        return response()->json(['data' => 'ok']);
    }


    public function product_pos_discount_store(Request $request)
    {
        if($request->discount_type != 'none'){
            $request->validate(['discount_amount' => 'required']);
        }

        $discount_type = $request->discount_type;
        $discount_amount = $request->discount_amount;
        $subtotal_amount = $request->subtotal_amount;

        $calculation = 0;
        if($discount_type == 'percentage'){
            $calculation = ($discount_amount / 100) * $subtotal_amount;
        }else if ($discount_type == 'flat'){
            $calculation = $discount_amount;
        }else{
            $calculation = $calculation;
        }

        $get_discount_amount = (int) $calculation;

        return response()->json([
            'amount' => $get_discount_amount,
            'discount_type' => $discount_type,
            'discount_amount' => $discount_amount
        ]);
    }

    public function coupon_discount_store(Request $request)
    {
        $request->validate(['code' => 'required']);

        if($request->code == 'none'){
            return response()->json([
                'amount' => 0,
                'discount_type' => 'none',
            ]);
        }

        $coupon = Coupon::where('code',$request->code)->first();

        if(empty($coupon)){
            return response()->json(['type' => 'danger', 'msg' => 'Invalid Coupon']);
        }

        $discount_type = $coupon->discount_type;
        $discount_amount = $coupon->discount_amount;
        $subtotal_amount = $request->subtotal;

        $calculation = 0;
        if($discount_type == 'percentage'){
            $calculation = ($discount_amount / 100) * $subtotal_amount;
        }else{
            $calculation = $discount_amount;
        }

        $get_discount_amount = (int) $calculation;

        return response()->json([
            'amount' => $get_discount_amount,
            'discount_type' => $discount_type,
            'discount_amount' => $discount_amount
        ]);
    }

    public function vat_tax_store(Request $request)
    {
        $vat = $request->vat;
        $subtotal_amount = $request->subtotal;

        $calculation = 0;
        if($vat == 5){
            $calculation = ($vat / 100) * $subtotal_amount;
        }else if ($vat == 10){
            $calculation = ($vat / 100) * $subtotal_amount;
        }else if ($vat == 15){
            $calculation = ($vat / 100) * $subtotal_amount;
        }else if ($vat == 20){
            $calculation = ($vat / 100) * $subtotal_amount;
        }

        $final_tax_amount = (int) $calculation;

        return response()->json([
            'amount' => $final_tax_amount,
            'percentage' => $vat
        ]);
    }


    public function shipping_store(Request $request)
    {

       $request->validate(['shipping_amount' => 'required']);

        $zero_shipping_condition = false;
       if($request->shipping_amount == 0){
           $zero_shipping_condition = true;
       }

        $shipping_amount = $request->shipping_amount ?? 0;
        $subtotal_amount = $request->subtotal_amount;

        return response()->json([
            'shipping_amount' => $shipping_amount,
            'subtotal_amount' => $subtotal_amount,
            'is_zero_shipping' => $zero_shipping_condition
        ]);
    }

    public function cart_grand_total_calculation(Request $request)
    {
        $subtotal = VirtualCart::sum('total_price');

        $plus_and_dollar = ['+','$'];
        $minus_and_dollar = ['-','$'];
        $replace_array = [' ', ' '];

        $discount_amount = str_replace($minus_and_dollar,$replace_array,$request->discount_amount) ?? 0;
        $coupon_amount = str_replace($minus_and_dollar,$replace_array,$request->coupon_amount) ?? 0;

        $vat_tax_amount = str_replace($plus_and_dollar,$replace_array,$request->vat_tax_amount) ?? 0;
        $shipping_amount = str_replace($plus_and_dollar,$replace_array,$request->shipping_amount) ?? 0;

        $grand_total = ($subtotal-$discount_amount-$coupon_amount);
        $grand_total = $grand_total + ($vat_tax_amount+$shipping_amount);

        if($grand_total < 1){
            return response()->json([
                'subtotal' => $subtotal,
                'zero_alert' => true
            ]);
        }

       return response()->json(['grand_total' =>$grand_total]);
    }

    public function cart_customer_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:customers,id',
            'address' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'customer_type' => 'nullable',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->customer_type = $request->customer_type;
        $customer->save();


      $customers = Customer::select('id','name')->get();
      $data = '';
     foreach ($customers as $customer) {
        $id = $customer->id;
        $name = $customer->name;

   $data.= <<<OPTION
        <option value="{$id}">{$name}</option>
OPTION;
   }

        return response()->json([
           'type'=> 'success',
            'data' => $data
        ]);
    }

}
