@extends('backend.admin-master')
@section('site-title')
    {{__('Dashboard')}}
@endsection

@section('page-title')
    {{__('Dashboard')}}
@endsection

@section('content')
@php
    $statistics = [
        ['title' => 'Total Admin','value' => $total_admin, 'icon' => 'user'],
        ['title' => 'Total User','value' => $total_user, 'icon' => 'user'],
        ['title' => 'Total Causes','value' => $total_causes, 'icon' => 'agenda'],
    ];
@endphp

{{--    <div class="main-content-inner">--}}
{{--        <div class="row">--}}
{{--            <!-- seo fact area start -->--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="chart-wrapper margin-top-40">--}}
{{--                            <h2 class="chart-title">{{__("Raised Per Month In")}} {{date('Y')}}</h2>--}}
{{--                            <canvas id="monthlyRaised"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="chart-wrapper margin-top-40">--}}
{{--                            <h2 class="chart-title">{{__("Raised Per Day In Last 30Days")}}</h2>--}}
{{--                           <div>--}}
{{--                               <canvas id="monthlyRaisedPerDay"></canvas>--}}
{{--                           </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @foreach ($statistics as $data)--}}
{{--                    <div class="col-lg-3 col-md-4 mt-5 mb-3">--}}
{{--                        <div class="card card-hover">--}}
{{--                            <div class="dash-box text-white">--}}
{{--                                <h1 class="dash-icon">--}}
{{--                                    <i class="ti-{{ $data['icon'] }} mb-1 font-16"></i>--}}
{{--                                </h1>--}}
{{--                                <div class="dash-content">--}}
{{--                                    <h5 class="mb-0 mt-1">{{ $data['value'] }}</h5>--}}
{{--                                    <small class="font-light">{{ __($data['title']) }}</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}

{{--          <div class="col-lg-6">--}}
{{--            <div class="card margin-top-40">--}}
{{--                <div class="smart-card">--}}
{{--                    <h4 class="title">{{__('Recent Donation Logs')}}</h4>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-striped">--}}
{{--                            <thead>--}}
{{--                            <th>{{__('Donation ID')}}</th>--}}
{{--                            <th>{{__('Amount')}}</th>--}}
{{--                            <th>{{__('Payment Gateway')}}</th>--}}
{{--                            <th>{{__('Payment Status')}}</th>--}}
{{--                            <th>{{__('Date')}}</th>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($causes_recent as $data)--}}
{{--                                <tr>--}}
{{--                                    <td>#{{$data->id}}</td>--}}
{{--                                    <td>{{amount_with_currency_symbol($data->amount)}}</td>--}}
{{--                                    <td>{{str_replace('_',' ',$data->payment_gateway)}}</td>--}}
{{--                                    <td>--}}
{{--                                        @php $pay_status = $data->status; @endphp--}}
{{--                                        @if($pay_status == 'complete')--}}
{{--                                            <span class="alert alert-success">{{__($pay_status)}}</span>--}}
{{--                                        @elseif($pay_status == 'pending')--}}
{{--                                            <span class="alert alert-warning">{{__($pay_status)}}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>{{date_format($data->created_at,'d M Y h:i:s')}}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--            <div class="col-lg-6">--}}
{{--                <div class="card margin-top-40">--}}
{{--                    <div class="smart-card">--}}
{{--                        <h4 class="title">{{__('Recent Event Attendance Order')}}</h4>--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-striped">--}}
{{--                                <thead>--}}
{{--                                <th>{{__('Attendance ID')}}</th>--}}
{{--                                <th>{{__('Event Name')}}</th>--}}
{{--                                <th>{{__('Payment Status')}}</th>--}}
{{--                                <th>{{__('Date')}}</th>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('script')--}}
{{--    <script src="{{asset('assets/backend/js/chart.js')}}"></script>--}}
{{--    <script>--}}
{{--        $.ajax({--}}
{{--            url: '{{route('admin.home.chat.data')}}',--}}
{{--            type: 'POST',--}}
{{--            async: false,--}}
{{--            data: {--}}
{{--                _token : "{{csrf_token()}}"--}}
{{--            },--}}
{{--            success: function (data) {--}}
{{--                 labels = data.labels;--}}
{{--                 chartdata = data.data;--}}
{{--                 new Chart(--}}
{{--                    document.getElementById('monthlyRaised'),--}}
{{--                    {--}}
{{--                        type: 'bar',--}}
{{--                        data: {--}}
{{--                            labels: data.labels,--}}
{{--                            datasets: [{--}}
{{--                                label: '{{__('Amount Raised')}}',--}}
{{--                                backgroundColor: '#495262',--}}
{{--                                borderColor: '#495262',--}}
{{--                                data: data.data,--}}
{{--                            }]--}}
{{--                        }--}}
{{--                    }--}}
{{--                );--}}
{{--            }--}}
{{--        });--}}
{{--        $.ajax({--}}
{{--            url: '{{route('admin.home.chat.data.by.day')}}',--}}
{{--            type: 'POST',--}}
{{--            async: false,--}}
{{--            data: {--}}
{{--                _token : "{{csrf_token()}}"--}}
{{--            },--}}
{{--            success: function (data) {--}}
{{--                labels = data.labels;--}}
{{--                chartdata = data.data;--}}
{{--                new Chart(--}}
{{--                    document.getElementById('monthlyRaisedPerDay'),--}}
{{--                    {--}}
{{--                        type: 'line',--}}
{{--                        data: {--}}
{{--                            labels: data.labels,--}}
{{--                            datasets: [{--}}
{{--                                label: '{{__('Amount Raised')}}',--}}
{{--                                backgroundColor: '#F86048',--}}
{{--                                borderColor: '#F86048',--}}
{{--                                data: data.data,--}}
{{--                            }]--}}
{{--                        }--}}
{{--                    }--}}
{{--                );--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}


<!-- Row -->
<div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                    <h3 class="">2456</h3>
                    <h6 class="card-subtitle">New Projects</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mx-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                    <h3 class="">546</h3>
                    <h6 class="card-subtitle">Pending Project</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                    <h3 class="">$24561</h3>
                    <h6 class="card-subtitle">Total Cost</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mx-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                    <h3 class="">$30010</h3>
                    <h6 class="card-subtitle">Total Earnings</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-wrap">
                            <div>
                                <h4 class="card-title">Yearly Earning</h4>
                            </div>
                            <div class="ml-auto">
                                <ul class="list-inline">
                                    <li>
                                        <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Sales</h6> </li>
                                    <li>
                                        <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Earning ($)</h6> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="earning" style="height: 355px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3">
        <div class="card card-inverse card-info">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center">
                        <h1 class="text-white"><i class="ti-light-bulb"></i></h1></div>
                    <div>
                        <h3 class="card-title">Sales Analytics</h3>
                        <h6 class="card-subtitle">March  2017</h6> </div>
                </div>
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h2 class="font-light text-white"><sup><small><i class="ti-arrow-up"></i></small></sup>35487</h2>
                    </div>
                    <div class="col-6 p-t-10 p-b-20 text-right">
                        <div class="spark-count" style="height:65px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-inverse card-success">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center">
                        <h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>
                    <div>
                        <h3 class="card-title">Bandwidth usage</h3>
                        <h6 class="card-subtitle">March  2017</h6> </div>
                </div>
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h2 class="font-light text-white">50 GB</h2>
                    </div>
                    <div class="col-6 p-t-10 p-b-20 text-right align-self-center">
                        <div class="spark-count2" style="height:65px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

@endsection

@section('script')
{{--    <script src="{{asset('assets/backend/js/chart.js')}}"></script>--}}
{{--    <script>--}}
{{--        $.ajax({--}}
{{--            url: '{{route('admin.home.chat.data')}}',--}}
{{--            type: 'POST',--}}
{{--            async: false,--}}
{{--            data: {--}}
{{--                _token : "{{csrf_token()}}"--}}
{{--            },--}}
{{--            success: function (data) {--}}
{{--                 labels = data.labels;--}}
{{--                 chartdata = data.data;--}}
{{--                 new Chart(--}}
{{--                    document.getElementById('monthlyRaised'),--}}
{{--                    {--}}
{{--                        type: 'bar',--}}
{{--                        data: {--}}
{{--                            labels: data.labels,--}}
{{--                            datasets: [{--}}
{{--                                label: '{{__('Amount Raised')}}',--}}
{{--                                backgroundColor: '#495262',--}}
{{--                                borderColor: '#495262',--}}
{{--                                data: data.data,--}}
{{--                            }]--}}
{{--                        }--}}
{{--                    }--}}
{{--                );--}}
{{--            }--}}
{{--        });--}}
{{--        $.ajax({--}}
{{--            url: '{{route('admin.home.chat.data.by.day')}}',--}}
{{--            type: 'POST',--}}
{{--            async: false,--}}
{{--            data: {--}}
{{--                _token : "{{csrf_token()}}"--}}
{{--            },--}}
{{--            success: function (data) {--}}
{{--                labels = data.labels;--}}
{{--                chartdata = data.data;--}}
{{--                new Chart(--}}
{{--                    document.getElementById('monthlyRaisedPerDay'),--}}
{{--                    {--}}
{{--                        type: 'line',--}}
{{--                        data: {--}}
{{--                            labels: data.labels,--}}
{{--                            datasets: [{--}}
{{--                                label: '{{__('Amount Raised')}}',--}}
{{--                                backgroundColor: '#F86048',--}}
{{--                                borderColor: '#F86048',--}}
{{--                                data: data.data,--}}
{{--                            }]--}}
{{--                        }--}}
{{--                    }--}}
{{--                );--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endsection