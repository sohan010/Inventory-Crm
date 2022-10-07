@extends('backend.admin-master')

@section('site-title')
    {{__('Edit Role')}}
@endsection

@section('page-title')
    {{__('Edit Role')}}
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
                                <h4 class="header-title">{{__('Edit Role')}}</h4>
                            </div>
                            <div class="right">
                                <a href="{{route('admin.all.admin.role')}}" class="btn btn-info">{{__('All Roles')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.user.role.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$role->id}}">
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control"  value="{{$role->name}}" name="name" placeholder="{{__('Enter name')}}">
                            </div>
                            <button type="button" class="btn btn-xs mb-4 btn-outline-dark checked_all">{{__('Check All')}}</button>
                            <div class="row checkbox-wrapper">
                                @foreach($permissions as $permission)
                                    <div class="col-lg-2 col-md-2">
                                        <div class="form-group">
                                            <label ><strong>{{ucfirst(str_replace('-',' ',$permission->name))}}</strong></label>
                                            <label class="switch role">
                                                <input type="checkbox" name="permission[]" @if(in_array($permission->id,$rolePermissions)) checked @endif value="{{$permission->id}}" >
                                                <span class="slider-yes-no"></span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function (){
           "use strict";

           $(document).on('click','.checked_all',function (){
              var allCheckbox =  $('.checkbox-wrapper input[type="checkbox"]');
              $.each(allCheckbox,function (index,value){
                  if ($(this).is(':checked')){
                      $(this).prop('checked',false);
                  }else{
                      $(this).prop('checked',true);
                  }
              });
           });

        });
    </script>
@endsection