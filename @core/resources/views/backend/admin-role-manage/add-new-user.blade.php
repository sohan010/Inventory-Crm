@extends('backend.admin-master')
@section('site-title')
    {{__('Add New Admin')}}
@endsection

@section('page-title')
    {{__('Add New Admin')}}
@endsection

@section('style')
    <x-media.css/>
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.error/>
                <x-msg.success/>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">

                          <div class="left">
                            <h4 class="header-title">{{__('New Admin')}}</h4>
                          </div>
                            <div class="right">
                                <a href="{{route('admin.all.user')}}" class="btn btn-info text-white">{{__('All Admin')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">


                        <form action="{{route('admin.new.user')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <x-form-fields.text label="Name" name="name" icon="user" col="4"/>
                                <x-form-fields.text label="Username" name="username" icon="user" col="4"
                                 notice="{{__('Remember this username, user will login using this username')}}"/>

                                <x-form-fields.email label="Email" name="email" icon="email" col="4"/>
                                <x-form-fields.number label="Phone" name="phone" icon="mobile" col="4"/>
                                <x-form-fields.password label="Password" name="password" icon="lock" col="4"/>
                                <x-form-fields.password label="Confirm Password" name="password_confirmation" icon="lock" col="4"/>

                                <x-form-fields.select name="role" label="{{__('Role')}}" col="4">
                                    <option>{{__('Select Role')}}</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role}}">{{$role}}</option>
                                    @endforeach
                                </x-form-fields.select>

                                <x-form-fields.form-image name="image" col="12"/>


                            </div>
                            <button id="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New User')}}</button>
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
    <x-btn.submit/>
@endsection