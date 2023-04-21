@extends('backend.admin-master')

@section('site-title')
    {{__('Coupon List')}}
@endsection

@section('page-title')
    {{__('Coupon List')}}
@endsection

@section('style')
   <x-admin-press-datatable.css/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="alert">
                </div>
                <x-msg.error/>
                <x-msg.success/>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <h3 class="card-title">{{__('Coupon List')}}</h3>
                            </div>
                            <div class="right">

                                    <div class="btn-wrapper">
                                        <a href="" data-toggle="modal" data-target="#new_coupon_modal"
                                           class="btn btn-info">{{__('Add New')}}</a>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="bulk-delete-wrapper">
                                <div class="select-box-wrap">
                                    <x-bulk-action/>
                                </div>
                        </div>

                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Code')}}</th>
                                <th>{{__('Discount')}}</th>
                                <th>{{__('Expire Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_categories as $key => $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :index="$key" :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->code}}</td>
                                        <td>
                                            @if($data->discount_type == 'flat')
                                            {{ amount_with_currency_symbol($data->discount_amount) }}
                                            @else
                                                {{ amount_with_currency_symbol($data->discount_amount) }}%
                                            @endif
                                        </td>
                                        <td>{{date('d-m-Y',strtotime($data->expire_date))}}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>

                                           <x-delete-popover :url="route('admin.coupon.delete',$data->id)"/>

                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#product_coupon_edit_modal"
                                                   class="btn btn-outline-info btn-xs mb-3 mr-1 coupon_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-action="{{route('admin.coupon.update')}}"
                                                   data-title="{{$data->title}}"
                                                   data-code="{{$data->code}}"
                                                   data-discount_type="{{$data->discount_type}}"
                                                   data-discount_amount="{{$data->discount_amount}}"
                                                   data-max_use_qty="{{$data->max_use_qty}}"
                                                   data-expire_date="{{$data->expire_date}}"
                                                   data-status="{{$data->status}}"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

 @endsection

 @section('script')
     @include('backend.popup-modals.product.coupon.add')
     @include('backend.popup-modals.product.coupon.edit')

   <x-admin-press-datatable.js/>
   <x-btn.submit/>
   <x-btn.update/>
   <x-bulk-action-js :url="route('admin.coupon.bulk.action')"/>

    <script>
            $(document).ready(function () {

                $('.expire_date').flatpickr();

                $(document).on('click', '.coupon_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var code = el.data('code');
                    var discount_type = el.data('discount_type');
                    var discount_amount = el.data('discount_amount');
                    var expire_date = el.data('expire_date');
                    var max_use_qty = el.data('max_use_qty');
                    var action = el.data('action');

                    var form = $('#coupon_edit_modal_form');
                    form.attr('action', action);
                    form.find('.coupon_id').val(id);
                    form.find('.edit_title').val(title);
                    form.find('.edit_code').val(code);
                    form.find('.edit_discount_amount').val(discount_amount);
                    form.find('.edit_expire_date').val(expire_date);
                    form.find('.edit_max_use_qty').val(max_use_qty);

                    form.find('.edit_discount_type option[value="' + discount_type + '"]').attr('selected', true);
                    form.find('.edit_status option[value="' + el.data('status') + '"]').attr('selected', true);

                });
            });
    </script>

@endsection
