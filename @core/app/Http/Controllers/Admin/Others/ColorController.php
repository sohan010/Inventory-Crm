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

        $all_colors = Color::select('id','name','status','color_code','created_at')->orderBy('id','desc')->get();
        return view(self::BASE_PATH.'color-settings')->with([
            'all_colors' => $all_colors
        ]);
    }

    public function store(Request $request){
       $validated_data =  $this->validate($request,[
            'name' => 'required|string',
            'color_code' => 'required|string',
            'status' => 'required|string'
        ]);

        $country = new Color();
        $country->name =  $validated_data['name'];
        $country->color_code =  $validated_data['color_code'];
        $country->status =  $validated_data['status'];
        $country->save();

        return redirect()->back()->with(FlashMsg::item_new());
    }

    public function update(Request $request){

        $validated_data = $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string',
            'color_code' => 'required|string'
        ]);

        $country = Color::find($request->id);
        $country->name =  $validated_data['name'];
        $country->color_code =  $validated_data['color_code'];
        $country->status =  $validated_data['status'];
        $country->save();

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete(Request $request,$id){
        Color::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        Color::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}
