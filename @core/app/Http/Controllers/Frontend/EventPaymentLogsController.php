<?php

namespace App\Http\Controllers\Frontend;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\EventAttendance;
use App\EventPaymentLogs;
use App\Events;
use App\Events\JobApplication;
use App\Helpers\DonationHelpers;
use App\Http\Controllers\Controller;
use App\Http\Traits\PaytmTrait;
use App\Mail\ContactMessage;
use App\Mail\PaymentSuccess;
use App\Order;
use App\____PaymentGateway\PaymentGatewaySetup;
use App\PaymentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use KingFlamez\Rave\Facades\Rave;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Razorpay\Api\Api;
use Stripe\Charge;
use Mollie\Laravel\Facades\Mollie;
use Stripe\Stripe;
use Unicodeveloper\Paystack\Facades\Paystack;
use Xgenious\Paymentgateway\Facades\XgPaymentGateway;
use function App\Http\Traits\getChecksumFromArray;

class EventPaymentLogsController extends Controller
{
    private const CANCEL_ROUTE = 'frontend.event.payment.cancel';
    private const SUCCESS_ROUTE = 'frontend.event.payment.success';

    const DONATION_SUCCESS_ROUTE = 'frontend.donation.payment.success';
    const DONATION_CANCEL_ROUTE = 'frontend.donation.payment.cancel';

    private const JOB_CANCEL_ROUTE = 'frontend.job.payment.cancel';
    private const JOB_SUCCESS_ROUTE = 'frontend.job.payment.success';

