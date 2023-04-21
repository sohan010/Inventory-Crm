<?php

namespace App\Actions;

use App\Product\Product;
use App\Supplier;
use Illuminate\Support\Str;

class ProductAction
{
    private static $message;

    public function __construct(array $message = [])
    {
        self::$message = $message;
    }

    public static function execute_store($request)
    {
        try {
            $product = new Product();
            self::extracted($request, $product);
            self::$message['type'] = 'success';
            self::$message['msg'] = __('Product Inserted Successfully');

        }catch (\Exception $e){
            self::$message['type'] = 'danger';
            self::$message['msg'] = $e->getMessage();
        }

        return self::$message;
    }


    public static function update_execute($request, $id)
    {
        try {
            $product = Product::find($id);
            self::extracted($request, $product);
            self::$message['type'] = 'success';
            self::$message['msg'] = __('Product Updated Successfully');

        }catch (\Exception $e){
            self::$message['type'] = 'danger';
            self::$message['msg'] = $e->getMessage();
        }

        return self::$message;
    }


    public static function extracted($request, $product): void
    {
        $product->product_name = $request['product_name'];
        $product->product_code = $request['product_code'] ?? Str::random(8);
        $product->product_category_id = $request['product_category_id'];
        $product->product_subcategory_id = $request['product_subcategory_id'];
        $product->brand_id = $request['brand_id'];
        $product->unit_id = $request['unit_id'];
        $product->product_description = $request['product_description'];
        $product->alert_message = $request['alert_message'];
        $product->purchase_price = $request['purchase_price'];
        $product->sale_price = $request['sale_price'];
        $product->quantity = $request['quantity'];
        $product->barcode = $request['barcode'] ?? Str::random(8);
        $product->alert_qty = $request['alert_qty'];
        $product->feature = $request['feature'];
        $product->image = $request['image'];
        $product->status = $request['status'];
        $product->save();

        if(request()->isMethod('post')){
            $product->colors()?->attach($request['product_colors']);
            $product->sizes()?->attach($request['product_sizes']);
        }

        if(request()->isMethod('put')){
            $product->colors()?->sync($request['product_colors']);
            $product->sizes()?->sync($request['product_sizes']);
        }
    }

    public static function clone_execute($id)
    {
        try {

            $product = Product::find($id);

            $clone_product = Product::create([
                'product_code' => $product->product_code,
                'product_name' => $product->product_name,
                'product_category_id' => $product->product_category_id,
                'product_subcategory_id' => $product->product_subcategory_id,
                'brand_id' => $product->brand_id,
                'unit_id' => $product->unit_id,
                'product_description' => $product->product_description,
                'alert_message' => $product->alert_message,
                'purchase_price' => $product->purchase_price,
                'sale_price' => $product->sale_price,
                'quantity' => $product->quantity,
                'barcode' => $product->barcode,
                'alert_qty' => $product->alert_qty,
                'feature' => $product->feature,
                'image' => $product->image,
                'status' => 0,
            ]);

            $clone_product->colors()?->attach($product->colors);
            $clone_product->sizes()?->attach($product->sizes);

            self::$message['type'] = 'success';
            self::$message['msg'] = __('Product Cloned Successfully');

        }catch (\Exception $e){
            self::$message['type'] = 'danger';
            self::$message['msg'] = $e->getMessage();
        }

       return self::$message;
    }

}