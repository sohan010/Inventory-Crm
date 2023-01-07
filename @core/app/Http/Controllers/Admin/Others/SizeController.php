<?php

namespace App\Http\Controllers\Admin\Others;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Product\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    private const BASE_PATH = 'backend.pages.others.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $all_sizes = Size::select('id','name','status','created_at','size_code')->orderBy('id','desc')->get();
        return view(self::BASE_PATH.'size-settings')->with([
            'all_sizes' => $all_sizes
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string',
            'size_code' => 'required|string'
        ]);

        $country = new Size();
        $country->name = $request->name;
        $country->status = $request->status;
        $country->size_code = $request->size_code;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_new());
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string',
            'size_code' => 'required|string'
        ]);

        $country = Size::find($request->id);
        $country->name = $request->name;
        $country->status = $request->status;
        $country->size_code = $request->size_code;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete(Request $request,$id){
        Size::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        Size::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}
