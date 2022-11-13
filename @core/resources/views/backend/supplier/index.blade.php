@extends('backend.admin-master')

@section('site-title')
    {{__('All Suppliers')}}
@endsection

@section('page-title')
    {{__('All Suppliers')}}
@endsection

@section('style')
    <x-media.css/>
    <x-admin-press-datatable.css/>
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
                                <h3 class="card-title">{{__('All Suppliers')}}</h3>
                            </div>
                            <div class="righ">
                               <a href="{{route('admin.supplier.new')}}" class="btn btn-info text-white">{{__('Add Supplier')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @can('supplier-delete')
                            <x-bulk-action/>
                        @endcan
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <x-bulk-th/>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Phone')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Country')}}</th>
                                    <th>{{__('Customer Type')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($all_suppliers as $data)
                                    <tr>
                                        <td>
                                            <x-bulk-delete-checkbox :id="$data->id" :index="$loop->index"/>
                                        </td>
                                        <td>
                                            {!! render_attachment_preview_for_admin($data->image) !!}
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->phone}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->country?->name}}</td>
                                        <td>{{ \App\Enums\SupplierEnum::getText($data->supplier_type) }}</td>
                                        <td>

                                            @can('supplier-edit')
                                                <a href="{{route('admin.supplier.edit',$data->id)}}" class="btn btn-outline-primary btn-sm mb-3 mr-1 supplier_edit_btn">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            @endcan

                                            @can('supplier-delete')
                                                <x-delete-popover :url="route('admin.supplier.delete',$data->id)"/>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-media.markup/>
@endsection

@section('script')
    <x-bulk-action-js url="{{route('admin.supplier.bulk.action')}}"/>
    <x-admin-press-datatable.js/>
    <x-media.js/>
    <x-btn.submit/>
    <x-btn.update/>
@endsection
