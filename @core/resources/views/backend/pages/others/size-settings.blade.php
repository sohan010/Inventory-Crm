@extends('backend.admin-master')

@section('site-title')
    {{__('Size List')}}
@endsection

@section('page-title')
    {{__('Size List')}}
@endsection

@section('style')
   <x-admin-press-datatable.css/>
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
                                <h3 class="card-title">{{__('Size List')}}</h3>
                            </div>
                            <div class="right">
                                @can('country-create')
                                    <div class="btn-wrapper">
                                        <a href="" data-toggle="modal" data-target="#new_size_modal"
                                           class="btn btn-info">{{__('Add New')}}</a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="bulk-delete-wrapper">
                            @can('country-delete')
                                <div class="select-box-wrap">
                                    <x-bulk-action/>
                                </div>
                            @endcan
                        </div>

                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <x-bulk-th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Size')}}</th>
                                <th>{{__('Created Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_sizes as $key => $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :index="$key" :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->size_code}}</td>

                                        <td>{{optional($data->created_at)->format('d-m-Y')}}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>
                                            @can('country-delete')
                                                <x-delete-popover :url="route('admin.size.delete',$data->id)"/>
                                            @endcan
                                            @can('country-edit')
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#edit_size_modal"
                                                   class="btn btn-outline-primary btn-xs mb-3 mr-1 size_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-action="{{route('admin.size.update')}}"
                                                   data-name="{{$data->name}}"
                                                   data-size_code="{{$data->size_code}}"
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

 @endsection

 @section('script')
     @include('backend.popup-modals.size.add')
     @include('backend.popup-modals.size.edit')

   <x-admin-press-datatable.js/>
   <x-btn.submit/>
   <x-btn.update/>
   <x-bulk-action-js :url="route('admin.size.bulk.action')"/>

    <script>
            $(document).ready(function () {
                $(document).on('click', '.size_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var name = el.data('name');
                    var size = el.data('size_code');
                    var action = el.data('action');

                    var form = $('#size_edit_modal_form');
                    form.attr('action', action);
                    form.find('#size_id').val(id);
                    form.find('#edit_name').val(name);
                    form.find('#edit_size_code').val(size);
                    form.find('#edit_status option[value="' + el.data('status') + '"]').attr('selected', true);

                });
            });
    </script>

@endsection
