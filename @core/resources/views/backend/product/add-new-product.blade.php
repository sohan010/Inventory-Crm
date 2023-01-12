@extends('backend.admin-master')
@section('site-title')
    {{__('Add New Product')}}
@endsection

@section('page-title')
    {{__('Add New Product')}}
@endsection

@section('style')
   <x-summernote.css/>
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
                                <h4 class="header-title">{{__('New Product')}}</h4>
                            </div>
                            <div class="right">
                                <a href="{{route('admin.product')}}" class="btn btn-info text-white">{{__('All Product')}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body product_add_card_body">
                        <form action="{{route('admin.customer.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="row">
                                        <x-form-fields.text label="Product Name" name="name" icon="user" col="6"/>
                                        <x-form-fields.text label="Product Code" name="name" icon="user" col="6"/>

                                        <x-form-fields.select name="customer_type" margin-top="mt-4" label="{{__('Product Category')}}" col="6">
                                            <option value="0">{{ __('General') }}</option>
                                            <option value="1">{{ __('Other') }}</option>
                                        </x-form-fields.select>

                                        <x-form-fields.select name="customer_type" margin-top="mt-4" label="{{__('Product Subcategory')}}" col="6">
                                            <option value="0">{{ __('General') }}</option>
                                            <option value="1">{{ __('Other') }}</option>
                                        </x-form-fields.select>

                                        <x-form-fields.select name="customer_type" margin-top="mt-3" label="{{__('Product Brand')}}" col="6">
                                            <option value="0">{{ __('General') }}</option>
                                            <option value="1">{{ __('Other') }}</option>
                                        </x-form-fields.select>

                                        <x-form-fields.select name="customer_type" margin-top="mt-3" label="{{__('Product Unit')}}" col="6">
                                            <option value="0">{{ __('General') }}</option>
                                            <option value="1">{{ __('Other') }}</option>
                                        </x-form-fields.select>

                                        <x-form-fields.select name="customer_type" margin-top="mt-3" label="{{__('Product Color')}}" col="6">
                                            <option value="0">{{ __('General') }}</option>
                                            <option value="1">{{ __('Other') }}</option>
                                        </x-form-fields.select>

                                        <x-form-fields.select name="customer_type" margin-top="mt-3" label="{{__('Product Size')}}" col="6">
                                            <option value="0">{{ __('General') }}</option>
                                            <option value="1">{{ __('Other') }}</option>
                                        </x-form-fields.select>

                                        <x-form-fields.summer_note label="{{__('Product Description')}}" class="mt-3" name="product_description" col="12"/>
                                        <x-form-fields.text-area label="{{__('Product qty Alert Message')}}" class="mt-3" name="alert_message" col="12"/>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="row">

                                        <x-form-fields.number label="Purchase Price" name="purchase_price" icon="user" col="12"/>
                                        <x-form-fields.number label="Sale Price" name="sale_price" icon="user" col="12" group-class="mt-3"/>
                                        <x-form-fields.number label="Product Quantity" name="quantity" icon="user" col="12" group-class="mt-3"/>

                                        <x-form-fields.text label="Product Barcode" class="mt-3" name="barcode" icon="user" col="12"/>

                                        <x-form-fields.number label="Stockout Alert Quantity" name="quantity" icon="user" col="12" group-class="mt-3"/>

                                        <x-form-fields.form-image name="image" col="12"/>

                                        <x-form-fields.select name="feature" margin-top="mt-3" label="{{__('Feature Product')}}" col="12">
                                            <option value="0">{{ __('Yes') }}</option>
                                            <option value="1">{{ __('No') }}</option>
                                        </x-form-fields.select>

                                        <x-form-fields.select name="customer_type" margin-top="mt-3" label="{{__('Status')}}" col="12">
                                            <option value="0">{{ __('General') }}</option>
                                            <option value="1">{{ __('Other') }}</option>
                                        </x-form-fields.select>

                                    </div>
                                </div>

                            </div>

                            <div class="button">
                                <button id="submit" type="submit" class="btn btn-primary pull-right mt-4 mb-3">{{__('Submit Product')}}</button>
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
    <x-btn.submit/>
    <x-summernote.js/>
    <x-media.js/>
@endsection