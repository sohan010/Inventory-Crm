@extends('backend.admin-master')

@section('site-title')
    {{__('POS')}}
@endsection

@section('page-title')
    {{__('POS')}}
@endsection

@section('style')
    <x-media.css/>
    <x-select2.css/>

    <style>

        .select2-container .select2-selection--single {
            height: 45px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
        }

        .top_right_all_product_btn:hover {
            color: #fff !important;
        }

        a.btn.btn-info.btn-sm.cart_table_icon_button {
            padding: 1px 4px;
        }

        .cart_grand_total_amount{
            font-size: 22px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 80%;
        }


    </style>

@endsection

@section('content')
    <div class="container-fluid pos_page">
        <div class="row">
            <div class="col-lg-12">
                <x-msg.error/>
                <x-msg.success/>
            </div>
            <div class="col-lg-6">
                @php
                    $virtual_cart_toal_amount = \App\VirtualCart::sum('total_price') ?? 0;
                    $count_cart_data = count($all_cart_products);
                @endphp
                <input type="hidden" class="global_subtotal" value="{{ $virtual_cart_toal_amount }}">

                @include('backend.pos.partials.pos-left-section')
            </div>

            <div class="col-lg-6">
                @include('backend.pos.partials.pos-right-section')
            </div>
        </div>
    </div>
@endsection



@section('script')

    @include('backend.popup-modals.pos.add-customer')
    @include('backend.popup-modals.pos.discount')
    @include('backend.popup-modals.pos.coupon')
    @include('backend.popup-modals.pos.vat-tax')
    @include('backend.popup-modals.pos.shipping')
    @include('backend.popup-modals.pos.payable')
    <x-admin-press-datatable.without-butons/>
    <x-select2.js/>

    <script>

