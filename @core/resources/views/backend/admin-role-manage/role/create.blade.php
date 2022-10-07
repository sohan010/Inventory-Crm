@extends('backend.admin-master')
@section('site-title')
    {{__('Add New Role')}}
@endsection
@section('page-title')
    {{__('Add New Role')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.error/>
                <x-msg.success/>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <h4 class="header-title">{{__('New Role')}}</h4>
                            </div>
                            <div class="right">
                                <a href="{{route('admin.all.admin.role')}}" class="btn btn-info">{{__('All Roles')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.role.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="{{__('Enter name')}}">
                            </div>
                            <button type="button" class="btn btn-xs mb-4 btn-outline-dark checked_all">{{__('Check All')}}</button>
                            <div class="row checkbox-wrapper">
                                @foreach($permissions as $permission)
                                    <div class="col-lg-2 col-md-2">
                                        <div class="form-group">
                                            <label ><strong>{{ucfirst(str_replace('-',' ',$permission->name))}}</strong></label>
                                            <label class="switch">
                                                <input type="checkbox" name="permission[]"  value="{{$permission->id}}" >
                                                <span class="slider-yes-no"></span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button id="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <x-btn.submit/>
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