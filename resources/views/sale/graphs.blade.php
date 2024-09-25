@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('common_assets/plugin/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home_assets/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metrics/css/metric.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="wrapper">
        <div class="container-fluid mb-4">
            <div class="row mt- justify-content-center">
                <div class="col-xl-8 col-md-12 ">
                    <div class="content-calendar-genrate-left" style="padding-bottom: 0px">
                        <h3 class="metrics-chart-title mb-2">Referral Graphs</h4>
                        <div id="performancechart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('common_assets/plugin/apexchart/apexcharts.min.js') }}"></script>
    <script>
        var performanceChartOption = {
            series: [
                {
                    name: 'Unpaid Referral Earnings',
                    data: @json($unpaid)
                },
                {
                    name: 'Pending Referral Earnings',
                    data: @json($pending)
                },
                {
                    name: 'Rejected Referral Earnings',
                    data: @json($rejected)
                },
                {
                    name: 'Paid Referral Earnings',
                    data: @json($paid)
                }
            ],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            plotOptions: {
                bar: {
                    horizontal: false
                }
            },
            xaxis: {
                categories: @json($dates), // Dates for X-axis
            },
            fill: {
                opacity: 1
            },
            colors: ['#80c7fd', '#008FFB', '#80f1cb', '#00E396'],
            yaxis: {
                title: {
                    text: 'Earnings'
                },
                labels: {
                    formatter: (val) => {
                        return val / 1000 + 'K'; // Format Y-axis values
                    }
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left'
            }
        };

        var performanceChart = new ApexCharts(document.querySelector("#performancechart"), performanceChartOption);
        performanceChart.render();
    </script>
@endsection
