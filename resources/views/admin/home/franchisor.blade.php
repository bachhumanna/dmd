@extends('admin.home.template')

@section('body')

<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Dashboard
    <small></small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('franchisee.index') }}">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $franchiseeCount }}">0</span>
                </div>
                <div class="desc">Franchisees </div>
            </div>
        </a>
    </div>
    
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('driver.index') }}">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $driverCount }}">0</span>
                </div>
                <div class="desc">Companion Drivers</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('vehicles.index') }}">
            <div class="visual">
                <i class="fa fa-cab"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $vehicles }}">0</span>
                </div>
                <div class="desc">Vehicles</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ route('chart-report-year') }}">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $bookingCount }}"></span> </div>
                <div class="desc">Bookings</div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('client.index') }}">
            <div class="visual">
                <i class="fa fa-user"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $client }}">0</span>
                </div>
                <div class="desc"> Clients </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('chart-report-year') }}">
            <div class="visual">
                <i class="fa fa-euro"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ env('CURRENCY_SYM') }}<span data-counter="counterup" data-value="{{ $totalFranchiseRevenue }}">0</span>
                </div>
                <div class="desc"> Revenue</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="0">0</span>
                </div>
                <div class="desc">CRM 1</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="0"></span> </div>
                <div class="desc">CRM 2</div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
<div class="row">
    @include ("admin.home.graph")
</div>
<div class="clearfix"></div>

@endsection