@extends('backend.admin-master')
@section('site-title')
    {{__('Add New Customer')}}
@endsection

@section('page-title')
    {{__('Add New Customer')}}
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
                                <h4 class="header-title">{{__('New Customer')}}</h4>
                            </div>
                            <div class="right">
                                <a href="{{route('admin.customer')}}" class="btn btn-info text-white">{{__('All Customer')}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.customer.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <x-form-fields.text label="Name" name="name" icon="user" col="4"/>
                                <x-form-fields.email label="Email" name="email" icon="email" col="4"/>
                                <x-form-fields.number label="Phone" name="phone" icon="mobile" col="4"/>

                                <x-form-fields.text class="mt-3" label="City" name="city" icon="home" col="4"/>
                                <x-form-fields.text class="mt-3" label="Address" name="address" icon="home" col="4"/>
                                <x-form-fields.text class="mt-3" label="Company Name" name="company_name" icon="map-alt" col="4"/>
                                <x-form-fields.text class="mt-3" label="NID Number" name="nid" icon="credit-card" col="4"/>

                                <x-form-fields.select name="country_id" label="{{__('Country')}}" col="4">
                                      <option>{{__('Select Country')}}</option>
                                    @foreach($all_countries as $country)
                                       <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </x-form-fields.select>

                                <x-form-fields.select name="customer_type" label="{{__('Customer Type')}}" col="4">
                                    <option value="0">{{ __('General') }}</option>
                                    <option value="1">{{ __('Other') }}</option>
                                </x-form-fields.select>

                            </div>
                            <button id="submit" type="submit" class="btn btn-primary btn-xl mt-4 pr-4 pl-4 ">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <x-btn.submit/>
@endsection