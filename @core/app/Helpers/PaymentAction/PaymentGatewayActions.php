<?php

namespace App\Helpers\PaymentAction;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use DGvai\SSLCommerz\SSLCommerz;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mollie\Laravel\Facades\Mollie;
use Stripe\Stripe;


class PaymentGatewayActions
{
    public static function mollie_charge_customer($amount,$order_id)
    {
        $mollie = Mollie::api();

        $mollie->setApiKey(env('MOLLIE_KEY'));

        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => get_static_option('site_global_currency'),
                "value" =>  number_format((float) $amount, 2, '.', '')  // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order ".$order_id,
            "redirectUrl" => route('admin.order.mollie.ipn'),
            "metadata" => [
                "order_id" => $order_id,
            ],
        ]);

        $payment = Mollie::api()->payments->get($payment->id);

        Session::put('payment_data',[
            'mollie_payment_id'=> $payment->id,
            'order_id' => $order_id,
        ]);

        return redirect($payment->getCheckoutUrl(), 303);

    }


    public static function paytm_charge_customer($order_id,$name,$email,$amount,$callback_url)
    {
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order' => $order_id,
            'user' => Str::slug($name),
            'mobile_number' => random_int(9999, 99999999),
            'email' => $email,
            'amount' => number_format((float) $amount, 2, '.', ''),
            'callback_url' => $callback_url
        ]);

            Session::put('payment_data',[
                'order_id' => $order_id,
            ]);

        return $payment->receive();
    }


    public static function stripe_charge_customer($amount,$callback_url,$cancel_url,$order_id)
    {
        Stripe::setApiKey(get_static_option('stripe_secret_key'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => get_static_option('site_global_currency'),
                    'product_data' => [
                        'name' => 'Order',
                    ],
                    'unit_amount' => $amount * 100,
                ],
                'quantity' => 1,
                'description' => 'Product order'
            ]],
            'mode' => 'payment',
            'success_url' => $callback_url,
            'cancel_url' => $cancel_url,
        ]);


        session()->put('stripe_session_id', $session->id);
        session()->put('stripe_order_id', $order_id);

        return [
            'id' => $session->id,
            'route' => $callback_url,
        ];
    }

    public static function ssl_commerz_charge_customer($amount,$customer_name,$customer_email,$order_id)
    {
        $sslc = new SSLCommerz();

        $sslc->amount($amount)
            ->trxid('DEMOTRX123')
            ->product('Demo Product Name')
            ->customer($customer_name,$customer_email);

            Session::put('payment_data',[
                'order_id' => $order_id,
            ]);

        return $sslc->make_payment();
    }


    public static function midtrans_charge_customer($order_id,$ipn_url,$amount)
    {
        session()->put('midtrans_log_id',$order_id);
        $order_id =  random_int(12345,99999).$order_id.random_int(12345,99999);

        self::setConfig($ipn_url,$order_id);

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => ceil($amount),
            ),
            "callbacks" => [
                "finish" => $ipn_url
            ]
        );


        session()->put('midtrans_last_order_id',$order_id);
        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            return redirect()->away($paymentUrl);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    private static function setConfig($pn_url,$order_id)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('MIDTRANS_ENVIRONTMENT');
// Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$overrideNotifUrl = $pn_url;
        \Midtrans\Config::$paymentIdempotencyKey = $order_id;
    }


    public static function cashfree_charge_customer($order_id,$amount,$name,$email,$ipn_url)
    {
        $config_data = self::cashfreeSetConfig();
        $order_id =  random_int(12345,99999).$order_id.random_int(12345,99999);

        $postData = array(
            "appId" => $config_data['app_id'],
            "orderId" => $order_id,
            "orderAmount" => round($amount,2),
            "orderCurrency" => "INR",
            "orderNote" => $order_id,
            "customerName" => $name,
            "customerPhone" => random_int(9999999999999,9999999999999),
            "customerEmail" => $email,
            "returnUrl" => $ipn_url,
            "notifyUrl" => null,
        );

        ksort($postData);

        $signatureData = "";
        foreach ( $postData  as $key => $value) {
            $signatureData .= $key . $value;
        }
        $signature = hash_hmac('sha256', $signatureData, $config_data['secret_key'], true);
        $signature = base64_encode($signature);
        $data = [
            'action' => $config_data['action'],
            'app_id' => $config_data['app_id'],
            'order_id' => $order_id,
            'amount' => round($amount,2),
            'currency' => "INR",
            'name' => $name,
            'email' => $email,
            'phone' => random_int(9999999999999,9999999999999),
            'signature' => $signature,
            "return_url" => $ipn_url,
            "notify_url" => null,
        ];
        return view('backend.payment-gateway-view.cashfree',['payment_data' => $data]);
    }

    protected static function cashfreeSetConfig() : array
    {
        return [
            'app_id' => get_static_option('cashfree_app_id'),
            'secret_key' => env('CASHFREE_SECRET_KEY'),
            'order_currency' => 'INR',
            'action' => self::cashfree_get_api_url()
        ];
    }
    public static function cashfree_get_api_url(){
        return env('CASHFREE_TEST_MODE') == 1 ? 'https://test.cashfree.com/billpay/checkout/post/submit' : 'https://www.cashfree.com/checkout/post/submit';
    }



}