@extends('layouts.admin')
@section('styles')
    <!-- third party css -->
    <link href="{{ asset('dashboard_assets/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard_assets/css/dashboard.css') }}" rel="stylesheet" type="text/css" />

    <!-- third party css end -->
@endsection

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row justify-content-between create-account-panel">
                <div class="co1-7 mobile-protect-title">
                    <div class="page-title-box mt-lg-5">
                        <span class="d-none d-md-block dashboard-header-title">
                            Connect your accounts to create your
                            <p>first post</p>
                        </span>
                        <span class="d-md-none">
                            Connect your accounts to create your first post
                        </span>
                    </div>
                </div>
                <div class="co1-5 inform-protect-motherboard">
                    <div class="mt-lg-5 row inform-protect">
                       <div class="row protect-icon-part">
                            <i class="ti-css3 protect-icon"></i>
                            <span class="">
                                Secure <br>information
                            </span>
                        </div>
                        <div class="approved-part-app">
                            <span class="approved-part-label pb-1">
                                We are an app approved by:
                            </span>
                            <div class="row justify-content-center">
                                <img src="{{ asset('/dashboard_assets/images/facebook.png') }}" alt="user-image" class="project-social-image" height="200">
                                <img src="{{ asset('/dashboard_assets/images/instagram.jpg') }}" alt="user-image" class="project-social-image" height="200">
                                <img src="{{ asset('/dashboard_assets/images/tickok.png') }}" alt="user-image" class="project-social-image" height="200">
                                <img src="{{ asset('/dashboard_assets/images/twitter.jpg') }}" alt="user-image" class="project-social-image" height="200">
                                <img src="{{ asset('/dashboard_assets/images/linkedin.jpg') }}" alt="user-image" class="project-social-image" height="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 social-section">
                <div class="col">
                    <div class="card card-body">
                        <div class="social-card-image">
                            <img src="{{ asset('/dashboard_assets/images/facebook.png') }}" alt="user-image" class="card-image" height="200">
                            <span class="social-card-name">Facebook</span>
                        </div>
                        <span class="card-body-text">Connect your Facebook business page</span>
                        <a href="{{route('facebook-login')}}" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-body">
                        <div class="social-card-image">
                            <img src="{{ asset('/dashboard_assets/images/instagram.jpg') }}" alt="user-image" class="card-image" height="200">
                            <span class="social-card-name">Instagram</span>
                        </div>
                        <span class="card-body-text">To connect Instagram, first connect Facebook.</span>
                        <a href="javascript:void(0);" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-body">
                        <div class="social-card-image">
                            <img src="{{ asset('/dashboard_assets/images/tickok.png') }}" alt="user-image" class="card-image" height="200">
                            <span class="social-card-name">Tiktok</span>
                        </div>
                        <span class="card-body-text">Connect your Tiktok account or page</span>
                        <a href="javascript:void(0);" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-body">
                        <div class="social-card-image">
                            <img src="{{ asset('/dashboard_assets/images/twitter.jpg') }}" alt="user-image" class="card-image" height="200">
                            <span class="social-card-name">Twitter</span>
                        </div>
                        <span class="card-body-text">Connect your Twitter acount</span>
                        <a href="javascript:void(0);" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-body">
                        <div class="social-card-image">
                            <img src="{{ asset('/dashboard_assets/images/linkedin.jpg') }}" alt="user-image" class="card-image" height="200">
                            <span class="social-card-name">Linkedin</span>
                        </div>
                        <span class="card-body-text">Connect your Linkedin account or page</span>
                        <a href="javascript:void(0);" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 connect-us-part">
                    <a href="{{route('home.index')}}" class="connect-us">
                        Skip and go to Dashboard
                    </a>
                    <button class="connect-us-btn">
                        <span>
                            Create your first post
                        </span>
                    </button>
                </div>
            </div>

            <div class="row mt-4 agent-part">
                <div class="agent-part-image">
                    <img src="{{ asset('/login_assets/bg/logo.jpg') }}" alt="user-image" class="rounded-circle" height="30">
                    <span class="agent-part-image-text">
                        “Don't want to connect your accounts yet?”
                    </span>
                </div>
                <div class="agent-explain-part">
                    <span class="agent-explain-part-text">
                        Schedule a 1-on1- consultation to guide you and show<br>
                        you the full possibilities of Social Piper for your business
                    </span>
                </div>
                <button class="agent-part-btn">
                    Schedule
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @parent
    <!-- third party js -->
    <script src="{{ asset('common_assets/plugin/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/daterangepicker.js') }}"></script>

    <!-- third party js ends -->
    <!-- Datatables init -->
    <script>
        // This is datarangepark
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
        // This is chart
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30,40,35,50,49,60,70,91,125]
            }],
            xaxis: {
                categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
            }
        }
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        var chart1 = new ApexCharts(document.querySelector("#chart1"), options);

        chart.render();
        chart1.render();
    </script>
@endsection
