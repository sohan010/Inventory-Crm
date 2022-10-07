<?php

namespace App\Http\Controllers\Admin\Others;

use App\Country;
use App\Customer;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private const BASE_PATH = 'backend.pages.others.';

    public function __construct(){
        $this->middleware('auth:admin');
    }


    public function index(){
        $all_countries = Country::select('id','name','status','created_at')->get();
        return view(self::BASE_PATH.'country-settings')->with(['all_countries' => $all_countries]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|string',
            'status' => 'required|string'
        ]);

        $country = new Country();
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

        $country = Country::find($request->id);
        $country->name = $request->name;
        $country->status = $request->status;
        $country->save();

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete(Request $request,$id){
        Country::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        Country::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}
