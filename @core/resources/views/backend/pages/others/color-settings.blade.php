@extends('backend.admin-master')

@section('site-title')
    {{__('Color List')}}
@endsection

@section('page-title')
    {{__('Color List')}}
@endsection

@section('style')
   <x-admin-press-datatable.css/>
   <link rel="stylesheet" href="{{asset('assets/backend/xgenious/css/colorpicker.css')}}">
    <style>
        .colorpicker{
            z-index: 1051;
            top: 30px !important;
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
                                <th>{{__('Color')}}</th>
                                <th>{{__('Created Date')}}</th>
                                <th>{{__('Status')}}</th>
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
                                            @if(in_array($data->name,['white','White']))
                                              <div style="background-color: {{$data->color_code}}; color:#000;"> {{ $data->color_code }} </div>
                                            @else
                                                <div style="background-color: {{$data->color_code}}; color:#fff;"> {{ $data->color_code }} </div>
                                            @endif
                                        </td>

                                        <td>{{date('d-m-Y',strtotime($data->created_at))}}</td>

                                        <td><x-status-span :status="$data->status"/></td>

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
                                                   data-color_code="{{$data->color_code}}"
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


    <script src="{{asset('assets/backend/xgenious/js/colorpicker.js')}}"></script>

   <x-admin-press-datatable.js/>
   <x-btn.submit/>
   <x-btn.update/>
   <x-bulk-action-js :url="route('admin.color.bulk.action')"/>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.color_edit_btn', function () {
                var el = $(this);
                var id = el.data('id');
                var name = el.data('name');
                var code = el.data('color_code');
                var action = el.data('action');

                var form = $('#color_edit_modal_form');
                form.attr('action', action);
                form.find('#color_id').val(id);
                form.find('#edit_name').val(name);
                form.find('#edit_color_code').val(code).css('background',code).css('color','#fff');
                form.find('#edit_status option[value="' + el.data('status') + '"]').attr('selected', true);

            });

            initColorPicker('#color_code');
            initColorPicker('#edit_color_code');

            function initColorPicker(selector){
                $(selector).ColorPicker({
                    color: '#852aff',
                    onShow: function (colpkr) {
                        $(colpkr).fadeIn(500);
                        return false;
                    },
                    onHide: function (colpkr) {
                        $(colpkr).fadeOut(500);
                        return false;
                    },
                    onChange: function (hsb, hex, rgb) {
                        $(selector).css('background-color', '#' + hex);
                        $(selector).val('#' + hex);
                    }
                });
            }

        });
    </script>
    @include('backend.popup-modals.color.add')
    @include('backend.popup-modals.color.edit')
@endsection
