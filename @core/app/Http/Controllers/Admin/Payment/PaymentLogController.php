<?php

namespace App\Http\Controllers\Admin\Payment;
use App\Helpers\PaymentAction\MidtransAction;
use App\Helpers\PaymentAction\PaymentGatewayActions;
use App\Http\Traits\PaymentOrderIpn;
use App\Order;
use App\OrderProduct;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\VirtualCart;
use DGvai\SSLCommerz\SSLCommerz;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PaymentLogController extends Controller
{

    use PaymentOrderIpn; //Redirect and for update data
    private const BASE_PATH = 'backend.pos.';
    private const SUCCESS_URL = 'admin.order.print';

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private static function back_with_message($message = 'Something went wrong..!'){
        return redirect()->back()->with(FlashMsg::item_delete($message));
    }
    public function cart_order_store(Request $request)
    {

        $manual_pay_con = $request->payment_gateway == 'manual_bank_payment' ? 'required' : 'nullable';
        $cheque_pay_con = $request->payment_gateway == 'cheque' ? 'required' : 'nullable';

        $request->validate([
            'customer_id' => 'required',
            'bill_date' => 'required',
            'product_id' => 'required',
            'manual_payment_attachment' => $manual_pay_con,
            'cheque_number' => $cheque_pay_con,
        ]);


        if(is_null($request->making_full_due)){
            return self::back_with_message(__('Please enter payable amount..!'));
        }

        $gateway = $request->payment_gateway;

           $order = Order::create([
                'bill_date' => $request->bill_date,
                'customer_id' => $request->customer_id,
                'payment_gateway' => $request->payment_gateway,
                'transaction_id' => Str::random(20),
                'status' => 'complete',
                'payment_status' => 'pending',
            ]);

            $making_implode_product_id = implode(',',$request->product_id);
            $making_implode_product_qty = implode(',',$request->single_quantity);
            $explode_pro_id = explode(',',$making_implode_product_id);
            $explode_pro_qty = explode(',',$making_implode_product_qty);

           if(count($explode_pro_id) > 0 && count($explode_pro_qty) > 0 ){
               foreach ($explode_pro_id as $key=> $product_id){

                   $detail = OrderProduct::create([
                       'order_id' => $order->id,
                       'product_id' => $product_id,
                       'single_quantity' => $explode_pro_qty[$key],
                       'total_quantity' => $request->total_quantity,
                       'subtotal' => $request->subtotal,
                       'discount_type' => $request->discount_type,
                       'discount_percentage' => $request->discount_percentage,
                       'discount_amount' => $request->discount_amount,
                       'coupon_discount_type' => $request->coupon_discount_type,
                       'coupon_percentage' => $request->coupon_percentage,
                       'coupon_discount' => $request->coupon_discount,
                       'vat_percentage' => $request->vat_percentage,
                       'vat_amount' => $request->vat_amount,
                       'shipping_amount' => $request->shipping_amount,
                       'payable_amount' => $request->payable_amount,
                       'due_amount' => $request->due_amount,
                       'total_amount' => $request->total_amount,
                   ]);
               }
           }


        VirtualCart::truncate(); //clear all cart data

        if($gateway == 'cash_on_delivery') {
            $order_data = Order::find($order->id);
            $order_data->payment_status = 'complete';
            $order_data->save();

        }else if($gateway == 'manual_bank_payment'){
            $order_data = Order::find($order->id);
            $order_data->status = 'pending';
            $order_data->payment_status = 'pending';
            $order_data->manual_payment_attachment = upload_custom_file($request->manual_payment_attachment);
            $order_data->save();

            $msg = __('Order placed with bank transfer please check the document and confirm the order with changing status..!');
            return redirect()->route('admin.order')->with(FlashMsg::item_new($msg));

        }else if($gateway == 'mollie'){
            try {
                return PaymentGatewayActions::mollie_charge_customer($detail->total_amount,$order->id);
            }catch (\Exception $ex){
                self::back_with_message($ex->getMessage());
            }

        }else if($gateway == 'paytm'){
            $order_data = Order::find($order->id);
            $name = $order_data->customer?->name;
            $email = $order_data->customer?->email;
            $amount =$detail->total_amount;
            $ipn_url = route('admin.order.paytm.ipn');

            try {
                return PaymentGatewayActions::paytm_charge_customer($order->id,$name,$email,$amount,$ipn_url);
            }catch (\Exception $ex){
                self::back_with_message($ex->getMessage());
            }

        }else if($gateway == 'stripe'){
            $amount = $detail->total_amount;
            $ipn_url = route('admin.order.stripe.ipn');
            $cancel_url = route('admin.pos');
            $order_id = $order->id;

            $charge = [];
            try {
                $charge = PaymentGatewayActions::stripe_charge_customer($amount,$ipn_url,$cancel_url,$order_id);
            }catch (\Exception $ex){
                self::back_with_message($ex->getMessage());
            }

            $stripe_data['session_id'] = $charge['id'];
            $stripe_data['order_id'] = $order_id;
            $stripe_data['route'] = $charge['route'];
            return view('backend.payment-gateway-view.stripe')->with('stripe_data', $stripe_data);

        }else if($gateway == 'cheque'){
            $order_item = Order::find($order->id);
            $order_item->status = 'pending';
            $order_item->payment_status = 'pending';
            $order_item->cheque_number = $request->cheque_number;
            $order_item->cheque_payment_note = $request->cheque_payment_note;
            $order_item->save();

            $msg = __('Order placed with cheque, please check the document and confirm the order with changing status..!');
            return redirect()->route('admin.order')->with(FlashMsg::item_new($msg));

        }else if($gateway == 'ssl_commerz'){
            $amt = $detail->total_amount;
            $name = $order->customer?->name;
            $email = $order->customer?->email;
            $order_id = $order->id;

            try {
                return PaymentGatewayActions::ssl_commerz_charge_customer($amt,$name,$email,$order_id);
            }catch (\Exception $ex){
                self::back_with_message($ex->getMessage());
            }
        }else if($gateway == 'midtrans'){
            $amt = $detail->total_amount;
            $order_id = $order->id;
            $ipn_url = route('admin.order.midtrans.ipn');

            try {
                return PaymentGatewayActions::midtrans_charge_customer($order_id,$ipn_url,$amt);
            }catch (\Exception $ex){
                self::back_with_message($ex->getMessage());
            }
        }else if($gateway == 'cashfree'){
            $amt = $detail->total_amount;
            $order_id = $order->id;
            $name = $order->customer?->name;
            $email = $order->customer?->email;
            $ipn_url = route('admin.order.cashfree.ipn');

            try {
                return PaymentGatewayActions::cashfree_charge_customer($order_id,$amt,$name,$email,$ipn_url);
            }catch (\Exception $ex){
                self::back_with_message($ex->getMessage());
            }
        }

        return redirect()->route(self::SUCCESS_URL,$order->id)->with(FlashMsg::item_new('Order Placed Successfully..!'));;
    }

}
