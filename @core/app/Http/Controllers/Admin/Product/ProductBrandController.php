<?php

namespace App\Http\Controllers\Admin\Product;
use App\Product\Brand;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    private const BASE_PATH = 'backend.product.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $all_brands = Brand::select('id','name','status','created_at','image')->orderBy('id','desc')->get();
        return view(self::BASE_PATH.'brand')->with([
            'all_brands' => $all_brands,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string'
        ]);

        $country = new Brand();
        $country->image = $request->image;
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

        $country = Brand::find($request->id);
        $country->image = $request->image;
        $country->name = $request->name;
        $country->status = $request->status;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete($id){
        Brand::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        Brand::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}
