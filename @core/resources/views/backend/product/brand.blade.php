@extends('backend.admin-master')

@section('site-title')
    {{__('Product Brand List')}}
@endsection

@section('page-title')
    {{__('Product Brand List')}}
@endsection

@section('style')
   <x-admin-press-datatable.css/>
    <x-media.css/>
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
                                <h3 class="card-title">{{__('Product Brand List')}}</h3>
                            </div>
                            <div class="right">
                                @can('product-brand-create')
                                    <div class="btn-wrapper">
                                        <a href="" data-toggle="modal" data-target="#new_product_brand"
                                           class="btn btn-info">{{__('Add New')}}</a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="bulk-delete-wrapper">
                            @can('product-brand-delete')
                                <div class="select-box-wrap">
                                    <x-bulk-action/>
                                </div>
                            @endcan
                        </div>

                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Created Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_brands as $key => $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :index="$key" :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>

                                        <td>
                                            {!! render_attachment_preview_for_admin($data->image) !!}
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>{{optional($data->created_at)->format('d-m-Y')}}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>

                                        <td>
                                            @can('product-subbrand-delete')
                                                <x-delete-popover :url="route('admin.product.brand.delete',$data->id)"/>
                                            @endcan
                                            @can('product-subbrand-edit')
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#product_brand_item_edit_modal"
                                                   class="btn btn-outline-primary btn-xs mb-3 mr-1 product_brand_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-action="{{route('admin.product.brand.update')}}"
                                                   data-name="{{$data->name}}"
                                                   data-brand="{{$data->product_brand_id}}"
                                                   data-status="{{$data->status}}"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <x-media.markup/>
    @endsection

 @section('script')

     @include('backend.popup-modals.product.brand.add')
     @include('backend.popup-modals.product.brand.edit')

   <x-admin-press-datatable.js/>
   <x-media.js/>
   <x-btn.submit/>
   <x-btn.update/>
   <x-bulk-action-js :url="route('admin.product.brand.bulk.action')"/>
    <script>
            $(document).ready(function () {
                $(document).on('click', '.product_brand_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var name = el.data('name');
                    var action = el.data('action');

                    var form = $('#product_brand_edit_modal_form');
                    form.attr('action', action);
                    form.find('#product_brand_id').val(id);
                    form.find('#edit_name').val(name);
                    form.find('#edit_status option[value="' + el.data('status') + '"]').attr('selected', true);

                });
            });
    </script>
@endsection
