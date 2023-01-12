@extends('backend.admin-master')

@section('site-title')
    {{__('All Products')}}
@endsection

@section('page-title')
    {{__('All Products')}}
@endsection

@section('style')
    <x-media.css/>>
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
                                <h3 class="card-title">{{__('All Products')}}</h3>
                            </div>
                            <div class="right">
                               <a href="{{route('admin.product.create')}}" class="btn btn-info text-white">{{__('Add Product')}}</a>
                               <a href="{{route('admin.product.create')}}" class="btn btn-danger">{{__('Trash Products')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @can('product-delete')
                            <x-bulk-action/>
                        @endcan
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <x-bulk-th/>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Phone')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Address')}}</th>
                                    <th>{{__('Country')}}</th>
                                    <th>{{__('Customer Type')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($all_products as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id" :index="$loop->index"/>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->phone}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->address}}</td>
                                        <td>{{$data->country?->name}}</td>
                                        <td>{{ \App\Enums\CustomerEnum::getText($data->product_type) }}</td>

                                        <td>

                                            @can('product-edit')
                                                <a href="{{route('admin.product.edit',$data->id)}}" class="btn btn-outline-primary btn-sm mb-3 mr-1 product_edit_btn">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            @endcan

                                            @can('product-delete')
                                                <x-delete-popover :url="route('admin.product.delete',$data->id)"/>
                                            @endcan

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
@endsection

@section('script')
    <x-admin-press-datatable.js/>
    <x-bulk-action-js url="{{route('admin.product.bulk.action')}}"/>
@endsection
