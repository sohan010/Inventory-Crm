<?php

namespace App\Http\Controllers\Admin\Product;
use App\Actions\ProductAction;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private const BASE_PATH = 'backend.product.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['add', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['update']]);
        $this->middleware('permission:product-delete', ['only' => ['bulk_action', 'delete']]);
    }

    public function index()
    {
        $all_products = Product::latest()->get();
        return view(self::BASE_PATH . 'all-product')->with(['all_products' => $all_products]);
    }

    public function create()
    {
        $all_categories = ProductCategory::select('id', 'name')->get();
        $all_subcategories = PoductSubCategory::select('id', 'name')->get();
        $all_brands = Brand::select('id', 'name')->get();
        $all_units = Unit::select('id', 'name')->get();
        $all_colors = Color::select('id', 'name')->get();
        $all_sizes = Size::select('id', 'name')->get();

        return view(self::BASE_PATH . 'add-new-product', compact('all_categories', 'all_subcategories', 'all_brands', 'all_units', 'all_colors', 'all_sizes'));
    }

    public function store(ProductRequest $request)
    {
        $validated_data = $request->validated();
        $response = ProductAction::execute_store($validated_data);
        return redirect()->back()->with($response);
    }

    public function edit($id)
    {
        $all_categories = ProductCategory::select('id', 'name')->get();
        $all_subcategories = PoductSubCategory::select('id', 'name')->get();
        $all_brands = Brand::select('id', 'name')->get();
        $all_units = Unit::select('id', 'name')->get();
        $all_colors = Color::select('id', 'name')->get();
        $all_sizes = Size::select('id', 'name')->get();
        $product = Product::findOrFail($id);

        return view(self::BASE_PATH . 'edit-product', compact('product','all_categories', 'all_subcategories', 'all_brands', 'all_units', 'all_colors', 'all_sizes'));
    }

    public function clone(Request $request)
    {
        $response = ProductAction::clone_execute($request->id);
        return redirect()->back()->with($response);
    }

    public function update(ProductRequest $request, $id)
    {
        $validated_data = $request->validated();
        $response = ProductAction::update_execute($validated_data, $id);
        return redirect()->back()->with($response);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request)
    {
       $products = Product::whereIn('id', $request->ids)->get();

       foreach ($products as $product){
           $product->delete();
       }

        return response()->json(['status' => 'ok']);
    }

    public function get_subcategory_by_category_ajax(Request $request)
    {
        $category_id = $request->category_id;
        $subcategory = PoductSubCategory::select('id','name')->where('product_category_id',$category_id)->get();

        $markup = '';

    foreach ($subcategory as $cat){
        $id = $cat->id;
        $name = $cat->name;
   $markup.= <<<OPTION
            <option value="{$id}">{$name}</option>  
OPTION;

    }
        return response()->json(['data' => $markup]);
    }

    public function get_product_code_by_ajax()
    {
        $product_code = Str::random(8);
        return response()->json($product_code);
    }


  //  ======================================== TRASH CODE ========================================== //

    public function trash_product_list()
    {
        $all_products = Product::onlyTrashed()->get();
        return view(self::BASE_PATH . 'all-trash')->with(['all_products' => $all_products]);
    }

    public function trash_product_restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->restore();
        return redirect()->back()->with(FlashMsg::item_update(__('Item Restored Successfully..')));
    }

    public function trash_product_delete($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->colors()?->detach();
        $product->sizes()?->detach();
        $product->forceDelete();

        return redirect()->back()->with(FlashMsg::item_update(__('Item Restored Successfully..')));
    }

    public function trash_product_bulk_action(Request $request)
    {
        $products = Product::onlyTrashed()->whereIn('id', $request->ids)->get();

        foreach ($products as $product){
            $product->colors()?->detach();
            $product->sizes()?->detach();
            $product->forceDelete();
        }

        return response()->json(['status' => 'ok']);
    }


}
