@extends('backend.admin-master')

@section('style')
    <x-admin-press-datatable.css/>
@endsection
@section('site-title')
    {{__('All Admin Roles')}}
@endsection

@section('page-title')
    {{__('All Admin Roles')}}
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
                                <h4 class="header-title">{{__('All Admin Roles')}}</h4>
                            </div>
                            <div class="right">
                                <a href="{{route('admin.role.new')}}" class="btn btn-info">{{__("New Role")}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mt-5">
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead class="text-capitalize">
                                            <tr>
                                                <th>{{__('ID')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($roles as $role)
                                                <tr>
                                                    <td>{{$role->id}}</td>
                                                    <td>{{$role->name}}</td>
                                                    <td>
                                                        @if($role->name != 'Super Admin')
                                                        <x-edit-icon :url="route('admin.user.role.edit',$role->id)"/>
                                                        <x-delete-popover :url="route('admin.user.role.delete',$role->id)"/>
                                                        @else
                                                            <span class="alert alert-warning">{{__('Super admin has all access')}}</span>
                                                        @endif
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

@endsection
@section('script')
 <x-admin-press-datatable.js/>
@endsection
