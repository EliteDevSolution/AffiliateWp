@extends('layouts.admin')
@section('styles')
    <!-- third party css -->
    <link href="{{ asset('common_assets/plugin/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home_assets/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/style.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endsection

@section('content')
    <div class="wrapper">1
        <div class="container-fluid">
            <div class="home-container-header mt-3">
                <div class="header-container-left mt-3">
                    <p class="header-container-left-title">Welcome to {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}!</p>
                    <p class="header-container-left-subtitle mb-4">
                        You have 30 days left of your Free Trial
                    </p>
                    <button class="quick-post-btn mb-4">
                        Quick post
                    </button>
                </div>

                <div class="home-container-right">
                    <img src="{{ asset('/home_assets/img/digital_man.png') }}" alt="user-image" class="rounded-circle d-sm-block d-lg-block" height="200">
                    <div class="home-container-chart mb-2">
                        <div id="chart" class="flot-chart mt-2" style="height: 280px;"></div>
                        <p class="font-18 chat-label">
                            Understanding your <p class="font-18"><strong>Piper Score</strong></p>
                        </p>
                    </div>
                </div>
            </div>

            <div class="calendar-part">
                <div class="col-xl-7 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="calenar-generate-title">
                            Automatically generates a content calendar
                        </h3>
                        <div class="calendar-bottom-part mt-3">
                            <button class="calendar-contact-btn">Today</button>
                            <button class="calendar-contact-btn">Next 7 days</button>
                            <button class="calendar-contact-btn">Next 30 days</button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-md-12">
                    <div class="content-calendar-genrate-left">
                        <h3 class="calenar-generate-title">Create a single post</h3>
                        <div class="calendar-bottom-part mt-3">
                            <button class="calendar-contact-btn">Manually</button>
                            <button class="calendar-contact-btn">Automatically</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slideshow-container">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ( $to_send_data['template_image'] as $index_path => $path_value )
                            <div class="swiper-slide">
                                <img src="{{ asset($path_value['image_path']) }}" alt="user-image" class="slide_image" height="272" width="269">
                                <button class="template_post_btn">
                                    post
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

            <div class="publish-part">
                <div class="col-xl-7 col-md-12">
                    <div class="contianer">
                        <div class="calendar">
                        <div class="calendar-header">
                            <span class="month-picker" id="month-picker"> May </span>
                            <div class="year-picker" id="year-picker">
                            <span class="year-change" id="pre-year">
                                <pre class="m-0"><</pre>
                            </span>
                            <span id="year">2020 </span>
                            <span class="year-change" id="next-year">
                                <pre class="m-0">></pre>
                            </span>
                            </div>
                        </div>

                        <div class="calendar-body">
                            <div class="calendar-week-days">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="calendar-days">
                            </div>
                        </div>
                        <div class="calendar-footer">
                        </div>
                        <div class="date-time-formate">
                            <div class="day-text-formate">TODAY</div>
                            <div class="date-time-value">
                            <div class="time-formate">01:41:20</div>
                            <div class="date-formate">03 - march - 2022</div>
                            </div>
                        </div>
                        <div class="month-list"></div>
                        </div>
                    </div>
                </div>

                <div class="d-xl-block col-xl-5 col-md-12">
                    <div class="next-post-part">
                        <span class="expection-post-title">
                            My upcoming posts
                        </span>
                        <div class="show-post-part mt-5 mb-5">
                            <img src="{{ asset('/home_assets/img/new-post.png') }}" alt="user-image" class="" height="272" width="250">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 competitor-part">
                <div class="competitor-part-background">
                </div>

                <div class="competitor-text">
                    Tell me who your competitors are, or anybody you would like to watch for inspiration and I will show you a feed of their latest post.
                </div>
                <button class="competitor-btn">
                    Add more competitors
                </button>
            </div>

            <div class="row metric-advertise-container">
                <div class="col-lg-8 col-md-12 metric-container">
                    <p class="font-20">
                        <strong>My metrics</strong>
                        Last 30 days
                    </p>

                    <div class="metric-sub-part mt-3">
                        <div class="metric-publish-advertise-container">
                            <div class="metric-counter-container">
                                <p class="metric-counter-number">0</p>
                                <span class="metric-counter-label">POSTS</span>
                            </div>

                            <div class="metric-real-counter-container mt-2">
                                <div class="metric-real-counter">
                                    <span class="metric-real-number">0</span>
                                    <div class="metric-real-label">
                                        <i class="ti-user text-danger"></i>
                                        <span>REACH</span>
                                    </div>
                                </div>

                                <div class="metric-real-counter">
                                    <div class="metric-real-counter">
                                        <span class="metric-real-number">0</span>
                                        <div class="metric-real-label">
                                            <i class="ti-comment text-success"></i>
                                            <span>COMMENTS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="metric-real-counter-container mt-2 mr-3">
                                <div class="metric-real-counter">
                                    <span class="metric-real-number">0</span>
                                    <div class="metric-real-label">
                                        <i class="icon-heart text-pink"></i>
                                        <span>REACTIONS</span>
                                    </div>
                                </div>

                                <div class="metric-real-counter">
                                    <div class="metric-real-counter">
                                    <span class="metric-real-number">0</span>
                                    <div class="metric-real-label">
                                        <i class="icon-share text-danger"></i>
                                        <span>SHARES</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="metric-publish-advertise-container">
                            <div class="metric-counter-container">
                                <p class="metric-counter-number">0</p>
                                <span class="metric-counter-label">BOOTS</span>
                            </div>

                            <div class="metric-real-counter-container mt-2">
                                <div class="metric-real-counter">
                                    <span class="metric-real-number">0</span>
                                    <div class="metric-real-label">
                                        <i class="ti-user text-danger"></i>
                                        <span>REACH</span>
                                    </div>
                                </div>

                                <div class="metric-real-counter">
                                    <div class="metric-real-counter">
                                    <span class="metric-real-number">0</span>
                                    <div class="metric-real-label">
                                        <i class="ti-comment text-success"></i>
                                        <span>COMMENTS</span>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="metric-real-counter-container mt-2 mr-3">
                                <div class="metric-real-counter">
                                    <span class="metric-real-number">0</span>
                                    <div class="metric-real-label">
                                        <i class="icon-heart text-pink"></i>
                                        <span>REACTIONS</span>
                                    </div>
                                </div>

                                <div class="metric-real-counter">
                                    <div class="metric-real-counter">
                                    <span class="metric-real-number">0</span>
                                    <div class="metric-real-label">
                                        <i class="icon-share text-danger"></i>
                                        <span>SHARES</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 advertise-container">
                    <div class="advertise-container-background">
                        <span class="advertise-container-texts">
                            Boosts turn your posts into ads. They can help you reach more people, gain more followers and reactions.
                        </span>
                        <button class="competitor-btn mt-4">
                            Setup your budget
                        </button>
                    </div>
                </div>
            </div>

            <div id="create_post_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header-part mt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="font-20 text-blue" id="schedule_date">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="post-modal-body p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="font-18 text-blue" id="post-data-items">
                                        No tienes publicaciones en este día. ¡Crea una!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer row">
                            <div class="row reset-pass-btn mb-2">
                                <button type="button" class="mr-2 reset-cancel-btn col-md-3 btn waves-effect" data-dismiss="modal" onclick="close_modal()">
                                    Cancel
                                </button>
                                <button class="col-md-8 btn post-modal-btn waves-effect waves-light" id="btn_create_post" onclick="gotoPostFlow()">
                                    Create your post for now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- third party js -->
    <script src="{{ asset('common_assets/plugin/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('home_assets/js/calendar.js') }}"></script>
    <script src="{{ asset('common_assets/plugin/swiper/swiper.min.js') }}"></script>
    <!-- third party js ends -->
    <script>
        const currentDay = new Date().getDate();
        var options = {
          series: [75],
          chart: {
          height: 280,
          type: 'radialBar',
          toolbar: {
            show: true
          }
        },
        plotOptions: {
          radialBar: {
            startAngle: -135,
            endAngle: 225,
             hollow: {
              margin: 0,
              size: '70%',
              background: '#fff',
              image: undefined,
              imageOffsetX: 0,
              imageOffsetY: 0,
              position: 'front',
              dropShadow: {
                enabled: true,
                top: 3,
                left: 0,
                blur: 4,
                opacity: 0.24
              }
            },
            track: {
              background: '#fff',
              strokeWidth: '67%',
              margin: 0, // margin is in pixels
              dropShadow: {
                enabled: true,
                top: -3,
                left: 0,
                blur: 4,
                opacity: 0.35
              }
            },

            dataLabels: {
              show: true,
              name: {
                offsetY: -10,
                show: true,
                color: '#888',
                fontSize: '13px'
              },
              value: {
                formatter: function(val) {
                  return parseInt(val);
                },
                color: '#111',
                fontSize: '36px',
                show: true,
              }
            }
          }
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            type: 'horizontal',
            shadeIntensity: 0.5,
            gradientToColors: ['#ABE5A1'],
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100]
          }
        },
        stroke: {
          lineCap: 'round'
        },
        labels: ['Priper Score'],
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


        const swiper = new Swiper('.swiper-container', {
            loop: false,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 1,
            paginationClickable: true,
            spaceBetween: 20,
            breakpoints: {
                1920: {
                    slidesPerView: 4,
                    spaceBetween: 0
                },
                1028: {
                    slidesPerView: 2.3,
                    spaceBetween: 20
                },
                600: {
                    slidesPerView: 1.3,
                    spaceBetween: 20
                },
                380: {
                    slidesPerView: 1,
                    spaceBetween: 20
                }
            }
        });

        const calendar_modal = () => {
            $('#schedule_date').text(`${pickedMonthStr} ${pickedDay}, ${pickedYear}`);
            pickedDay < currentDay ? $('#btn_create_post').hide() : $('#btn_create_post').show();
            $("#create_post_modal").modal('show');
        }

        const close_modal = () => {
            $("#create_post_modal").modal('hide');
        }

        const gotoPostFlow = () => {
            $.post("{{ route('postflow.redirect_create') }}", {
                'create_date': `${pickedYear}-${pickedMonthBaseStr}-${pickedDay}`
            }).done(function(response) {
                if(response.status)
                {
                    location.href = "{{ route('postflow.index') }}";
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {

            });
        }
    </script>

@endsection
