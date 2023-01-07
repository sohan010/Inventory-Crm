<?php

namespace App\Http\Controllers\Admin\Others;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Product\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    private const BASE_PATH = 'backend.pages.others.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $all_units = Unit::select('id','name','status','created_at')->orderBy('id','desc')->get();
        return view(self::BASE_PATH.'unit-settings')->with([
            'all_units' => $all_units
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        $country = new Unit();
        $country->name = $request->name;
        $country->status = $request->status;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_new());
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        $country = Unit::find($request->id);
        $country->name = $request->name;
        $country->status = $request->status;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete(Request $request,$id){
        Unit::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        Unit::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}
