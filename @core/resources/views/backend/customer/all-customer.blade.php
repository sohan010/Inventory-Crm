@extends('backend.admin-master')
@section('style')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('All Customers')}}
@endsection

@section('page-title')
    {{__('All Customers')}}
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
                                <h3 class="card-title">{{__('All Customers')}}</h3>
                            </div>
                            <div class="righ">
                               <a href="{{route('admin.customer.new')}}" class="btn btn-info text-white">{{__('Add Customer')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @can('customer-delete')
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
                                @foreach($all_customers as $data)
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
                                        <td>{{ \App\Enums\CustomerEnum::getText($data->customer_type) }}</td>

                                        <td>

                                            @can('customer-edit')
                                                <a href="{{route('admin.customer.edit',$data->id)}}" class="btn btn-outline-primary btn-sm mb-3 mr-1 customer_edit_btn">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            @endcan

                                            @can('customer-delete')
                                                <x-delete-popover :url="route('admin.customer.delete',$data->id)"/>
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
@endsection

@section('script')
    <x-admin-press-datatable.js/>
    <x-bulk-action-js url="{{route('admin.customer.bulk.action')}}"/>
    <script>
        <x-btn.submit/>
        <x-btn.update/>
    </script>
@endsection
