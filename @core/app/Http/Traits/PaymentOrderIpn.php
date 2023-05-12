<?php

namespace App\Http\Traits;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Helpers\FlashMsg;
use App\Order;
use DGvai\SSLCommerz\SSLCommerz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mollie\Laravel\Facades\Mollie;
use Stripe\StripeClient;

trait PaymentOrderIpn
{

    public function setEnv($env){
        $this->env = $env;
        return $this;
    }
    /* get environment: true or false */
    private function getEnv(){
        return $this->env;
    }
    public function mollie_ipn()
    {
        $session_data = Session::get('payment_data');
        $payment_id = $session_data['mollie_payment_id'];
        $get_order_id = $session_data['order_id'];

        $order = Order::find($get_order_id) ?? null;
        $payment = Mollie::api()->payments->get($payment_id);

        if ($payment->isPaid()) {
            $order->status = 'complete';
            $order->payment_status = 'complete';
            $order->transaction_id = $payment->id;
            $order->save();

            session()->forget('payment_data');
            return redirect()->route(self::SUCCESS_URL, $order->id)->with(FlashMsg::item_new('Order placed successfully..!'));

        } else {
            return redirect()->route('admin.pos')->with(FlashMsg::item_delete('Payment Canceled or Failed..!'));
        }
    }


    public function paytm_ipn()
    {
        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response();

        $session_data = Session::get('payment_data');
        $get_order_id = $session_data['order_id'];
        $order = Order::find($get_order_id) ?? null;

        if ($transaction->isSuccessful()) {
            $order->status = 'complete';
            $order->payment_status = 'complete';
            $order->transaction_id = $response['TXNID'];
            $order->save();

            session()->forget('payment_data');
            return redirect()->route(self::SUCCESS_URL, $order->id)->with(FlashMsg::item_new('Order placed successfully..!'));

        } else {
            return redirect()->route('admin.pos')->with(FlashMsg::item_delete('Payment Canceled or Failed..!'));
        }

    }


    public function stripe_ipn()
    {
        // TODO: Implement ipn_response() method.
        $stripe_session_id = session()->get('stripe_session_id');
        $stripe_order_id = session()->get('stripe_order_id');
        session()->forget('stripe_session_id');

        $stripe = new StripeClient(
            get_static_option('stripe_secret_key')
        );
        $response = $stripe->checkout->sessions->retrieve($stripe_session_id, []);
        $payment_intent = $response['payment_intent'] ?? '';
        $payment_status = $response['payment_status'] ?? '';

        $order = Order::find($stripe_order_id) ?? null;

        $capture = $stripe->paymentIntents->retrieve($payment_intent);

        if (!empty($payment_status) && $payment_status === 'paid') {
            $transaction_id = $capture !== null && isset($capture['charges']['data'][0]) ? $capture['charges']['data'][0]['balance_transaction'] : '';
            if (!empty($transaction_id)) {
                $order->status = 'complete';
                $order->payment_status = 'complete';
                $order->transaction_id = $response['TXNID'];
                $order->save();

                return redirect()->route(self::SUCCESS_URL, $order->id)->with(FlashMsg::item_new('Order placed successfully..!'));
            }
        } else {
            return redirect()->route('admin.pos')->with(FlashMsg::item_delete('Payment Canceled or Failed..!'));
        }

    }

    public function ssl_commerz_success(Request $request)
    {
        $validate = SSLCommerz::validate_payment($request);

        $session_data = Session::get('payment_data');
        $get_order_id = $session_data['order_id'];
        $order = Order::find($get_order_id) ?? null;

        if ($validate) {
            $order->status = 'complete';
            $order->payment_status = 'complete';
            $order->transaction_id = Str::random(12);
            $order->save();

            session()->forget('payment_data');
            return redirect()->route(self::SUCCESS_URL, $order->id)->with(FlashMsg::item_new('Order placed successfully..!'));

        }
    }

    public function ssl_commerz_failed()
    {
        return redirect()->route('admin.pos')->with(FlashMsg::item_delete('Payment Canceled or Failed..!'));
    }

    public function midtrans_ipn()
    {

        $midtrans_last_order_id = session()->get('midtrans_last_order_id');
        $midtrans_log_id = session()->get('midtrans_log_id');

        session()->forget('midtrans_last_order_id');
        if (empty($midtrans_last_order_id)){
            abort(405,'midtrans order missing');
        }
        if ($midtrans_last_order_id !== request()->get('order_id')){
            abort(403);
        }

        $this->setConfig(route('admin.order.midtrans.ipn'),$midtrans_last_order_id);

        $status = \Midtrans\Transaction::status($midtrans_last_order_id);
        $status_message = Str::contains($status->status_message,['Success']);

        $order = Order::find($midtrans_log_id) ?? null;

        if (in_array($status->transaction_status,  ['settlement','capture']) && $status->fraud_status === 'accept' && $status_message ){

            $order->status = 'complete';
            $order->payment_status = 'complete';
            $order->transaction_id = $status->transaction_id;
            $order->save();

            session()->forget('midtrans_log_id');
            return redirect()->route(self::SUCCESS_URL, $order->id)->with(FlashMsg::item_new('Order placed successfully..!'));

        }else{
            return redirect()->route('admin.pos')->with(FlashMsg::item_delete('Payment Canceled or Failed..!'));
        }

    }

    private function setConfig($pn_url,$order_id)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$overrideNotifUrl = $pn_url;
        \Midtrans\Config::$paymentIdempotencyKey = $order_id;
    }

    public function cashfree_ipn()
    {
        $config_data = $this->cashfreeSetConfig();
        $secretKey = $config_data['secret_key'];
        $orderId = request()->get('orderId');
        $orderAmount = request()->get('orderAmount');
        $referenceId = request()->get('referenceId');
        $txStatus = request()->get('txStatus');
        $paymentMode = request()->get('paymentMode');
        $txMsg = request()->get('txMsg');
        $txTime = request()->get('txTime');
        $signature = request()->get('signature');

        $data = $orderId . $orderAmount . $referenceId . $txStatus . $paymentMode . $txMsg . $txTime;
        $hash_hmac = hash_hmac('sha256', $data, $secretKey, true);
        $computedSignature = base64_encode($hash_hmac);

        $order_id = substr( request()->get('orderId'),5,-5);
        $order = Order::find($order_id) ?? null;

        if ($computedSignature === $signature && request()->txStatus === 'SUCCESS'){
            $order->status = 'complete';
            $order->payment_status = 'complete';
            $order->transaction_id = request()->referenceId;
            $order->save();

            return redirect()->route(self::SUCCESS_URL, $order->id)->with(FlashMsg::item_new('Order placed successfully..!'));

        }else{
            return redirect()->route('admin.pos')->with(FlashMsg::item_delete('Payment Canceled or Failed..!'));
        }

    }

    protected static function cashfreeSetConfig() : array
    {
        return [
            'app_id' => env('CASHFREE_APP_ID'),
            'secret_key' => env('CASHFREE_SECRET_KEY'),
            'order_currency' => 'INR',
            'action' => self::cashfree_get_api_url()
        ];
    }

    public static function cashfree_get_api_url(){
        return env('CASHFREE_TEST_MODE') == 0 ? 'https://test.cashfree.com/billpay/checkout/post/submit' : 'https://www.cashfree.com/checkout/post/submit';
    }
}
