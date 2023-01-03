@extends('backend.admin-master')

@section('site-title')
    {{__('Color List')}}
@endsection

@section('page-title')
    {{__('Color List')}}
@endsection

@section('style')
   <x-admin-press-datatable.css/>
   <link href="{{asset('assets/backend/assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css')}}" rel="stylesheet">
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
                                <h3 class="card-title">{{__('Color List')}}</h3>
                            </div>
                            <div class="right">
                                @can('color-create')
                                    <div class="btn-wrapper">
                                        <a href="" data-toggle="modal" data-target="#new_color"
                                           class="btn btn-info">{{__('Add New')}}</a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="col-md-4 m-b-30">
                            <div class="example">
                                <h5 class="box-title">Simple mode</h5>
                                <p class="text-muted m-b-20">just add class <code>.colorpicker</code> to create it.</p>
                                <input type="text" class="colorpicker form-control" value="#7ab2fa" />
                            </div>
                        </div>


                        <div class="bulk-delete-wrapper">
                            @can('color-delete')
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
                                <th>{{__('Status')}}</th>
                                <th>{{__('Created Date')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_colors as $key => $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :index="$key" :id="$data->id"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>
                                            <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>{{optional($data->created_at)->format('d-m-Y')}}</td>
                                        <td>
                                            @can('color-delete')
                                                <x-delete-popover :url="route('admin.color.delete',$data->id)"/>
                                            @endcan
                                            @can('color-edit')
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#color_item_edit_modal"
                                                   class="btn btn-outline-primary btn-xs mb-3 mr-1 color_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-action="{{route('admin.color.update')}}"
                                                   data-name="{{$data->name}}"
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
     @include('backend.popup-modals.color.add')
     @include('backend.popup-modals.color.edit')

   <x-admin-press-datatable.js/>
   <x-btn.submit/>
   <x-btn.update/>
   <x-bulk-action-js :url="route('admin.color.bulk.action')"/>
    <script src="{{asset('assets/backend/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>

    <script>
        // $("#color_code").asColorPicker({
        //     mode: 'gradient'
        // });
        $(".colorpicker").asColorPicker();
    </script>

    <script>
            $(document).ready(function () {

                $(document).on('click', '.color_edit_btn', function () {
                    var el = $(this);
                    var id = el.data('id');
                    var name = el.data('name');
                    var action = el.data('action');

                    var form = $('#color_edit_modal_form');
                    form.attr('action', action);
                    form.find('#color_id').val(id);
                    form.find('#edit_name').val(name);
                    form.find('#edit_status option[value="' + el.data('status') + '"]').attr('selected', true);

                });



            });
    </script>

@endsection
