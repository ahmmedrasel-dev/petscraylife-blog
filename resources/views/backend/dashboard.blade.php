@extends('backend.backend-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Dashboard</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Adminox</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard 1</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card-box widget-box-two widget-two-custom">
                    <i class="mdi mdi-currency-usd widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total
                            Revenue</p>
                        <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span
                                data-plugin="counterup">65841</span></h2>
                        <p class="m-0">Jan - Apr 2017</p>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box widget-box-two widget-two-custom">
                    <i class="mdi mdi-account-multiple widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Unique
                            Visitors</p>
                        <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span
                                data-plugin="counterup">236521</span></h2>
                        <p class="m-0">Jan - Apr 2017</p>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box widget-box-two widget-two-custom">
                    <i class="mdi mdi-crown widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Number of
                            Transactions</p>
                        <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span
                                data-plugin="counterup">563698</span></h2>
                        <p class="m-0">Jan - Apr 2017</p>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box widget-box-two widget-two-custom">
                    <i class="mdi mdi-auto-fix widget-two-icon"></i>
                    <div class="wigdet-two-content">
                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Conversation
                            Rate</p>
                        <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span
                                data-plugin="counterup">2.07</span>%</h2>
                        <p class="m-0">Jan - Apr 2017</p>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">Revenue Comparison</h4>

                    <div class="text-center">
                        <h5 class="font-normal text-muted">You have to pay</h5>
                        <h3 class="m-b-30"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> 25643
                            <small>USD</small>
                        </h3>
                    </div>

                    <div class="chart-container">
                        <div class="" style="height:280px" id="platform_type_dates_donut"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">Visitors Overview</h4>

                    <div class="text-center">
                        <h5 class="font-normal text-muted">You have to pay</h5>
                        <h3 class="m-b-30"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i> 5623
                            <small>USD</small>
                        </h3>
                    </div>

                    <div class="chart-container">
                        <div class="" style="height:280px" id="user_type_bar"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">Goal Completion</h4>

                    <div class="text-center">
                        <h5 class="font-normal text-muted">You have to pay</h5>
                        <h3 class="m-b-30"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> 12548
                            <small>USD</small>
                        </h3>
                    </div>

                    <div class="chart-container">
                        <div class="chart has-fixed-height" style="height:280px" id="page_views_today"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container -->
@endsection
