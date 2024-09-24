@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('common_assets/plugin/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home_assets/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metrics/css/metric.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="wrapper">
        <div class="container-fluid mb-4">
            <div class="metric-container-header mt-3">
                <div class="header-container-left mt-3">
                    <div class="form-group mb-2 mt-1">
                        <lable for="inputState" class="sub-header-title">Measurement items</lable>
                        <select id="inputState" class="custom-form-control col-md-6">
                            <option>This week</option>
                            <option>The past 2 weeks</option>
                            <option>The past 3 days</option>
                            <option>The past 60 days</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="metrics-body">
                <div class="col-xl-6 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="metrics-chart-title mb-2">
                            How you have grown?
                        </h3>
                        <div id="growchart">
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="metrics-chart-title mb-2">Your masmoney score</h4>
                        <div id="scorechart"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-6 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="metrics-chart-title mb-2">
                            Your posts with the greatest reach
                        </h3>
                        <span class="metrics-chart-sub-header">
                            These are your best posts, which had a good reach. You can turn them into an ad and reach many more people.
                        </span>

                        <div class="custom-swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{"/home_assets/img/gallery2.jpg"}}" alt="user-image" class="slide_image" height="215" width="180">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{"/home_assets/img/gallery2.jpg"}}" alt="user-image" class="slide_image" height="215" width="180">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{"/home_assets/img/gallery2.jpg"}}" alt="user-image" class="slide_image" height="215" width="180">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{"/home_assets/img/gallery2.jpg"}}" alt="user-image" class="slide_image" height="215" width="180">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{"/home_assets/img/gallery2.jpg"}}" alt="user-image" class="slide_image" height="215" width="180">
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="content-calendar-genrate-left" style="padding-bottom: 0px">
                        <h3 class="metrics-chart-title mb-2">Performance of your posts</h4>
                        <div id="performancechart"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-12 col-md-12">
                    <div class="content-calendar-genrate-left" style="padding-bottom: 0px">
                        <h3 class="metrics-chart-title mb-2">The production made</h4>
                        <div id="productionchart"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-6 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="metrics-chart-title mb-2">Your network with the best interaction</h4>
                        <div id="bestinteraction" class="pipe-chart"></div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="metrics-chart-title mb-2">The best type of post</h4>
                        <div id="besttypeofpost" class="pipe-chart"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-6 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="metrics-chart-title mb-2">Likes</h4>
                        <div id="mostlike"></div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="metrics-chart-title mb-2">Comments</h4>
                        <div id="comments" class="pipe-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('common_assets/plugin/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('common_assets/plugin/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('metrics/js/metrics.js') }}"></script>
@endsection
