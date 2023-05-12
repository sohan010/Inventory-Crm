<div class="accordion-wrapper">
    <div id="accordion-payment">
        <div class="card">
            <div class="card-header" id="paypal_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button"
                            data-toggle="collapse"
                            data-target="#paypal_settings_content"
                            aria-expanded="true">
                        <span class="page-title"> {{__('Paypal Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="paypal_settings_content" class="collapse "
                 data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="payment-notice alert alert-warning">
                        <p>{{__('if your currency is not available in paypal, it will convert you currency value to USD value based on your currency exchange rate.')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="paypal_gateway"><strong>{{__('Enable Paypal')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="paypal_gateway"
                                   @if(!empty(get_static_option('paypal_gateway'))) checked
                                   @endif id="paypal_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="paypal_test_mode"><strong>{{__('Enable Test Mode For Paypal')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="paypal_test_mode"
                                   @if(!empty(get_static_option('paypal_test_mode'))) checked @endif >
                            <span class="slider onff"></span>
                        </label>
                    </div>




                    <div class="form-group">
                        <label for="paypal_sandbox_client_id">{{__('Paypal Sandbox Client ID')}}</label>
                        <input type="text" name="paypal_sandbox_client_id"
                               class="form-control"
                               value="{{get_static_option('paypal_sandbox_client_id')}}">
                    </div>
                    <div class="form-group">
                        <label for="paypal_sandbox_client_secret">{{__('Paypal Sandbox Client Secret')}}</label>
                        <input type="text" name="paypal_sandbox_client_secret"
                               class="form-control"
                               value="{{get_static_option('paypal_sandbox_client_secret')}}">
                    </div>

                    <div class="form-group">
                        <label for="paypal_sandbox_app_id">{{__('Paypal Sandbox App ID')}}</label>
                        <input type="text" name="paypal_sandbox_app_id"
                               class="form-control"
                               value="{{get_static_option('paypal_sandbox_app_id')}}">
                    </div>

                    <div class="form-group">
                        <label for="paypal_live_client_id">{{__('Paypal Live Client ID')}}</label>
                        <input type="text" name="paypal_live_client_id"
                               class="form-control"
                               value="{{get_static_option('paypal_live_client_id')}}">
                    </div>
                    <div class="form-group">
                        <label for="paypal_live_client_secret">{{__('Paypal Live Client Secret')}}</label>
                        <input type="text" name="paypal_live_client_secret"
                               class="form-control"
                               value="{{get_static_option('paypal_live_client_secret')}}">
                    </div>


                    <div class="form-group">
                        <label for="paypal_live_app_id">{{__('Paypal Live App ID')}}</label>
                        <input type="text" name="paypal_live_app_id"
                               class="form-control"
                               value="{{get_static_option('paypal_live_app_id')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="paytm_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button"
                            data-toggle="collapse"
                            data-target="#paytm_settings_content"
                            aria-expanded="false">
                        <span class="page-title"> {{__('Paytm Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="paytm_settings_content" class="collapse"
                 data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="form-group">
                        <div class="payment-notice alert alert-warning">

                            <p>{{__('if your currency is not available in paytm, it will convert you currency value to INR value based on your currency exchange rate.')}}</p>
                        </div>
                        <label for="paytm_gateway"><strong>{{__('Enable/Disable Paytm')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="paytm_gateway"
                                   @if(!empty(get_static_option('paytm_gateway'))) checked
                                   @endif id="paytm_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="paytm_test_mode"><strong>{{__('Enable Test Mode For Paytm')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="paytm_test_mode"
                                   @if(!empty(get_static_option('paytm_test_mode'))) checked
                                    @endif >
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="paytm_merchant_key">{{__('Paytm Merchant Key')}}</label>
                        <input type="text" name="paytm_merchant_key" id="paytm_merchant_key" value="{{get_static_option('paytm_merchant_key')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="paytm_merchant_mid">{{__('Paytm Merchant ID')}}</label>
                        <input type="text" name="paytm_merchant_mid" id="paytm_merchant_mid"  value="{{get_static_option('paytm_merchant_mid')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="paytm_merchant_website">{{__('Paytm Merchant Website')}}</label>
                        <input type="text" name="paytm_merchant_website" id="paytm_merchant_website"  value="{{get_static_option('paytm_merchant_website')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="paytm_channel">{{__('Paytm channel')}}</label>
                        <input type="text" name="paytm_channel" value="{{get_static_option('paytm_channel')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="paytm_industry_type">{{__('Paytm Industry Type')}}</label>
                        <input type="text" name="paytm_industry_type" value="{{get_static_option('paytm_industry_type')}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="stripe_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#stripe_settings_content" aria-expanded="false" >
                        <span class="page-title"> {{__('Stripe Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="stripe_settings_content" class="collapse"  data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="payment-notice alert alert-warning">
                    </div>
                    <div class="form-group">
                        <label for="stripe_gateway"><strong>{{__('Enable/Disable Stripe')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="stripe_gateway"  @if(!empty(get_static_option('stripe_gateway'))) checked @endif id="stripe_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="stripe_gateway"><strong>{{__('Enable/Disable Stripe Test Mode')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="stripe_test_mode"  @if(!empty(get_static_option('stripe_test_mode'))) checked @endif id="stripe_test_mode">
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="stripe_public_key">{{__('Stripe Public Key')}}</label>
                        <input type="text" name="stripe_public_key" id="stripe_public_key" value="{{get_static_option('stripe_public_key')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stripe_secret_key">{{__('Stripe Secret')}}</label>
                        <input type="text" name="stripe_secret_key" id="stripe_secret_key"  value="{{get_static_option('stripe_secret_key')}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="razorpay_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#razorpay_settings_content" aria-expanded="false" >
                        <span class="page-title"> {{__('Razorpay Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="razorpay_settings_content" class="collapse"  data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="payment-notice alert alert-warning">
                        <p>{{__("Available Currency For Razorpay is, ['INR']")}}</p>
                        <p>{{__('if your currency is not available in Razorpay, it will convert you currency value to INR value based on your currency exchange rate.')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="razorpay_gateway"><strong>{{__('Enable/Disable Razorpay')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="razorpay_gateway"  @if(!empty(get_static_option('razorpay_gateway'))) checked @endif id="razorpay_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="razorpay_gateway"><strong>{{__('Enable/Disable Razorpay Test Mode')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="razorpay_test_mode"  @if(!empty(get_static_option('razorpay_test_mode'))) checked @endif id="razorpay_test_mode">
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="razorpay_api_key">{{__('Razorpay Key')}}</label>
                        <input type="text" name="razorpay_api_key" id="razorpay_api_key" value="{{get_static_option('razorpay_api_key')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="razorpay_api_secret">{{__('Razorpay Secret')}}</label>
                        <input type="text" name="razorpay_api_secret" id="razorpay_api_secret"  value="{{get_static_option('razorpay_api_secret')}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="paystack_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#paystack_settings_content" aria-expanded="false" >
                        <span class="page-title"> {{__('PayStack Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="paystack_settings_content" class="collapse"  data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="payment-notice alert alert-warning">

                        <p>{{__('if your currency is not available in Paystack, it will convert you currency value to NGN value based on your currency exchange rate.')}}</p>
                    </div>
{{--                    <p class="margin-bottom-30 margin-top-20 info-paragraph">--}}
{{--                        {{__('Don\'t forget to put below url to "Settings > API Key & Webhook > Callback URL" in your paystack admin panel')}}--}}
{{--                        <input type="text" class="info-url" value="{{route('frontend.paystack.ipn')}}">--}}
{{--                    </p>--}}
                    <div class="form-group">
                        <label for="paystack_gateway"><strong>{{__('Enable/Disable PayStack')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="paystack_gateway"  @if(!empty(get_static_option('paystack_gateway'))) checked @endif id="paystack_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="paystack_gateway"><strong>{{__('Enable/Disable PayStack Test Mode')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="paystack_test_mode"  @if(!empty(get_static_option('paystack_test_mode'))) checked @endif id="paystack_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="paystack_public_key">{{__('PayStack Public Key')}}</label>
                        <input type="text" name="paystack_public_key" id="paystack_public_key" value="{{get_static_option('paystack_public_key')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="paystack_secret_key">{{__('PayStack Secret Key')}}</label>
                        <input type="text" name="paystack_secret_key" id="paystack_secret_key"  value="{{get_static_option('paystack_secret_key')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="paystack_merchant_email">{{__('PayStack Merchant Email')}}</label>
                        <input type="text" name="paystack_merchant_email" id="paystack_merchant_email"  value="{{get_static_option('paystack_merchant_email')}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="mollie_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#mollie_settings_content" aria-expanded="false" >
                        <span class="page-title"> {{__('Mollie Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="mollie_settings_content" class="collapse"  data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="payment-notice alert alert-warning">
                        <p>{{__("Available Currency For Mollie is, ['AED','AUD','BGN','BRL','CAD','CHF','CZK','DKK','EUR','GBP','HKD','HRK','HUF','ILS','ISK','JPY','MXN','MYR','NOK','NZD','PHP','PLN','RON','RUB','SEK','SGD','THB','TWD','USD','ZAR']")}}</p>
                        <p>{{__('if your currency is not available in mollie, it will convert you currency value to USD value based on your currency exchange rate.')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="mollie_gateway"><strong>{{__('Enable/Disable Mollie')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="mollie_gateway"  @if(!empty(get_static_option('mollie_gateway'))) checked @endif id="mollie_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="mollie_gateway"><strong>{{__('Enable/Disable Mollie Test Mode')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="mollie_test_mode"  @if(!empty(get_static_option('mollie_test_mode'))) checked @endif id="mollie_test_mode">
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="mollie_public_key">{{__('Mollie Public Key')}}</label>
                        <input type="text" name="mollie_public_key" id="mollie_public_key" value="{{get_static_option('mollie_public_key')}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="flluterwave_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#flutterwave_settings_content" aria-expanded="false" >
                        <span class="page-title"> {{__('Flutterwave Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="flutterwave_settings_content" class="collapse"  data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="payment-notice alert alert-warning">
                        <p>{{__("Available Currency For Flutterwave is, ['BIF','CAD','CDF','CVE','EUR','GBP','GHS','GMD','GNF','KES','LRD','MWK','MZN','NGN','RWF','SLL','STD','TZS','UGX','USD','XAF','XOF','ZMK','ZMW','ZWD']")}}</p>
                        <p>{{__('if your currency is not available in flutterwave, it will convert you currency value to USD value based on your currency exchange rate.')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="flutterwave_gateway"><strong>{{__('Enable/Disable Flutterwave')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="flutterwave_gateway"  @if(!empty(get_static_option('flutterwave_gateway'))) checked @endif id="flutterwave_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="flutterwave_test_mode"><strong>{{__('Enable Test Mode Flutterwave')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="flutterwave_test_mode" @if(!empty(get_static_option('flutterwave_test_mode'))) checked @endif>
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="flutterwave_preview_logo"><strong>{{__('Flutterwave Logo')}}</strong></label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap">
                                @php
                                    $mollie_img = get_attachment_image_by_id(get_static_option('flutterwave_preview_logo'),null,true);
                                    $mollie_image_btn_label = __('Upload Image');
                                @endphp
                                @if (!empty($mollie_img))
                                    <div class="attachment-preview">
                                        <div class="thumbnail">
                                            <div class="centered">
                                                <img class="avatar user-thumb" src="{{$mollie_img['img_url']}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    @php  $mollie_image_btn_label = __('Change Image'); @endphp
                                @endif
                            </div>
                            <input type="hidden" id="flutterwave_preview_logo" name="flutterwave_preview_logo" value="{{get_static_option('flutterwave_preview_logo')}}">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                {{__($mollie_image_btn_label)}}
                            </button>
                        </div>
                        <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="flw_public_key">{{__('Flutterwave Public Key')}}</label>
                        <input type="text" name="flw_public_key" id="flw_public_key" value="{{get_static_option('flw_public_key')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="flw_secret_key">{{__('Flutterwave Secret Key')}}</label>
                        <input type="text" name="flw_secret_key" id="flw_secret_key" value="{{get_static_option('flw_secret_key')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="flw_secret_hash">{{__('Flutterwave Secret Hash')}}</label>
                        <input type="text" name="flw_secret_hash" id="flw_secret_hash" value="{{get_static_option('flw_secret_hash')}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="midtrans_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#midtrans_settings_content" aria-expanded="false" >
                        <span class="page-title"> {{__('MIdtranse Settings')}}</span>
                    </button>
                </h5>
            </div>

            <div id="midtrans_settings_content" class="collapse"  data-parent="#accordion-payment">
                <div class="card-body">

                    <div class="form-group">
                        <label for="flutterwave_gateway"><strong>{{__('Enable/Disable Flutterwave')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="midtrans_gateway"  @if(!empty(get_static_option('midtrans_gateway'))) checked @endif id="flutterwave_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="midtrans_test_mode"><strong>{{__('Enable Test Mode Midtranse')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="midtrans_test_mode" @if(!empty(get_static_option('midtrans_test_mode'))) checked @endif>
                            <span class="slider onff"></span>
                        </label>
                    </div>


                    <div class="form-group">
                        <label for="midtrans_preview_logo"><strong>{{__('Midtranse Logo')}}</strong></label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap">
                                @php
                                    $midtrans_img = get_attachment_image_by_id(get_static_option('midtrans_preview_logo'),null,true);
                                    $midtrans_image_btn_label = __('Upload Image');
                                @endphp
                                @if (!empty($midtrans_img))
                                    <div class="attachment-preview">
                                        <div class="thumbnail">
                                            <div class="centered">
                                                <img class="avatar user-thumb" src="{{$midtrans_img['img_url']}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    @php  $midtrans_image_btn_label = __('Change Image'); @endphp
                                @endif
                            </div>
                            <input type="hidden" id="midtrans_preview_logo" name="midtrans_preview_logo" value="{{get_static_option('midtrans_preview_logo')}}">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                {{__($mollie_image_btn_label)}}
                            </button>
                        </div>
                        <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="midtrans_merchant_id">{{__('Midtranse Merchant ID')}}</label>
                        <input type="text" name="midtrans_merchant_id" id="midtrans_merchant_id" value="{{get_static_option('midtrans_merchant_id')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="midtrans_server_key">{{__('Midtranse Server Key')}}</label>
                        <input type="text" name="midtrans_server_key" id="midtrans_server_key" value="{{get_static_option('midtrans_server_key')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="midtrans_client_key">{{__('Midtranse Client Key')}}</label>
                        <input type="text" name="midtrans_client_key" id="midtrans_client_key" value="{{get_static_option('midtrans_client_key')}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="cashfree_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cashfree_settings_content" aria-expanded="false" >
                        <span class="page-title"> {{__('Cashfree Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="cashfree_settings_content" class="collapse"  data-parent="#accordion-payment">
                <div class="card-body">

                    <div class="form-group">
                        <label for="cashfree_gateway"><strong>{{__('Enable/Disable Cashfree')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="cashfree_gateway"  @if(!empty(get_static_option('cashfree_gateway'))) checked @endif id="cashfree_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="cashfree_test_mode"><strong>{{__('Enable Test Mode Cashfree')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="cashfree_test_mode" @if(!empty(get_static_option('cashfree_test_mode'))) checked @endif>
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="cashfree_app_id">{{__('Cashfree App ID')}}</label>
                        <input type="text" name="cashfree_app_id" id="cashfree_app_id" value="{{get_static_option('cashfree_app_id')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cashfree_secret_key">{{__('Cashfree Secret Key')}}</label>
                        <input type="text" name="cashfree_secret_key" id="cashfree_secret_key" value="{{get_static_option('cashfree_secret_key')}}" class="form-control">
                    </div>


                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="instamojo_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#instamojo_settings_content" aria-expanded="false" >
                        <span class="page-title"> {{__('Instamojo Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="instamojo_settings_content" class="collapse"  data-parent="#accordion-payment">
                <div class="card-body">

                    <div class="form-group">
                        <label for="instamojo_gateway"><strong>{{__('Enable/Disable Instamojo')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="instamojo_gateway"  @if(!empty(get_static_option('instamojo_gateway'))) checked @endif id="instamojo_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="instamojo_test_mode"><strong>{{__('Enable Test Mode Instamojo')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="instamojo_test_mode" @if(!empty(get_static_option('instamojo_test_mode'))) checked @endif>
                            <span class="slider onff"></span>
                        </label>
                    </div>


                    <div class="form-group">
                        <label for="instamojo_client_id">{{__('Instamojo Client ID')}}</label>
                        <input type="text" name="instamojo_client_id" id="instamojo_client_id" value="{{get_static_option('instamojo_client_id')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="instamojo_client_secret">{{__('Instamojo Client Secret')}}</label>
                        <input type="text" name="instamojo_client_secret" id="instamojo_client_secret" value="{{get_static_option('instamojo_client_secret')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="instamojo_username">{{__('Instamojo Username')}}</label>
                        <input type="text" name="instamojo_username" id="instamojo_username" value="{{get_static_option('instamojo_username')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="instamojo_password">{{__('Instamojo Password')}}</label>
                        <input type="text" name="instamojo_password" id="instamojo_password" value="{{get_static_option('instamojo_password')}}" class="form-control">
                    </div>

                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header" id="zitopay_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button"
                            data-toggle="collapse"
                            data-target="#zitopay_settings_content"
                            aria-expanded="false">
                        <span class="page-title"> {{__('Zitopay Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="zitopay_settings_content" class="collapse"
                 data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="form-group">
                        <div class="payment-notice alert alert-warning">
                            <p>{{__('if your currency is not available in Zitopay, it will convert you currency value to INR value based on your currency exchange rate.')}}</p>
                        </div>
                        <label for="paytm_gateway"><strong>{{__('Enable/Disable Zitopay')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="zitopay_gateway"
                                   @if(!empty(get_static_option('zitopay_gateway'))) checked
                                   @endif id="zitopay_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="paytm_test_mode"><strong>{{__('Enable Test Mode For Zitopay')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="zitopay_test_mode"
                                   @if(!empty(get_static_option('zitopay_test_mode'))) checked
                                    @endif >
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="paytm_merchant_key">{{__('Zitopay Username')}}</label>
                        <input type="text" name="zitopay_username" id="zitopay_username" value="{{get_static_option('zitopay_username')}}" class="form-control">
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="ssl_commerz_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button"
                            data-toggle="collapse"
                            data-target="#ssl_commerz_settings_content"
                            aria-expanded="false">
                        <span class="page-title"> {{__('SSLCommerz Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="ssl_commerz_settings_content" class="collapse"
                 data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="form-group">
                        <div class="payment-notice alert alert-warning">
                            <p>{{__('if your currency is not available in Zitopay, it will convert you currency value to INR value based on your currency exchange rate.')}}</p>
                        </div>
                        <label for="paytm_gateway"><strong>{{__('Enable/Disable SSlCommerz')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="ssl_commerz_gateway"
                                   @if(!empty(get_static_option('ssl_commerz_gateway'))) checked
                                   @endif id="ssl_commerz_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="paytm_test_mode"><strong>{{__('Enable Test Mode For SSlCommerz')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="ssl_commerz_test_mode"
                                   @if(!empty(get_static_option('ssl_commerz_test_mode'))) checked
                                    @endif >
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="paytm_merchant_key">{{__('SSlCommerz Store ID')}}</label>
                        <input type="text" name="ssl_commerz_store_id" id="zitopay_username" value="{{get_static_option('ssl_commerz_store_id')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="paytm_merchant_key">{{__('SSlCommerz Store Password')}}</label>
                        <input type="text" name="ssl_commerz_store_password" id="zitopay_username" value="{{get_static_option('ssl_commerz_store_password')}}" class="form-control">
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="manual_payment_settings">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button"
                            data-toggle="collapse"
                            data-target="#manual_payment_settings_content"
                            aria-expanded="false">
                        <span class="page-title"> {{__('Manual Payment Settings')}}</span>
                    </button>
                </h5>
            </div>
            <div id="manual_payment_settings_content" class="collapse"
                 data-parent="#accordion-payment">
                <div class="card-body">
                    <div class="form-group">
                        <label for="manual_payment_gateway"><strong>{{__('Enable/Disable Manual Payment')}}</strong></label>
                        <label class="switch">
                            <input type="checkbox" name="manual_payment_gateway"
                                   @if(!empty(get_static_option('manual_payment_gateway'))) checked
                                   @endif id="manual_payment_gateway">
                            <span class="slider onff"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="site_manual_payment_name">{{__('Manual Payment Name')}}</label>
                        <input type="text" name="site_manual_payment_name"
                               id="site_manual_payment_name"
                               value="{{get_static_option('site_manual_payment_name')}}"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="site_manual_payment_description">{{__('Manual Payment Description')}}</label>
                        <input type="hidden" name="site_manual_payment_description" value="{{get_static_option('site_manual_payment_description')}}">
                        <div class="summernote" data-content='{{get_static_option('site_manual_payment_description')}}'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>