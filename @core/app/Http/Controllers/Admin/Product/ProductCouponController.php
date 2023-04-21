<?php

namespace App\Http\Controllers\Admin\Product;
use App\Coupon;
use App\Product\ProductCategory;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCouponController extends Controller
{
    private const BASE_PATH = 'backend.product.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_categories = Coupon::orderBy('id','desc')->get();
        return view(self::BASE_PATH.'coupon')->with([
            'all_categories' => $all_categories
        ]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'title' => 'required|string',
            'code' => 'required|string',
            'discount_amount' => 'required|string',
            'discount_type' => 'required|string',
            'max_use_qty' => 'required|string',
            'expire_date' => 'required|string',
            'status' => 'required'
        ]);

        $coupon = new Coupon();
        $this->extracted($request, $coupon);
        return redirect()->back()->with(FlashMsg::item_new());
    }

    public function update(Request $request){

        $this->validate($request,[
            'title' => 'required|string',
            'code' => 'required|string',
            'discount_amount' => 'required|string',
            'discount_type' => 'required|string',
            'max_use_qty' => 'required|string',
            'expire_date' => 'required|string',
            'status' => 'required'
        ]);

        $coupon = Coupon::find($request->id);
        $this->extracted($request, $coupon);

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete($id){
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        Coupon::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function extracted(Request $request, $coupon): void
    {
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->discount_amount = $request->discount_amount;
        $coupon->discount_type = $request->discount_type;
        $coupon->max_use_qty = $request->max_use_qty;
        $coupon->expire_date = $request->expire_date;
        $coupon->status = $request->status;
        $coupon->save();
    }

}
