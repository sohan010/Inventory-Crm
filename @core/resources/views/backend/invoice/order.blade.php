@extends('backend.admin-master')

@section('site-title')
    {{__('Invoice')}}
@endsection

@section('page-title')
    {{__('Invoice')}}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <x-msg.error/>
            <x-msg.success/>
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="left">
                        <h3 class="card-title">{{__('Invoice')}}</h3>
                    </div>
                    <div class="righ">
                        <a href="{{route('admin.order')}}" class="btn btn-info text-white">{{__('All Orders')}}</a>
                    </div>
                </div>
            </div>
            <div class="card card-body printableArea">


                <h3><b>{{__('INVOICE')}}</b> <span class="pull-right">#{{$order->id}}</span></h3>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <h3> &nbsp;<b class="text-danger">{{ get_static_option('company_name') }}</b></h3>
                                <p class="text-muted m-l-5">{{get_static_option('company_address')}}</p>
                                <p class="text-muted m-l-5">{{get_static_option('company_email')}}</p>
                                <p class="text-muted m-l-5">{{get_static_option('company_phone')}}</p>
                            </address>
                        </div>


                        <div class="pull-right text-right">

                            <address>
                                <h3>To,</h3>
                                <h4 class="font-bold">{{ $order->customer?->name }},</h4>
                                <p class="text-muted m-l-30">{{ $order->customer?->address }}</p>
                                <p class="m-t-30"><b>{{__('Date')}} :</b> {{ $order->bill_date }}</p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-right">Unit Cost</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->order_details ?? [] as $detail)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{$detail->product?->product_name}}</td>
                                        <td class="text-right"> {{ amount_with_currency_symbol($detail->product?->sale_price) }} </td>
                                        <td class="text-right">{{$detail->single_quantity}} </td>
                                        <td class="text-right"> {{ $detail->product?->sale_price * $detail->single_quantity }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">

                            <p style="font-size: 17px; font-weight: bold"> Subtotal: {{ amount_with_currency_symbol($detail->subtotal) }}</p>
                            <p>Discount {{ $detail->discount_type == 'percentage' ? amount_with_percentage($detail->discount_percentage) : '' }} : - {{amount_with_currency_symbol($detail->discount_amount)}} </p>
                            <p>Coupon {{ $detail->coupon_discount_type == 'percentage' ? amount_with_percentage($detail->coupon_percentage) : '' }} : - {{amount_with_currency_symbol($detail->coupon_discount)}} </p>
                            <p>Vat {{ amount_with_percentage($detail->vat_percentage) }} : + {{amount_with_currency_symbol($detail->vat_amount)}} </p>
                            <p>Shipping  : + {{amount_with_currency_symbol($detail->shipping_amount)}}</p>
                            <hr>
                            <h3><b>Total :</b> {{ amount_with_currency_symbol($detail->total_amount) }}</h3>
                            <h4 class="text-primary"><b>Paid :</b> {{ amount_with_currency_symbol($detail->payable_amount) }}</h4>
                            <h4 class="text-danger"><b>Due :</b> {{ amount_with_currency_symbol($detail->due_amount) }}</h4>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <div class="text-right">
                <button id="print" class="btn btn-outline-primary" type="button"> <span><i class="fa fa-print"></i> {{__('Print or Save')}}</span> </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>

    <script>
        $(document).ready(function() {

            $('.go_back_btn').removeClass('d-none');

            $("#print").click(function() {

                $('.go_back_btn').addClass('d-none');

                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close,
                };

                $("div.printableArea").printArea(options);


            });




        });
    </script>
@endsection

