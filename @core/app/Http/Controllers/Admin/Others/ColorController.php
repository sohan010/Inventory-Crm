<?php

namespace App\Http\Controllers\Admin\Others;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Product\Color;
use App\Product\ProductCategory;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private const BASE_PATH = 'backend.pages.others.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $all_colors = Color::select('id','name','status','color_code')->orderBy('id','desc')->get();
        return view(self::BASE_PATH.'color-settings')->with([
            'all_colors' => $all_colors
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string'
        ]);

        $country = new ProductCategory();
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

        $country = ProductCategory::find($request->id);
        $country->name = $request->name;
        $country->status = $request->status;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete(Request $request,$id){
        ProductCategory::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        ProductCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}
