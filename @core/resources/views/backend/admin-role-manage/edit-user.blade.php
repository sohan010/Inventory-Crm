@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Admin')}}
@endsection
@section('style')
    <x-media.css/>
@endsection

@section('page-title')
    {{__('Edit Admins')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12">
                <x-msg.error/>
                <x-msg.success/>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <h4 class="header-title">{{__('Edit Admin')}}</h4>
                            </div>
                            <div class="right">
                                <a href="{{route('admin.all.user')}}" class="btn btn-info text-white">{{__('All Admin')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.user.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$admin->id}}">
                                <div class="row">

                                    <x-form-fields.text label="Name" name="name" icon="user" value="{{$admin->name}}" col="4"/>
                                    <x-form-fields.email label="Email" name="email" value="{{$admin->email}}" icon="email" col="4"/>

                                    <x-form-fields.select name="role" label="{{__('Role')}}" col="4" margin-top="0">
                                        <option>{{__('Select Role')}}</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role}}" @if(in_array($role,$adminRole)) selected @endif>{{$role}}</option>
                                        @endforeach
                                    </x-form-fields.select>

                                    <x-form-fields.form-image name="image" value="{{$admin->image}}" col="12"/>

                                </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
    <x-media.js/>
    <x-btn.update/>
@endsection