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
                               <a href="{{route('admin.product.trash')}}" class="btn btn-danger">{{__('Trash Products')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @can('product-delete')
                            <x-bulk-action/>
                        @endcan
                        <div class="table-responsive product_list_table">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <x-bulk-th/>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Basic Information')}}</th>
                                    <th>{{__('Barcode')}}</th>
                                    <th>{{__('Stock Quantity')}}</th>
                                    <th>{{__('Purchase Price')}}</th>
                                    <th>{{__('Sale Price')}}</th>
                                    <th>{{__('Status')}}</th>
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
                                        <td class="text-info">{!! render_attachment_preview_for_admin($data->image) !!}</td>
                                        <td>
                                            <ul>
                                                <li>{{__('Product Code')}} : <strong class="text-info">{{$data->product_code}}</strong> </li>
                                                <li>{{__('Product Name')}} : <strong class="text-info">{{$data->product_name}}</strong></li>
                                                <li>{{__('Category')}} : <strong class="text-info">{{$data->category?->name}}</strong></li>
                                                <li>{{__('Subcategory')}} : <strong class="text-info">{{$data->subcategory?->name}}</strong></li>
                                                <li>{{__('Brand')}} : <strong class="text-info">{{$data->brand?->name}}</strong></li>

                                                @php
                                                    $all_colors = $data->colors ?? [];
                                                    $all_sizes = $data->sizes ?? [];
                                                @endphp

                                                <li>{{__('Colors')}} :
                                                    @foreach($all_colors as $color)
                                                        <strong class="badge badge-primary">{{$color->name}}</strong>
                                                    @endforeach
                                                </li>

                                                <li>{{__('Sizes')}} :
                                                    @foreach($all_sizes as $size)
                                                        <strong class="badge badge-info">{{$size->size_code}}</strong>
                                                    @endforeach
                                                </li>

                                                <li>{{__('Feature Status')}} : <strong class="text-info">{{ \App\Enums\ProductEnum::getText($data->feature) }}</strong></li>
                                                <li>{{__('Sold Count')}} : <strong class="text-info">{{$data->sold_count}}</strong></li>
                                            </ul>

                                        </td>
                                        <td>{!! get_barcode($data->barcode) !!}</td>
                                        <td class="text-info">{{ $data->quantity }}</td>
                                        <td class="text-info">{{ amount_with_currency_symbol($data->purchase_price) }}</td>
                                        <td class="text-info">{{ amount_with_currency_symbol($data->sale_price) }}</td>

                                        <td><x-status-span status="{{$data->status}}"/></td>
                                        <td>
                                            @can('product-edit')
                                                <a href="{{route('admin.product.edit',$data->id)}}" class="btn btn-outline-primary btn-sm mb-3 mr-1 product_edit_btn" data-toggle="tooltip" data-title="Edit">
                                                    <i class="ti-pencil"></i>
                                                </a>

                                                <form action="{{route('admin.product.clone')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <button type="submit" class="btn btn-outline-info btn-sm mb-3 mr-1 product_edit_btn" data-toggle="tooltip" data-title="Clone">
                                                        <i class="mdi mdi-content-copy"></i>
                                                    </button>
                                                </form>

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
