<html>
<head>
    {!! load_google_fonts() !!}
    {!! render_favicon_by_id(get_static_option('site_favicon')) !!}
    <title> {{get_static_option('site_title')}}- {{get_static_option('site_tag_line')}}</title>

    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<div class="stripe-payment-wrapper">
    <div class="srtipe-payment-inner-wrapper">
        <input type="hidden" name="order_id" id="order_id_input" value="{{$stripe_data['order_id']}}"/>
        <div class="btn-wrapper">
            <button id="payment_submit_btn"></button>
        </div>
    </div>
</div>



<script>
    // Create a Stripe client
    var stripe = Stripe("{{get_static_option('stripe_public_key')}}");
    var orderID = document.getElementById('order_id_input').value;
    var submitBtn = document.getElementById('payment_submit_btn');

    document.addEventListener('DOMContentLoaded',function (){
        submitBtn.click();
    },false);

    submitBtn.addEventListener('click', function () {
        // Create a new Checkout Session using the server-side endpoint you
        submitBtn.innerText = "{{__('Redirecting..')}}"
        submitBtn.disabled = true;
        let session_id = '{{$stripe_data['session_id']}}';
        return stripe.redirectToCheckout({sessionId: session_id});
    });
</script>
</body>
</html>
