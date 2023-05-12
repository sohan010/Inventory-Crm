@extends('backend.admin-master')

@section('site-title')
    {{__('Order Details')}}
@endsection

@section('page-title')
    {{__('Order Details')}}
@endsection

@section('style')
    <x-media.css/>>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-msg.error/>
                <x-msg.success/>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <h3 class="card-title">{{__('Orders Details')}}</h3>
                            </div>
                            <div class="righ">
                                <a href="{{route('admin.order')}}" class="btn btn-info text-white">{{__('All Orders')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive product_list_table">
                                    <h2 class="card-title text-center mb-3">{{__('Basic Order Details')}}</h2>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>{{__('ID')}}</th>
                                            <th>{{__('Customer Name')}}</th>
                                            <th>{{__('Payment Gateway')}}</th>
                                            <th>{{__('Order Status')}}</th>
                                            <th>{{__('Payment Status')}}</th>
                                            <th>{{__('Order Date')}}</th>
                                            @if(!empty($order->manual_payment_attachment))
                                             <th>{{__('Bank Document')}}</th>
                                             @endif
                                            @if(!empty($order->cheque_number))
                                                <th>{{__('Cheque Number')}}</th>
                                            @endif
                                        </tr>
                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->customer?->name}}</td>
                                                <td>{{ str_replace('_',' ',ucfirst($order->payment_gateway)) }}</td>

                                                <td><x-status-span status="{{$order->status}}"/></td>
                                                <td><x-status-span status="{{$order->payment_status}}"/></td>
                                                <td>{{ date('d-m-Y',strtotime($order->created_at)) }}</td>

                                                @if(!empty($order->manual_payment_attachment))
                                                <td>
                                                    <a class="btn btn-info btn-xs" href="{{ url('assets/uploads/custom-files/'.$order->manual_payment_attachment) }}" target="_blank">{{__('View Document')}}</a>
                                                </td>
                                                @endif

                                                @if(!empty($order->cheque_number))
                                                    <td>
                                                       <span class="text-info"> {{ $order->cheque_number }}</span>
                                                        <br>
                                                        {{__('Note')}} : {{$order->cheque_payment_note}}
                                                    </td>
                                                @endif

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                   <div class="table-responsive product_list_table">
                                    <h2 class="card-title text-info text-center mb-3" style="color: #625a91">{{__('Product Details')}}</h2>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>{{__('SL#')}}</th>
                                            <th>{{__('Product Name')}}</th>
                                            <th class="text-center">{{__('Price')}}</th>
                                            <th class="text-center">{{__('Order Qty')}}</th>
                                            <th class="text-center">{{__('Amount')}}</th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                    @foreach($details as $key=> $detail)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{$detail->product?->product_name }}</td>
                                            <td class="text-center">{{amount_with_currency_symbol($detail->product?->sale_price) }}</td>
                                            <td class="text-center">{{$detail->single_quantity }}</td>
                                            <td class="text-center">{{ amount_with_currency_symbol($detail->product?->sale_price * $detail->single_quantity)  }}</td>
                                        </tr>
                                    @endforeach

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td style="border-bottom-style: hidden; border-left-style: hidden; border-right-style: hidden" colspan="5"></td>
                                        </tr>
                                            <tr>
                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong>{{__('Subtotal Amount')}} : </strong></td>
                                                <td colspan="" class="text-center bg-primary text-light"> <strong>{{ amount_with_currency_symbol($detail->subtotal) }}</strong></td>
                                            </tr>
                                        <tr>

                                            <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong>{{__('Discount Amount ')}} {{ $detail->discount_type == 'percentage' ? amount_with_percentage($detail->discount_percentage) : '' }} : </strong></td>
                                            <td colspan="" class="text-center bg-info text-light">
                                                <strong>{{ amount_with_currency_symbol($detail->discount_amount) }}</strong>
                                            </td>
                                        </tr>

                                            <tr>
                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong>{{__('Coupon Discount')}} {{ $detail->coupon_discount_type == 'percentage' ? amount_with_percentage($detail->coupon_percentage) : '' }} : </strong></td>
                                                <td colspan="" class="text-center bg-info text-light">
                                                    <strong>{{ amount_with_currency_symbol($detail->coupon_discount) }}</strong>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong>{{__('Tax Amount')}} {{ amount_with_percentage($detail->vat_percentage) }} : </strong></td>
                                                <td colspan="" class="text-center bg-info text-light">
                                                    <strong>{{ amount_with_currency_symbol($detail->vat_amount) }}</strong>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong>{{__('Shipping Amount')}} : </strong></td>
                                                <td colspan="" class="text-center bg-info text-light">
                                                    <strong>{{ amount_with_currency_symbol($detail->shipping_amount) }}</strong>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><h4 class="text-dark">{{__('Grand Total')}} : </h4></td>
                                                <td colspan="" class="text-center bg-primary">
                                                   <h4 class="text-light">{{ amount_with_currency_symbol($detail->total_amount) }}</h4>
                                                </td>
                                            </tr>

                                        <tr>
                                            <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><h5 class="text-primary">{{__('Paid Amount')}} : </h5></td>
                                            <td colspan="" class="text-center bg-primary">
                                                <h4 class="text-light">{{ amount_with_currency_symbol($detail->payable_amount) }}</h4>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><h5 class="text-danger">{{__('Due Amount')}} : </h5></td>
                                            <td colspan="" class="text-center bg-primary">
                                                <h4 class="text-light">{{ amount_with_currency_symbol($detail->due_amount) }}</h4>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
