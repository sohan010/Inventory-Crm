<?php

namespace App\Http\Controllers\Admin\Product;
use App\Actions\ProductAction;
use App\Product\Product;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    private const BASE_PATH = 'backend.product.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-list|product-create|product-edit|product-delete',['only' => ['index']]);
        $this->middleware('permission:product-create',['only' => ['add','store']]);
        $this->middleware('permission:product-edit',['only' => ['update']]);
        $this->middleware('permission:product-delete',['only' => ['bulk_action','delete']]);
    }

    public function index()
    {
        $all_products = Product::latest()->get();
        return view(self::BASE_PATH.'all-product')->with(['all_products' => $all_products]);
    }

    public function create()
    {

        return view(self::BASE_PATH.'add-new-product');
    }

    public function store(ProductRequest $request)
    {
        $response = ProductAction::execute_store($request);
        return redirect()->back()->with($response);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view(self::BASE_PATH.'edit-product',compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $response = ProductAction::update_execute($request,$id);
        return redirect()->back()->with($response);
    }


    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request)
    {
        Product::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }



}
