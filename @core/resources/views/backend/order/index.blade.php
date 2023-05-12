@extends('backend.admin-master')

@section('site-title')
    {{__('All Orders')}}
@endsection

@section('page-title')
    {{__('All Orders')}}
@endsection

@section('style')
    <x-media.css/>

    <style>
        .order_status_edit_btn:hover{
            background: none;
        }
    </style>
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
                                <h3 class="card-title">{{__('All Orders')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @can('product-delete')
                            <x-bulk-action/>
                        @endcan
                        <div class="table-responsive product_list_table">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <x-bulk-th/>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Customer Name')}}</th>
                                    <th>{{__('Payment Gateway')}}</th>
                                    <th>{{__('Order Status')}}</th>
                                    <th>{{__('Payment Status')}}</th>
                                    <th>{{__('Created At')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($all_orders as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id" :index="$loop->index"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->customer?->name}}</td>
                                        <td>{{ str_replace('_',' ',ucfirst($data->payment_gateway)) }}</td>

                                        <td><x-status-span status="{{$data->status}}"/></td>
                                        <td><x-status-span status="{{$data->payment_status}}"/></td>
                                        <td>{{ date('d-m-Y',strtotime($data->created_at)) }}</td>

                                        <td>
                                            <a href="{{route('admin.order.view',$data->id)}}" class="btn btn-outline-dark btn-sm mb-3 mr-1"
                                               data-toggle="tooltip" title="View Details">
                                                <i class="ti ti-eye"></i>
                                            </a>

                                            <span class="" data-toggle="modal" data-target="#order_status_modal">
                                                 <a  class="btn btn-outline-primary btn-sm mb-3 mr-1 order_status_edit_btn" data-toggle="tooltip" title="Change Status"
                                                 data-id="{{$data->id}}"
                                                 data-status="{{$data->status}}"
                                                 data-payment_status="{{$data->payment_status}}"
                                                 >
                                                         <i class="ti ti-settings"></i>
                                                 </a>
                                             </span>

                                            @if($data->status == 'complete' && $data->payment_status == 'complete')
                                                <a href="{{route('admin.order.print',$data->id)}}" class="btn btn-outline-info btn-sm mb-3 mr-1 product_edit_btn"
                                                   data-toggle="tooltip" title="Invoice Preview & Print">
                                                    <i class="ti ti-printer"></i>
                                                </a>
                                            @endif


                                            <x-delete-popover url="{{route('admin.order.delete',$data->id)}}"/>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.popup-modals.others.order-status')
@endsection

@section('script')

    <x-admin-press-datatable.js/>
    <x-bulk-action-js url="{{route('admin.order.bulk.action')}}"/>

    <script>
        $(document).on('click','.order_status_edit_btn',function(){
            let order_id = $(this).data('id');
            let status = $(this).data('status');
            let payment_status = $(this).data('payment_status');
            $('.order_status_form').find('.order_id').val(order_id);
            $('.order_status_form').find('.status option[value="'+status+'"]').attr('selected',true);
            $('.order_status_form').find('.payment_status option[value="'+payment_status+'"]').attr('selected',true);
        });
    </script>

@endsection
