@extends('backend.admin-master')
@section('style')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('Edit Profile')}}
@endsection
@section('page-title')
    {{__('Edit Profile')}}
@endsection
@section('content')
    @php
        $auth_user = auth()->user();
    @endphp
    <div class="main-content-inner margin-top-30">
        <div class="row">
            <div class="col-lg-12">
               <x-msg.success/>
                <x-msg.error/>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Edit Profile')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-form-fields.text label="Username" name="email" value="{{$auth_user->username}}" icon="user" col="4" class="mt-0"/>
                                <x-form-fields.text label="Name" name="name" icon="user" value="{{$auth_user->name}}" col="4" class="mt-0"/>
                                <x-form-fields.email label="Email" name="email" value="{{$auth_user->email}}" icon="email" col="4" marginTop="mt-0"/>
                                <x-form-fields.form-image name="image" label="{{__('Admin Image')}}" value="{{$auth_user->image}}" col="12" class="mt-3"/>
                            </div>

                            <div class="form-group mt-4">
                                <button id="update" type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
    <x-btn.update/>
    <x-media.js/>
@endsection
