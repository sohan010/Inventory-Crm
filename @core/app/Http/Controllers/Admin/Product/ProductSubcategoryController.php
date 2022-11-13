<?php

namespace App\Http\Controllers\Admin\Product;
use App\Product\PoductSubCategory;
use App\Product\ProductCategory;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductSubcategoryController extends Controller
{
    private const BASE_PATH = 'backend.product.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $all_subcategories = PoductSubCategory::select('id','name','status','created_at','product_category_id')->orderBy('id','desc')->get();
        $all_categories = ProductCategory::select('id','name')->get();
        return view(self::BASE_PATH.'subcategory')->with([
            'all_categories' => $all_categories,
            'all_subcategories' => $all_subcategories,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string'
        ]);

        $country = new PoductSubCategory();
        $country->product_category_id = $request->product_category_id;
        $country->name = $request->name;
        $country->status = $request->status;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_new());
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string'
        ]);

        $country = PoductSubCategory::find($request->id);
        $country->product_category_id = $request->product_category_id;
        $country->name = $request->name;
        $country->status = $request->status;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete(Request $request,$id){
        PoductSubCategory::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        PoductSubCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}
