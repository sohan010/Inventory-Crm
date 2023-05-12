<?php

namespace App\Http\Controllers\Admin\Order;
use App\Order;
use App\Product\Brand;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Product\Product;
use Illuminate\Http\Request;
use PDF;

class OrderManageController extends Controller
{
    private const BASE_PATH = 'backend.order.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $all_orders = Order::orderBy('id','desc')->get();
        return view(self::BASE_PATH.'index')->with([
            'all_orders' => $all_orders,
        ]);
    }

    public function view($id){

        $order = Order::findOrFail($id);
        $details = $order->order_details ?? [];

        return view(self::BASE_PATH.'view-details')->with([
            'order' => $order,
            'details' => $details,
        ]);
    }

    public function print($id)
    {
        $order = Order::findOrFail($id);
        return view('backend.invoice.order',compact('order'));
    }

    public function change_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->status = $request->status;
        $order->payment_status = $request->payment_status;
        $order->save();
        return redirect()->back()->with(FlashMsg::item_update(__('Status Changed Successfully..!')));
    }

    public function delete($id){
        $order = Order::find($id);

        if(file_exists('assets/uploads/custom-files/'.$order->manual_payment_attachment) && !is_dir('assets/uploads/custom-files/'.$order->manual_payment_attachment)){
            unlink('assets/uploads/custom-files/'.$order->manual_payment_attachment);
        }

        $order->order_details()?->delete();
        $order->delete();



        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){

        $orders = Order::whereIn('id',$request->ids)->get();

        foreach ($orders as $order){

            if(file_exists('assets/uploads/custom-files/'.$order->manual_payment_attachment) && !is_dir('assets/uploads/custom-files/'.$order->manual_payment_attachment)){
                unlink('assets/uploads/custom-files/'.$order->manual_payment_attachment);
            }

            $order->order_details()?->delete();
            $order->delete();
        }

        return response()->json(['status' => 'ok']);
    }

}
