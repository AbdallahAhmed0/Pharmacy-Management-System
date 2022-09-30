@extends('layouts.admin.main')
{{-- @include('layouts.admin.scripts') --}}

@extends('layouts.appdashboard')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/chart.js/Chart.min.css') }}">
@endpush

@push('page-header')
    <div class="col-sm-12" style="text-align: center">
        <h3 class="page-title">Welcome {{ auth()->user()->name }}!</h3>

    </div>
@endpush

@section('contents')
    <div class="row padding-right: 200px">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-primary border-primary">
                            <i class="fe fe-money"></i>
                        </span>
                        <div class="dash-count">
                            <h3>{{ $today_sales }} $</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h6 class="text-muted">Today Sales Cash</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-success">
                            <i class="fe fe-credit-card"></i>
                        </span>
                        <div class="dash-count">
                            <h3>{{ $total_categories }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Product Categories</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-danger border-danger">
                            <i class="fe fe-folder"></i>
                        </span>
                        <div class="dash-count">
                            <h3>{{ $total_expired_products }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Expired Products</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-warning border-warning">
                            <i class="fe fe-users"></i>
                        </span>
                        <div class="dash-count">
                            <h3>{{ \DB::table('users')->count() }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">System Users</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <div class="col-md-12 col-lg-8">

            <!-- Pie Chart -->
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title text-center">Resources</h4>
                </div>
                <div class="card-body">
                    <div style="">
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                    </div>
                </div>
            </div>
            <!-- /Pie Chart -->

        </div>
        </div>
    @endsection

    @push('page-js')
    </center>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
        var xValues = ["Total Purchases", "Total Suppliers", "Total Sales"];
        var yValues = [{{ $total_purchases }}, {{ $total_suppliers }}, {{ $total_sales }}];
        var barColors = [
            "#FF6384",
            "#36A2EB",
            "#7bb13c"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                }
            }
        });
    </script>
    <script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