//============ Left side js ===========//
        const date = new Date();
        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();
        let currentDate = `${day}-${month}-${year}`;

        $(".bill_date").flatpickr({
            dateFormat: "d-m-Y ",
            defaultDate: currentDate
        });
        $('.select2').select2({
            placeholder: "Select a state",
        });

        $('.available_coupon_group a').tooltip({placement: "bottom"});

        //Cart Footer

            let count_cart_data = '{{$count_cart_data}}';
            if(count_cart_data < 1){
                $('.pos_cart_footer').addClass('d-none')
            }else{
                $('.pos_cart_footer').removeClass('d-none')
            }

            //Global subtotal passing
            let global_subtotal = $('.global_subtotal').val();
            $('.subtotal_amount').val(global_subtotal);

            //Load alll data globally
             fetch_all_cart_data();


        // Fetch all cart data
            function fetch_all_cart_data(){
                $.ajax({
                    url: '{{route('admin.product.fetch.all.cart.data')}}',
                    type: 'get',
                    success: function (data){
                        if(data.count_result < 1){

                            //clear cart modal data
                            $('.discount_amount').val('');
                            $('.coupon_code').val('none');
                            $('.vat_tax').val('none');


                            //clear cart bottom data
                            $('.cart_coupon_amount').text(0);
                            $('.cart_discount_amount').text(0);
                            $('.cart_vat_tax_amount').text(0);
                            $('.cart_shipping_amount').text(0);

                            $('.cart_percentage_show').text('');
                            $('.pos_cart_footer').addClass('d-none')
                        }else{
                            $('.pos_cart_footer').removeClass('d-none')
                        }

                        $('.pos_cart_body').html(data.data);
                        $('.cart_subtotal_amount').text(data.total);

                        $('.cart_coupon_form').find('.subtotal_amount').val(data.total);
                        $('.cart_discount_form').find('.subtotal_amount').val(data.total);
                        $('.vat_tax_form').find('.subtotal_amount').val(data.total);
                        $('.cart_shipping_form').find('.subtotal_amount').val(data.total);

                        //calling discount function
                        let discount_form = $('.cart_discount_form');
                        let discount_type = discount_form.find('.discount_type').val() ?? 'flat';
                        let discount_amount = discount_form.find('.discount_amount').val();
                        let subtotal_amount = discount_form.find('.subtotal_amount').val();
                        discount_amount_action(discount_type,discount_amount,subtotal_amount);

                        //calling coupon function
                        let coupon_form = $('.cart_coupon_form');
                        let coupon_code = coupon_form.find('.coupon_code').val();
                        let subtotal = coupon_form.find('input[name="subtotal_amount"]').val();
                        coupon_action(coupon_form,coupon_code,subtotal);

                        //calling subtotal function
                        let tax_form = $('.vat_tax_form');
                        let sub = tax_form.find('.subtotal_amount').val();
                        let vat = tax_form.find('.vat_tax').val();
                        set_vat_tax(sub,vat);


                        //calling other functions
                        cart_footer_grand_total_calculation();


                        //passing value to main hidden fields
                        let order_form = $('.pos_order_form');
                        order_form.find('.main_product_id').val(data.product_ids);
                        order_form.find('.main_single_quantity').val(data.single_qty);
                        order_form.find('.main_total_quantity').val(data.total_qty);
                        order_form.find('.main_subtotal').val(data.total);

                    },
                    error: function (){

                    }
                });
            }
        // Fetch all cart data


        //discount
            $(document).on('click','.cart_discount_form_submit_button',function(e){
                e.preventDefault();
                let discount_form = $('.cart_discount_form');
                let discount_type = discount_form.find('.discount_type').val() ?? 'flat';
                let discount_amount = discount_form.find('.discount_amount').val();
                let subtotal_amount = discount_form.find('.subtotal_amount').val();
                discount_amount_action(discount_type,discount_amount,subtotal_amount);
            });

            function discount_amount_action(discount_type,discount_amount,subtotal_amount){
                let discount_form = $('.cart_discount_form');
                let error_container = $('.error-container');

                $.ajax({
                    'url' : discount_form.attr('action'),
                    'type': 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        discount_type: discount_type,
                        discount_amount: discount_amount,
                        subtotal_amount: subtotal_amount,
                    },

                    success: function(data){
                        let currency_symbol = '{{ site_currency_symbol() }}';

                        error_container.removeClass('alert alert-danger');
                        error_container.text('');
                        $('.discount_modal_close_button').trigger('click');

                        if(data.discount_type == 'flat'){
                            $('.cart_discount_amount').text('- '+data.amount+currency_symbol);
                            SohanCustom.success_message('Discount Applied with flat ' +data.amount + currency_symbol);
                            $('.cart_discount_percentage_show').text( '');
                        }else if(data.discount_type == 'percentage'){
                            $('.cart_discount_amount').text('- '+data.amount+currency_symbol);
                            SohanCustom.success_message('Discount Applied with ' + data.discount_amount+'%');
                            $('.cart_discount_percentage_show').text( '('+ data.discount_amount+'%' + ')');
                        }else{
                            $('.cart_discount_amount').text(data.amount);
                            $('.cart_discount_percentage_show').text('');
                        }
                        cart_footer_grand_total_calculation();

                        //passing main fields
                        let order_form = $('.pos_order_form');
                        order_form.find('.main_discount_type').val(data.discount_type);
                        order_form.find('.main_discount_percentage').val(data.discount_amount);
                        order_form.find('.main_discount_amount').val(data.amount);

                    },
                    error: function(error){
                        let er = error.responseJSON;
                        error_container.addClass('alert alert-danger');
                        error_container.text(er.errors['discount_amount'][0]);
                    }
                });
            }


  //============ Cart Footer ===========//

        //Add To Cart
        $(document).on('click', '.add_to_cart_btn', function (e) {
            e.preventDefault();

            let product_id = $(this).data('product_id')

            $.ajax({
                url: '{{route('admin.product.add.to.cart.pos')}}',
                type: 'post',
                data: {
                    product_id: product_id,
                    _token: '{{csrf_token()}}'
                },

                success: function (data) {

                    if (data.type == 'max_exceed') {
                        SohanCustom.error_message(data.msg);
                        return;
                    }
                    SohanCustom.success_message('Product Added');
                    fetch_all_cart_data();

                },

                error: function (error) {
                    console.log(error);
                },
            });

        });

        //Plus update To Cart
        $(document).on('click', '.cart_product_plus', function (e) {
            e.preventDefault();
            let id = $(this).data('id')
            let product_id = $(this).data('product_id')
            cart_plus_minus_action(id, product_id, 'plus');
        });

        //Plus update To Cart
        $(document).on('click', '.cart_product_plus', function (e) {
            e.preventDefault();
            let id = $(this).data('id')
            let product_id = $(this).data('product_id')
            cart_plus_minus_action(id, product_id, 'plus');
        });

        //Minus update To Cart
        $(document).on('click', '.cart_product_minus', function (e) {
            e.preventDefault();
            let id = $(this).data('id')
            let product_id = $(this).data('product_id')
            cart_plus_minus_action(id, product_id, 'minus');
        });

        //cart plus minus action
        function cart_plus_minus_action(id, product_id, type) {

            $.ajax({
                url: '{{route('admin.product.add.to.cart.pos.plus.minus')}}',
                type: 'post',
                data: {
                    id: id,
                    type: type,
                    product_id: product_id,
                    _token: '{{csrf_token()}}'
                },

                success: function (data) {

                    if (data.type == 'max_exceed') {
                        SohanCustom.error_message(data.msg);
                        return;
                    }

                    if (data.type == 'min_exceed') {
                        SohanCustom.error_message(data.msg);
                        return;
                    }

                    SohanCustom.success_message('Product Added');
                    fetch_all_cart_data();
                },

                error: function (error) {
                    console.log(error);
                },
            });
        }

        //Cart Item Delete
        $(document).on('click', '.pos_cart_item_delete_btn', function (e) {
            e.preventDefault();

            let cart_id = $(this).data('id')

            $.ajax({
                url: '{{route('admin.product.cart.pos.item.delete')}}',
                type: 'post',
                data: {
                    cart_id: cart_id,
                    _token: '{{csrf_token()}}'
                },

                success: function (data) {
                    SohanCustom.success_message('Item Removed');
                    fetch_all_cart_data();
                },

                error: function (error) {
                    console.log(error);
                },
            });

        });

        //Amount passing for coupon
           $(document).on('click', '.available_coupon_group a', function (e) {
                e.preventDefault();
                let el = $(this);
                let coupon_form = $('.cart_coupon_form');
                let coupon_code = el.data('coupon_code');
                coupon_form.find('input[name="code"]').val(coupon_code);
            });
        //Amount passing for coupon

        //Coupon Set Code
          $(document).on('click', '.cart_coupon_submit_btn', function (e) {
             e.preventDefault();
              let coupon_form = $('.cart_coupon_form');
              let coupon_code = coupon_form.find('.coupon_code').val();
              let subtotal = coupon_form.find('input[name="subtotal_amount"]').val();

              coupon_action(coupon_form,coupon_code,subtotal);
         });
        //Coupon Set Code

        function coupon_action(coupon_form,coupon_code,subtotal){

            let error_container = coupon_form.find('.error-container');

            $.ajax({
                url: coupon_form.attr('action'),
                type: 'post',
                data:{
                    code:coupon_code,
                    subtotal:subtotal,
                    _token:'{{csrf_token()}}'
                },
                success: function (data){

                    if(data.type == 'danger'){
                        error_container.addClass('alert alert-danger');
                        error_container.text(data.msg);
                        return;
                    }

                    let currency_symbol = '{{ site_currency_symbol() }}';

                    error_container.removeClass('alert alert-danger');
                    error_container.text('');
                    $('.cart_coupon_submit_cancel_btn').trigger('click');

                    if(data.discount_type != 'none'){
                        $('.cart_coupon_amount').text('- ' +data.amount+currency_symbol);
                    }else{
                        $('.cart_coupon_amount').text(data.amount);
                    }

                    if(data.discount_type == 'flat'){
                        SohanCustom.success_message('Coupon Applied with flat ' +data.amount + currency_symbol);
                        $('.cart_coupon_percentage_show').text('');
                    }else if(data.discount_type == 'percentage'){
                        $('.cart_coupon_percentage_show').text('('+data.discount_amount+ '%' +')');
                        SohanCustom.success_message('Coupon Applied with ' + data.discount_amount+'%');
                    }else{
                        $('.cart_coupon_percentage_show').text('');
                    }
                    cart_footer_grand_total_calculation();

                    //passing main fields
                    let order_form = $('.pos_order_form');
                    order_form.find('.main_coupon_discount_type').val(data.discount_type);
                    order_form.find('.main_coupon_percentage').val(data.discount_amount);
                    order_form.find('.main_coupon_discount').val(data.amount);

                },
                error: function(error){
                    let er = error.responseJSON;
                    error_container.addClass('alert alert-danger');
                    error_container.text(er.errors['code'][0]);
                }
            });
        }


    //vat tax click section
        $(document).on('click','.cart_vat_tax_submit_button',function(e){
            e.preventDefault();
            let tax_form = $('.vat_tax_form');
            let subtotal = tax_form.find('.subtotal_amount').val();
            let vat = tax_form.find('.vat_tax').val();
            set_vat_tax(subtotal,vat);
        });
    //vat tax click section



        //vat tax store
        function set_vat_tax(subtotal,vat)
        {
            let vat_form = $('.vat_tax_form');

            $.ajax({
                url: vat_form.attr('action'),
                type: 'post',
                data:{
                    _token: '{{ csrf_token() }}',
                    subtotal:subtotal,
                    vat:vat
                },
                success: function (data){

                    let currency_symbol = '{{ site_currency_symbol() }}';

                    vat_form.find('.vat_tax_modal_close_button').trigger('click');


                    if(data.amount != 0){
                        SohanCustom.success_message('Vat Tax Applied ' +data.percentage + currency_symbol);
                        $('.cart_vat_tax_amount').text('+ '+data.amount+currency_symbol);
                        $('.cart_vat_tax_percentage_show').text('('+data.percentage+'%' + ')');
                    }else{
                        $('.cart_vat_tax_percentage_show').text('');
                        $('.cart_vat_tax_amount').text(data.amount);
                    }
                    cart_footer_grand_total_calculation();

                    //passing main fields
                    let order_form = $('.pos_order_form');
                    order_form.find('.main_vat_percentage').val(data.percentage);
                    order_form.find('.main_vat_amount').val(data.amount);

                },
                error: function(error){
                    let er = error.responseJSON;
                }
            });
        }
        //vat tax store


        //Shipping Charge Set Code
        $(document).on('click', '.cart_shipping_form_submit_button', function (e) {
            e.preventDefault();
            let el = $(this);
            let shipping_form = $('.cart_shipping_form');
            let shipping_amount = shipping_form.find('.shipping_amount').val();
            let subtotal = shipping_form.find('input[name="subtotal_amount"]').val();
            let error_container = shipping_form.find('.error-container');

            $.ajax({
                url: shipping_form.attr('action'),
                type: 'post',
                data:{
                    shipping_amount:shipping_amount,
                    subtotal:subtotal,
                    _token:'{{csrf_token()}}'
                },
                success: function (data){

                    let currency_symbol = '{{ site_currency_symbol() }}';

                    error_container.removeClass('alert alert-danger');
                    error_container.text('');
                    $('.shipping_modal_close_button').trigger('click');

                    if(data.is_zero_shipping == false){
                        $('.cart_shipping_amount').text('+ '+data.shipping_amount+currency_symbol);
                        SohanCustom.success_message('Shipping Charge Applied ' +data.shipping_amount + currency_symbol);
                    }else{
                        $('.cart_shipping_amount').text(data.shipping_amount);
                    }

                    cart_footer_grand_total_calculation();

                    //passing main fields
                    let order_form = $('.pos_order_form');
                    order_form.find('.main_shipping_amount').val(data.shipping_amount);

                },
                error: function(error){
                    let er = error.responseJSON;
                    error_container.addClass('alert alert-danger');
                    error_container.text(er.errors['shipping_amount'][0]);
                }
            });
        });

        //shipping zero amount pass
        $(document).on('click', '.shipping_none_btn', function (e) {
            e.preventDefault();
            let el = $(this).data('shipping_none');
            let shipping_form = $('.cart_shipping_form');
             shipping_form.find('.shipping_amount').val(el);
        });


    //Payable Charge Set Code
    $(document).on('click', '.cart_shipping_form_submit_button', function (e) {
        e.preventDefault();
        let payable_form = $('.cart_payable_form');
        let payable_amount = payable_form.find('.payable_amount').val();
        let subtotal = payable_form.find('input[name="subtotal_amount"]').val();
        let error_container = payable_form.find('.error-container');

        $.ajax({
            url: payable_form.attr('action'),
            type: 'post',
            data:{
                payable_amount:payable_amount,
                subtotal:subtotal,
                _token:'{{csrf_token()}}'
            },
            success: function (data){

                let currency_symbol = '{{ site_currency_symbol() }}';

                error_container.removeClass('alert alert-danger');
                error_container.text('');
                $('.payable_modal_close_button').trigger('click');

                if(data.is_zero == false){
                    $('.cart_payable_amount').text(data.payable_amount+currency_symbol);
                }else{
                    $('.cart_payable_amount').text(data.payable_amount);
                }

                cart_footer_grand_total_calculation();

                //passing main fields
                let order_form = $('.pos_order_form');
                order_form.find('.main_payable_amount').val(data.payable_amount);

            },
            error: function(error){
                let er = error.responseJSON;
                error_container.addClass('alert alert-danger');
                error_container.text(er.errors['payable_amount'][0]);
            }
        });
    });

    //Payable zero amount pass
    $(document).on('click', '.payable_none_btn', function (e) {
        e.preventDefault();
        let el = $(this).data('payable_none');
        let payable_form = $('.cart_payable_form');
        payable_form.find('.payable_amount').val(el);
        $('.pos_order_form').find('.main_making_full_due').val('due');
    });


    //Payable passing full amount to value
    $(document).on('click', '.payable_full_amount_btn', function (e) {
        e.preventDefault();
        let grand_total = $('.pos_order_form').find('.main_total_amount').val();
        let payable_form = $('.cart_payable_form');
        payable_form.find('.payable_amount').val(grand_total);
        $('.pos_order_form').find('.main_making_full_due').val('paid');
    });


    //Cart footer grand total calculation
        function cart_footer_grand_total_calculation()
        {
            let discount_amount = $('.cart_discount_amount').text();
            let coupon_amount = $('.cart_coupon_amount').text();
            let vat_tax_amount = $('.cart_vat_tax_amount').text();
            let shipping_amount = $('.cart_shipping_amount').text();
            let payable_amount = $('.cart_payable_amount').text();

            $.ajax({
                url: '{{ route('admin.product.cart.pos.grand.total') }}',
                type: 'get',
                data:{
                    discount_amount:discount_amount,
                    coupon_amount:coupon_amount,
                    vat_tax_amount:vat_tax_amount,
                    shipping_amount:shipping_amount,
                    payable_amount:payable_amount,
                },
                success: function (data){

                    if(data.subtotal < 1){
                        $('.cart_grand_total_amount').load(location.href + ' .cart_grand_total_amount');
                    }

                    if(data.subtotal > 0 && data.zero_alert == true){
                        SohanCustom.error_message('All attribute amount is less then subtotal, Please decrease in options..!' );
                        return;
                    }

                   $('.cart_grand_total_amount').text(data.grand_total+'{{site_currency_symbol()}}');

                    if(data.due_amount != 0){
                        $('.cart_due_amount').text(data.due_amount+'{{site_currency_symbol()}}');
                    }else{
                        $('.cart_due_amount').text(data.due_amount);
                    }


                    //passing main fields
                    let order_form = $('.pos_order_form');
                    order_form.find('.main_payable_amount').val(data.payable_amount);
                    order_form.find('.main_due_amount').val(data.due_amount);
                    order_form.find('.main_total_amount').val(data.grand_total);

                },
                error: function(error){
                    let er = error.responseJSON;
                }
            });
        }

    //Cart footer grand total calculation


    //Customer add code
    $(document).on('click','.customer_submit_btn_from_pos',function(ev){
        ev.preventDefault();

        let form = $('.customer_add_form_pos')
        let error_container = form.find('.error_container');

        let name = form.find('input[name="name"]').val();
        let email = form.find('input[name="email"]').val();
        let phone = form.find('input[name="phone"]').val();
        let address = form.find('input[name="address"]').val();
        let customer_type =  form.find('.customer_type').val();

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: {
                name: name,
                email: email,
                phone: phone,
                address: address,
                customer_type: customer_type,
                _token: '{{csrf_token()}}'
            },

            success: function (data) {

                if(data.type == 'success'){
                    $('.customer_add_form_pos_close_btn').trigger('click');
                    SohanCustom.success_message('New Customer Added');
                    $('.pos_customer_selectbox').html(data.data);
                    form[0].reset();
                }

            },

            error: function (error) {
               let errors = error.responseJSON;
                error_container.html('<div class="alert alert-danger"></div>');

               $.each(errors.errors,function(key,val){
                    error_container.find('.alert.alert-danger').append('<p> '+val+'</p>');
               })
            },
        });

    });


     //Bank transfer payment data show
    $(document).on('change','.payment_gateway_list_pos',function(){
        let el = $(this).val();


        if(el == 'manual_bank_payment'){
            $('.manual_payment_parent').removeClass('d-none');
        }else{
            $('.manual_payment_parent').addClass('d-none');
        }

        if(el == 'cheque'){
            $('.cheque_payment_parent').removeClass('d-none');
        }else{
            $('.cheque_payment_parent').addClass('d-none');
        }
    });



