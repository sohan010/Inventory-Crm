@extends('backend.admin-master')

@section('style')
    <x-media.css/>
    <x-admin-press-datatable.css/>
@endsection

@section('site-title')
    {{__('All Admins')}}
@endsection

@section('page-title')
    {{__('All Admins')}}
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
                                <h4 class="header-title">{{__('All Admin Created By Super Admin')}}</h4>
                            </div>
                            <div class="right">
                                <a href="{{route('admin.new.user')}}" class="btn btn-info text-white">{{__('Add Admin')}}</a>
                            </div>
                        </div>
                    </div>
                        <div class="col-12">
                                <div class="card-body">
                                    <div class="table-responsive m-t-40">
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th>{{__('ID')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Email')}}</th>
                                                <th>{{__('Image')}}</th>
                                                <th>{{__('Role')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_user as $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->name}} ({{$data->username}})</td>
                                                    <td>{{$data->email}}</td>
                                                    <td>
                                                        @php
                                                        $img = get_attachment_image_by_id($data->image,null,true);
                                                        @endphp
                                                        @if (!empty($img))
                                                            <div class="attachment-preview">
                                                                <div class="thumbnail">
                                                                    <div class="centered">
                                                                        <img class="avatar user-thumb" src="{{$img['img_url']}}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php  $img_url = $img['img_url']; @endphp
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!empty($data->getRoleNames()))
                                                            @foreach($data->getRoleNames() as $v)
                                                                {{ $v }}
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>


                                                        <a href="#"
                                                           data-id="{{$data->id}}"
                                                           data-toggle="modal"
                                                           data-target="#user_change_password_modal"
                                                           class="btn btn-lg btn-outline-info btn-sm mb-3 mr-1 user_change_password_btn"
                                                        >
                                                            {{__("Change Password")}}
                                                        </a>

                                                        <a href="{{route('admin.user.edit',$data->id)}}" class="btn btn-lg btn-outline-primary btn-sm mb-3 mr-1 user_edit_btn">
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                        <x-delete-popover :url="route('admin.delete.user',$data->id)"/>
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
            </div>

    <x-media.markup/>
@endsection


@section('script')

    @include('backend.popup-modals.admin.change-password')
    <x-media.js/>
    <x-admin-press-datatable.js/>

    <script>
    (function($){
    "use strict";
    $(document).ready(function() {
        $(document).on('click','.user_change_password_btn',function(e){
            e.preventDefault();
            var el = $(this);
            var form = $('#user_password_change_modal_form');
            form.find('#ch_user_id').val(el.data('id'));
        });
        $('#all_user_table').DataTable( {
            "order": [[ 0, "desc" ]]
        } );

    } );
            
    })(jQuery);
    </script>
@endsection
