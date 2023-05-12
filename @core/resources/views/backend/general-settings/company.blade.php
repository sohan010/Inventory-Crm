@extends('backend.admin-master')

@section('site-title')
    {{__('Company Settings')}}
@endsection

@section('page-title')
    {{__('Company Settings')}}
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.success/>
                <x-msg.error/>
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">{{__("Company Settings")}}</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.general.company.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="site_meta_tags">{{__('Company Name')}}</label>
                                <input type="text" name="company_name"  class="form-control" value="{{get_static_option('company_name')}}">
                            </div>

                            <div class="form-group">
                                <label for="site_meta_tags">{{__('Company Address')}}</label>
                                <input type="text" name="company_address"  class="form-control" value="{{get_static_option('company_address')}}" id="site_meta_tags">
                            </div>

                            <div class="form-group">
                                <label for="site_meta_tags">{{__('Company Email')}}</label>
                                <input type="text" name="company_email"  class="form-control" value="{{get_static_option('company_email')}}" id="site_meta_tags">
                            </div>

                            <div class="form-group">
                                <label for="site_meta_tags">{{__('Company Phone')}}</label>
                                <input type="text" name="company_phone"  class="form-control" value="{{get_static_option('company_phone')}}" id="site_meta_tags">
                            </div>



                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