//=========== Left side js ========//





 //=========== Right side js ========//
        $(document).on('click', '.top_right_content_btn', function (e) {
            e.preventDefault();

            let el = $(this);
            let misc_content = el.data('content');

            $.ajax({
                url: '{{ route('admin.pos.get.misc.contents.by.ajax') }}',
                type: 'get',
                data: {misc_content: misc_content},
                success: function (data) {
                    $('.inner_items_from_top_right_container').html(data.markup);
                },
                error: function () {

                }
            });

        });

        $(document).on('click', '.inner_items_from_top_right_container .content_item', function (e) {
            e.preventDefault();

            let el = $(this);
            let misc_content = el.data('content');
            let id = el.data('id');

            $.ajax({
                url: '{{ route('admin.pos.get.products.by.misc.contents.ajax') }}',
                type: 'get',
                data: {id: id, misc_content: misc_content},

                success: function (data) {
                    $('.pos_table_body').html(data);
                },
                error: function () {

                }
            });
        });

        $(document).on('click', '.top_right_all_product_btn', function (e) {
            e.preventDefault();
            $('.inner_items_from_top_right_container').load(location.href + ' .inner_items_from_top_right_container');
            $('#example23').load(location.href + ' #example23');
        });
//=========== Right side js ========//
    </script>
@endsection
