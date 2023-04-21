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
    <x-select2.css/>
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
                        <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="row">

                                        <x-form-fields.text label="Product Name" name="product_name" icon="shopping-cart" col="6"/>
                                        <x-form-fields.text label="Product Code" innerClass="product_code" name="product_code" icon="reload product_code_icon" col="6"/>

                                        <x-form-fields.select name="product_category_id" customClass="product_category_id" margin-top="mt-3" label="{{__('Product Category')}}" col="6">
                                            <option selected disabled>{{__('Select Category')}}</option>
                                            @foreach($all_categories as $category)
                                                 <option value="{{$category->id}}">{{ $category->name }}</option>
                                            @endforeach
                                        </x-form-fields.select>

                                        <x-form-fields.select name="product_subcategory_id" customClass="product_subcategory_id" margin-top="mt-3" label="{{__('Product Subcategory')}}" col="6">
                                            <option selected disabled>{{__('Select Subcategory')}}</option>
                                            @foreach($all_subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}">{{ $subcategory->name }}</option>
                                            @endforeach
                                        </x-form-fields.select>

                                        <x-form-fields.select name="brand_id" margin-top="mt-3" label="{{__('Product Brand')}}" col="6">
                                            <option selected disabled>{{__('Select Brand')}}</option>
                                            @foreach($all_brands as $brand)
                                                <option value="{{$brand->id}}">{{ $brand->name }}</option>
                                            @endforeach
                                        </x-form-fields.select>

                                        <x-form-fields.select name="unit_id" margin-top="mt-3" label="{{__('Product Unit')}}" col="6">
                                            <option selected disabled>{{__('Select Unit')}}</option>
                                            @foreach($all_units as $unit)
                                                <option value="{{$unit->id}}">{{ $unit->name }}</option>
                                            @endforeach
                                        </x-form-fields.select>

                                        <x-form-fields.select name="product_colors[]" margin-top="mt-3" multiple="true" customClass="select2" label="{{__('Product Colors')}}" col="6">
                                            <option disabled>{{__('Select Colors')}}</option>
                                            @foreach($all_colors as $color)
                                                <option value="{{$color->id}}">{{ $color->name }}</option>
                                            @endforeach
                                        </x-form-fields.select>

                                        <x-form-fields.select name="product_sizes[]" margin-top="mt-3" multiple="true" customClass="select2" label="{{__('Product Sizes')}}" col="6">
                                            <option disabled>{{__('Select Sizes')}}</option>
                                            @foreach($all_sizes as $size)
                                                <option value="{{$size->id}}">{{ $size->name }}</option>
                                            @endforeach
                                        </x-form-fields.select>

                                        <x-form-fields.summer_note label="{{__('Product Description')}}" class="mt-3" name="product_description" col="12"/>
                                        <x-form-fields.text-area label="{{__('Product qty Alert Message')}}" class="mt-3" name="alert_message" col="12"/>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="row">

                                        <x-form-fields.number label="Purchase Price" name="purchase_price" icon="money" col="12"/>
                                        <x-form-fields.number label="Sale Price" name="sale_price" icon="money" col="12" group-class="mt-3"/>
                                        <x-form-fields.number label="Product Quantity" name="quantity" icon="shield" col="12" group-class="mt-3"/>

                                        <x-form-fields.text label="Product Barcode" innerClass="barcode" class="mt-3" name="barcode" icon="bar-chart-alt" col="12"/>

                                        <x-form-fields.number label="Stockout Alert Quantity" name="alert_qty" icon="filter" col="12" group-class="mt-3"/>

                                        <x-form-fields.form-image name="image" col="12"/>

                                        <x-form-fields.select name="feature" margin-top="mt-3" label="{{__('Feature Product')}}" col="12">
                                            <option value="1">{{ __('Yes') }}</option>
                                            <option value="0">{{ __('No') }}</option>
                                        </x-form-fields.select>

                                        <x-form-fields.select name="status" margin-top="mt-3" label="{{__('Status')}}" col="12">
                                            <option value="1">{{ __('Active') }}</option>
                                            <option value="0">{{ __('Inactive') }}</option>
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
    <x-select2.js/>

    <script>
        $(document).ready(function(){
            $('.select2').select2();

            $(document).on('change','.product_category_id',function(e){
                e.preventDefault();
                let cat_id = $(this).val();

                $.ajax({
                    url: '{{route('admin.product.get.subcategory.ajax')}}',
                    type: 'get',
                    data:{category_id:cat_id},

                    success: function (data){
                        let content = data.data;
                        $('.product_subcategory_id').html(content)
                    },
                    error: function (error){
                        alert(error);
                    }
                });
            });


            $(document).on('click','.product_code_icon',function(e){
                e.preventDefault();
                let el = $(this);
                $(el).removeClass('ti-reload');

                $.ajax({
                    url: '{{route('admin.product.get.product.code.ajax')}}',
                    type: 'get',

                    beforeSend: function (){
                        $(el).addClass('fa fa-spinner fa-spin');
                    },

                    success: function (data){
                        $(el).removeClass('fa fa-spinner fa-spin');
                        $(el).addClass('ti-reload');
                        $('.product_code').val(data);
                        $('.barcode').val(data);
                    },
                    error: function (error){
                        alert(error);
                    }
                });
            });


            $(document).on('keyup','.product_code',function(){
                $('.barcode').val($(this).val());
            });

        });
    </script>
@endsection