    public function booking_payment_form(Request $request){
        Auth::guard('web')->id();

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'attendance_id' => 'required|string'
        ],
            [
                'name.required' => __('Name field is required'),
                'email.required' => __('Email field is required')
            ]);

        if (!get_static_option('disable_guest_mode_for_event_module') && !auth()->guard('web')->check()){
            return back()->with(['type' => 'warning','msg' => __('login to place an order')]);
        }

        $event_details = EventAttendance::find($request->attendance_id);
        $event_info = Events::find($event_details->event_id);
        $event_payment_details = EventPaymentLogs::where('attendance_id',$request->attendance_id)->first();

        if (!empty($event_info->cost) && $event_info->cost > 0){
            $this->validate($request,[
                'payment_gateway' => 'required|string'
            ],[
                'payment_gateway.required' => __('Select A Payment Method')
            ]);
        }

        if (empty($event_payment_details)){
            $payment_log_id = EventPaymentLogs::create([
                'email' =>  $request->email,
                'name' =>  $request->name,
                'event_name' =>  $event_details->event_name,
                'event_cost' =>  ($event_details->event_cost * $event_details->quantity),
                'package_gateway' =>  $request->payment_gateway,
                'attendance_id' =>  $request->attendance_id,
                'status' =>  'pending',
                'track' =>  Str::random(10). Str::random(10),
            ])->id;
            $event_payment_details = EventPaymentLogs::find($payment_log_id);
        }

        //have to work on below code
        if ($request->payment_gateway === 'paypal'){

            $paypal = $this->getPaypalPay();
            $paypal->setExchangeRate(74);

            $response = $paypal->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.paypal.ipn'))
            );
            session()->put('attendance_id',$event_details->id);
            return redirect()->away($response);

        }elseif ($request->payment_gateway === 'paytm'){
            $exchange_rate = get_static_option('site_usd_to_inr_exchange_rate') ?? 74;

            $paytm = XgPaymentGateway::paytm();
            $paytm->setMerchantId(getenv('PAYTM_MERCHANT_ID'));
            $paytm->setMerchantKey(getenv('PAYTM_MERCHANT_KEY'));
            $paytm->setMerchantWebsite(getenv('PAYTM_MERCHANT_WEBSITE'));
            $paytm->setChannel(getenv('PAYTM_CHANNEL'));
            $paytm->setIndustryType(getenv('PAYTM_INDUSTRY_TYPE'));
            $paytm->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $paytm->setEnv(getenv('PAYTM_ENVIRONMENT'));
            $paytm->setExchangeRate($exchange_rate);

            $response = $paytm->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.paytm.ipn'))
            );
            return $response;

        }elseif ($request->payment_gateway === 'manual_payment'){
            //fire event
            event(new Events\AttendanceBooking([
                'attendance_id' => $request->attendance_id,
                'transaction_id' => $request->trasaction_id
            ]));

            $order_id = Str::random(6).$event_payment_details->attendance_id.Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE,$order_id);

        }elseif ($request->payment_gateway === 'stripe'){

            $stripe = XgPaymentGateway::stripe();
            $stripe->setSecretKey(getenv('STRIPE_SECRET_KEY'));
            $stripe->setPublicKey(getenv('STRIPE_PUBLIC_KEY'));
            $stripe->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $stripe->setEnv(getenv('STRIPE_TEST_MODE'));
            $stripe->setExchangeRate(74);

            $response = $stripe->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.stripe.ipn'))
            );
            return $response;
        }
        elseif ($request->payment_gateway === 'razorpay'){

            $razorpay = XgPaymentGateway::razorpay();
            $razorpay->setApiKey(getenv('RAZORPAY_API_KEY'));
            $razorpay->setApiSecret(getenv('RAZORPAY_API_SECRET'));
            $razorpay->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $razorpay->setEnv(getenv('RAZORPAY_TESTMODE'));
            $razorpay->setExchangeRate(74);

            $redirect_url = $razorpay->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.razorpay.ipn'))
            );
            return $redirect_url;

        }
        elseif ($request->payment_gateway == 'paystack'){

            $paystack = XgPaymentGateway::paystack();
            $paystack->setPublicKey(getenv('PAYSTACK_PUBLIC_KEY'));
            $paystack->setSecretKey(getenv('PAYSTACK_SECRET_KEY'));
            $paystack->setMerchantEmail(getenv('MERCHANT_EMAIL'));
            $paystack->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $paystack->setEnv(getenv('PAYSTACK_TEST_MODE'));
            $paystack->setExchangeRate(74);

            $redirect_url = $paystack->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.paystack.ipn'),'event')
            );
            return $redirect_url;

        }
        elseif ($request->payment_gateway == 'mollie'){

            $mollie = XgPaymentGateway::mollie();
            $mollie->setApiKey(getenv('MOLLIE_KEY'));
            $mollie->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $mollie->setEnv(getenv('MOLLIE_TEST_MODE'));
            $mollie->setExchangeRate(74);

            $response = $mollie->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.mollie.ipn'))
            );
            return $response;

        }elseif ($request->payment_gateway == 'flutterwave'){

            $flutterwave = XgPaymentGateway::flutterwave();
            $flutterwave->setPublicKey(getenv('FLW_PUBLIC_KEY'));
            $flutterwave->setSecretKey(getenv('FLW_SECRET_KEY'));
            $flutterwave->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $flutterwave->setEnv(getenv('FLW_TEST_MODE'));
            $flutterwave->setExchangeRate(74);

            $response = $flutterwave->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.flutterwave.ipn'))
            );
            return $response;

        }elseif ($request->payment_gateway === 'payfast') {

            $payfast = XgPaymentGateway::payfast();
            $payfast->setMerchantId(getenv('PF_MERCHANT_ID'));
            $payfast->setMerchantKey(getenv('PF_MERCHANT_KEY'));
            $payfast->setPassphrase(getenv('PAYFAST_PASSPHRASE'));
            $payfast->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $payfast->setEnv(getenv('PF_MERCHANT_ENV'));
            $payfast->setExchangeRate(74);

            $response = $payfast->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.payfast.ipn'))
            );
            return $response;

        } elseif ($request->payment_gateway === 'midtrans') {

            $midtrans = XgPaymentGateway::midtrans();
            $midtrans->setClientKey(getenv('MIDTRANS_CLIENT_KEY'));
            $midtrans->setServerKey(getenv('MIDTRANS_SERVER_KEY'));
            $midtrans->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $midtrans->setEnv(getenv('MIDTRANS_ENVIRONTMENT'));
            $midtrans->setExchangeRate(74);

            $response = $midtrans->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.midtrans.ipn'))
            );
            return $response;
        }

        elseif ($request->payment_gateway === 'cashfree') {

            $cashfree = XgPaymentGateway::cashfree();
            $cashfree->setAppId(getenv('CASHFREE_APP_ID'));
            $cashfree->setSecretKey(getenv('CASHFREE_SECRET_KEY'));
            $cashfree->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $cashfree->setEnv(getenv('CASHFREE_TEST_MODE'));
            $cashfree->setExchangeRate(74);

            $response = $cashfree->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.cashfree.ipn'))
            );
            return $response;
        }

        elseif ($request->payment_gateway === 'instamojo') {

            $instamojo = XgPaymentGateway::instamojo();
            $instamojo->setClientId(getenv('INSTAMOJO_CLIENT_ID'));
            $instamojo->setSecretKey(getenv('INSTAMOJO_CLIENT_SECRET'));
            $instamojo->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $instamojo->setEnv(getenv('INSTAMOJO_TEST_MODE'));
            $instamojo->setExchangeRate(74);

            $response = $instamojo->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.instamojo.ipn'))
            );
            return $response;
        }

        elseif ($request->payment_gateway === 'marcadopago') {

            $marcadopago = XgPaymentGateway::marcadopago();
            $marcadopago->setClientId(getenv('MERCADO_PAGO_CLIENT_ID'));
            $marcadopago->setClientSecret(getenv('MERCADO_PAGO_CLIENT_SECRET'));
            $marcadopago->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $marcadopago->setExchangeRate(74);
            $marcadopago->setEnv(getenv('MERCADO_PAGO_TEST_MODE'));

            $response = $marcadopago->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.marcadopago.ipn'))
            );
            return $response;
        }

        elseif ($request->payment_gateway === 'squareup') {

            $squareup = XgPaymentGateway::squareup();
            $squareup->setLocationId(getenv('SQUAREUP_LOCATION_ID'));
            $squareup->setAccessToken(getenv('SQUAREUP_ACCESS_TOKEN'));
            $squareup->setApplicationId('12515');
            $squareup->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $squareup->setEnv(getenv('SQUAREUP_ACCESS_TEST_MODE'));
            $squareup->setExchangeRate(74);

            $response = $squareup->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.squreup.ipn'))
            );
            return $response;
        }

        elseif ($request->payment_gateway === 'cinetpay') {

            $cinetpay = XgPaymentGateway::cinetpay();
            $cinetpay->setAppKey(getenv('CINETPAY_API_KEY'));
            $cinetpay->setSiteId(getenv('CINETPAY_SITE_ID'));
            $cinetpay->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $cinetpay->setEnv(getenv('CINETPAY_TEST_MODE'));
            $cinetpay->setExchangeRate(74);

            $response = $cinetpay->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.cinetpay.ipn'))
            );
            return $response;
        }

        elseif ($request->payment_gateway === 'paytabs') {

            $paytabs = XgPaymentGateway::paytabs();
            $paytabs->setProfileId(getenv('PAYTABS_PROFILE_ID'));
            $paytabs->setRegion(getenv('PAYTABS_REGION'));
            $paytabs->setServerKey(getenv('PAYTABS_SERVER_KEY'));
            $paytabs->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $paytabs->setEnv(getenv('PAYTABS_TEST_MODE'));
            $paytabs->setExchangeRate(74);
            dd($paytabs);

            $response = $paytabs->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.paytabs.ipn'))
            );
            return $response;
        }

        elseif ($request->payment_gateway === 'billplz') {

            $billplz = XgPaymentGateway::billplz();
            $billplz->setKey(getenv('BILLPLZ_KEY'));
            $billplz->setVersion(getenv('BILLPLZ_VERSION'));
            $billplz->setXsignature(getenv('BILLPLZ_X_SIGNATURE'));
            $billplz->setCollectionName(getenv('BILLPLZ_COLLECTION_NAME'));
            $billplz->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
            $billplz->setEnv(getenv('BILLPLZ_TEST_MODE'));
            $billplz->setExchangeRate(50);

            $response = $billplz->charge_customer(
                $this->common_charge_customer_data($event_details,$event_payment_details,route('frontend.event.billplz.ipn'))
            );
            return $response;
        }

        return redirect()->route('homepage');
    }


    public function paypal_ipn()
    {
        $paypal = $this->getPaypalPay();
        $payment_data = $paypal->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function paytm_ipn()
    {
        $paytm = XgPaymentGateway::paytm();
        $paytm->setMerchantId(getenv('PAYTM_MERCHANT_ID'));
        $paytm->setMerchantKey(getenv('PAYTM_MERCHANT_KEY'));
        $paytm->setMerchantWebsite(getenv('PAYTM_MERCHANT_WEBSITE'));
        $paytm->setChannel(getenv('PAYTM_CHANNEL'));
        $paytm->setIndustryType(getenv('PAYTM_INDUSTRY_TYPE'));
        $paytm->setEnv(getenv('PAYTM_ENVIRONMENT'));

        $payment_data = $paytm->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function flutterwave_ipn(Request $request)
    {
        $flutterwave = XgPaymentGateway::flutterwave();
        $flutterwave->setPublicKey(getenv('FLW_PUBLIC_KEY'));
        $flutterwave->setSecretKey(getenv('FLW_SECRET_KEY'));
        $flutterwave->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $flutterwave->setEnv(getenv('FLW_TEST_MODE'));

        $payment_data = $flutterwave->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function stripe_ipn(Request $request)
    {
        $stripe = XgPaymentGateway::stripe();
        $stripe->setSecretKey(getenv('STRIPE_SECRET_KEY'));
        $stripe->setPublicKey(getenv('STRIPE_PUBLIC_KEY'));
        $stripe->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $stripe->setEnv(getenv('STRIPE_TEST_MODE'));
        $stripe->setExchangeRate(74);

        $payment_data = $stripe->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function razorpay_ipn(Request $request)
    {
        $razorpay = XgPaymentGateway::razorpay();
        $razorpay->setApiKey(getenv('RAZORPAY_API_KEY'));
        $razorpay->setApiSecret(getenv('RAZORPAY_API_SECRET'));
        $razorpay->setEnv(getenv('RAZORPAY_TESTMODE'));

        $payment_data = $razorpay->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function payfast_ipn(Request $request)
    {
        $payfast = XgPaymentGateway::payfast();
        $payfast->setMerchantId(getenv('PF_MERCHANT_ID'));
        $payfast->setMerchantKey(getenv('PF_MERCHANT_KEY'));
        $payfast->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $payfast->setPassphrase(getenv('PAYFAST_PASSPHRASE'));
        $payfast->setEnv(getenv('PF_MERCHANT_ENV'));

        $payment_data = $payfast->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function mollie_ipn()
    {
        $mollie = XgPaymentGateway::mollie();
        $mollie->setApiKey(getenv('MOLLIE_KEY'));
        $mollie->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $mollie->setEnv(getenv('MOLLIE_TEST_MODE'));
        $mollie->setExchangeRate(74);

        $payment_data = $mollie->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function midtrans_ipn()
    {
        $midtrans = XgPaymentGateway::midtrans();
        $midtrans->setClientKey(getenv('MIDTRANS_CLIENT_KEY'));
        $midtrans->setServerKey(getenv('MIDTRANS_SERVER_KEY'));
        $midtrans->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $midtrans->setEnv(getenv('MIDTRANS_ENVAIRONTMENT'));

        $payment_data = $midtrans->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function cashfree_ipn()
    {
        $cashfree = XgPaymentGateway::cashfree();
        $cashfree->setAppId(getenv('CASHFREE_APP_ID'));
        $cashfree->setSecretKey(getenv('CASHFREE_SECRET_KEY'));
        $cashfree->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $cashfree->setEnv(getenv('CASHFREE_TEST_MODE'));

        $payment_data = $cashfree->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function instamojo_ipn()
    {
        $instamojo = XgPaymentGateway::instamojo();
        $instamojo->setClientId(getenv('INSTAMOJO_CLIENT_ID'));
        $instamojo->setSecretKey(getenv('INSTAMOJO_CLIENT_SECRET'));
        $instamojo->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $instamojo->setEnv(getenv('INSTAMOJO_TEST_MODE'));

        $payment_data = $instamojo->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function marcadopago_ipn()
    {
        $marcadopago = XgPaymentGateway::marcadopago();
        $marcadopago->setClientId(getenv('MERCADO_PAGO_CLIENT_ID'));
        $marcadopago->setClientSecret(getenv('MERCADO_PAGO_CLIENT_SECRET'));
        $marcadopago->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $marcadopago->setEnv(getenv('MERCADO_PAGO_TEST_MODE'));

        $payment_data = $marcadopago->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function squreup_ipn()
    {
        $squareup = XgPaymentGateway::squareup();
        $squareup->setLocationId(getenv('SQUAREUP_LOCATION_ID'));
        $squareup->setAccessToken(getenv('SQUAREUP_ACCESS_TOKEN'));
        $squareup->setApplicationId('');
        $squareup->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $squareup->setEnv(getenv('SQUAREUP_ACCESS_TEST_MODE'));

        $payment_data = $squareup->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function cinetpay_ipn()
    {
        $cinetpay = XgPaymentGateway::cinetpay();
        $cinetpay->setAppKey(getenv('CINETPAY_API_KEY'));
        $cinetpay->setSiteId(getenv('CINETPAY_SITE_ID'));
        $cinetpay->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $cinetpay->setEnv(getenv('CINETPAY_TEST_MODE'));

        $payment_data = $cinetpay->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function paytabs_ipn()
    {
        $paytabs = XgPaymentGateway::paytabs();
        $paytabs->setProfileId(getenv('PAYTABS_PROFILE_ID'));
        $paytabs->setRegion(getenv('PAYTABS_REGION'));
        $paytabs->setServerKey(getenv('PAYTABS_SERVER_KEY'));
        $paytabs->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $paytabs->setEnv(getenv('PAYTABS_TEST_MODE'));

        $payment_data = $paytabs->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function billplz_ipn()
    {
        $billplz = XgPaymentGateway::billplz();
        $billplz->setKey(getenv('BILLPLZ_KEY'));
        $billplz->setVersion(getenv('BILLPLZ_VERSION'));
        $billplz->setXsignature(getenv('BILLPLZ_X_SIGNATURE'));
        $billplz->setCollectionName(getenv('BILLPLZ_COLLECTION_NAME'));
        $billplz->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $billplz->setEnv(getenv('BILLPLZ_TEST_MODE'));

        $payment_data = $billplz->ipn_response();
        return $this->common_ipn_data($payment_data);
    }

    public function getPaypalPay(): \Xgenious\Paymentgateway\Base\Gateways\PaypalPay
    {
        $paypal_client_id = getenv('PAYPAL_SANDBOX_CLIENT_ID') ?? getenv('PAYPAL_LIVE_CLIENT_ID');
        $paypal_client_secret = getenv('PAYPAL_SANDBOX_CLIENT_SECRET') ?? getenv('PAYPAL_LIVE_CLIENT_SECRET');
        $paypal_app_id = getenv('PAYPAL_SANDBOX_APP_ID') ?? getenv('PAYPAL_LIVE_APP_ID');

        $paypal = XgPaymentGateway::paypal();
        $paypal->setClientId($paypal_client_id);
        $paypal->setClientSecret($paypal_client_secret);
        $paypal->setAppId($paypal_app_id);
        $paypal->setCurrency(getenv('SITE_GLOBAL_CURRENCY'));
        $paypal->setEnv(getenv('PAYPAL_MODE'));

        return $paypal;
    }



   private function common_charge_customer_data($event_details,$event_payment_details,$ipn_route,$payment_type = null)
   {
        $data = [
            'amount' =>$event_details->event_cost * $event_details->quantity,
            'title' =>  $event_payment_details->name ?? '',
            'description' => 'Payment For Event Attendance Id: #'.$event_details->id.' Payer Name: '.$event_payment_details->name.' Payer Email:'.$event_payment_details->email,
            'order_id' =>$event_details->id,
            'track' =>  $event_payment_details->track,
            'cancel_url' => route(self::CANCEL_ROUTE, $event_payment_details->attendance_id),
            'success_url' => route(self::SUCCESS_ROUTE, random_int(333333,999999).$event_payment_details->attendance_id.random_int(333333,999999)),
            'email' => $event_payment_details->email,
            'name' => $event_payment_details->name,
            'payment_type' => $payment_type,
            'ipn_url' => $ipn_route
        ];

        return $data;
    }

   private function common_ipn_data($payment_data)
    {
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            event(new Events\AttendanceBooking([
                'attendance_id' => $payment_data['order_id'],
                'transaction_id' => $payment_data['transaction_id']
            ]));
            $order_id = Str::random(6) . $payment_data['order_id']. Str::random(10);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }

        $order_id = Str::random(6) . $payment_data['order_id']. Str::random(10);
        return redirect()->route(self::CANCEL_ROUTE, $order_id);
    }

    private function common_ipn_data_donation($payment_data)
    {
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            event(new Events\DonationSuccess([
                'donation_log_id' => $payment_data['order_id'],
                'transaction_id' => $payment_data['transaction_id'],
            ]));
            $order_id = Str::random(6) . $payment_data['order_id']. Str::random(6);
            return redirect()->route(self::DONATION_SUCCESS_ROUTE, $order_id);
        }
        $order_id = Str::random(6) . $payment_data['order_id']. Str::random(6);
        return redirect()->route(self::DONATION_CANCEL_ROUTE, $order_id);
    }

    public function common_ipn_data_job($payment_data){

        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            event(new JobApplication([
                'transaction_id' => $payment_data['transaction_id'],
                'job_application_id' =>$payment_data['order_id']
            ]));
            $order_id = Str::random(6) . $payment_data['order_id']. Str::random(6);
            return redirect()->route(self::JOB_SUCCESS_ROUTE,$order_id);
        }
        $order_id = Str::random(6) . $payment_data['order_id']. Str::random(6);
        return redirect()->route(self::JOB_CANCEL_ROUTE,$order_id);
    }

}
