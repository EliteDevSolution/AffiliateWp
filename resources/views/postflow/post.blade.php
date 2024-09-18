@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('postflow_assests/css/post.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('postflow_assests/css/calendar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="postflow-container container-fluid">
    <div class="postflow-subcontainer">
        <div class="" style="margin-top: 100px">
            <div class="btn-group-vertical mr-3 nav post-submenubar nav-pills mb-2 nav-pills-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="btn btn-light font-17 p-2 active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                    aria-selected="true">
                    My social <br>network
                </button>
                <button class="btn btn-light font-17 p-2 btn-group-topbroder" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                    aria-selected="false">
                    My <br>email
                </button>
                <button class="btn btn-light font-17 p-2 btn-group-topbroder" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                    aria-selected="false">
                    Landing <br>page or <br>blog
                </button>
            </div>
        </div>

        <div class="">
            <div class="tab-content pt-0">
                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <ul class="nav nav-tabs nav-bordered nav-justified">
                        <li class="nav-item">
                            <a href="#home-b2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                POST NOW
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                SHEDULE POST
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                AI PROMPT FOR YOU
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="home-b2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-title mb-4">
                                        <h4> Select services to sell and drag </h4>
                                    </div>
                                    <div class="row filterable-content">
                                        @for($index = 1; $index < 7; $index++)
                                            <div class="col-2 gal-box selectable">
                                                <a href="#" class="image-popup" title="Product {{ $index }}">
                                                    <img src="{{ asset("postflow_assests/images/products/product-$index.jpg") }}" class="img-fluid cursor-point" alt="work-thumbnail">
                                                </a>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <div id="accordion" class="mb-3">
                                <div class="card mb-1">
                                    <div class="card-header" id="">
                                        <h5 class="m-0">
                                            <a class="text-dark" data-toggle="collapse" href="#" aria-expanded="false">
                                                <div class="row filterable-content">
                                                    @for($index = 1; $index < 7; $index++)
                                                        <div class="col-2 social-service-container">
                                                            <div  class="service-place">
                                                                <img src="{{ asset("postflow_assests/images/plus.png") }}" style="opacity: 0.1" class="img-fluid cursor-point" alt="work-thumbnail">
                                                            </div>

                                                            <button type="button" class="btn btn-success width-sm waves-effect waves-light">
                                                                Post
                                                            </button>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="socialcollapseOne" class="collapse show mr-1" aria-labelledby="socialheadingOne" data-parent="#accordion">
                                        <div class="row m-2 justify-content-around">
                                                @if($enabledSocialList['facebook'])
                                                    <div class="social-card ml-2 connect-facebook social-connected" id="facebook">
                                                        <div class="social-card-icon">
                                                            <div class="selected-colored-icon selected-facebook-mask"></div>
                                                        </div>
                                                    </div>
                                                    <div class="social-card ml-2 connector-selected d-none">
                                                        <div class="social-card-icon">
                                                            <div class="selected-colored-icon selected-facebook-mask"></div>
                                                            <div class="social-icon-approved"><img alt="" src="{{ asset("common_assets/icons/approved.svg") }}"></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="social-card ml-2 connect-facebook">
                                                        <div class="social-card-icon">
                                                            <div class="colored-icon facebook-mask"></div>
                                                        </div>
                                                        <span class="social-connect-title">Conectar</span>
                                                    </div>
                                                @endif
                                                @if($enabledSocialList['instagram'])
                                                    <div class="social-card ml-2 connect-instagram social-connected" id="instagram">
                                                        <div class="social-card-icon">
                                                            <div class="selected-colored-icon selected-instagram-mask"></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="social-card ml-2 connect-instagram">
                                                        <div class="social-card-icon">
                                                            <div class="colored-icon instagram-mask"></div>
                                                        </div>
                                                        <span class="social-connect-title">Conectar</span>
                                                    </div>
                                                @endif
                                                @if($enabledSocialList['tiktok'])
                                                    <div class="social-card ml-2 connect-tiktok social-connected" id="tiktok">
                                                        <div class="social-card-icon">
                                                            <div class="selected-colored-icon selected-tiktok-mask"></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="social-card ml-2 connect-tiktok">
                                                        <div class="social-card-icon">
                                                            <div class="colored-icon tiktok-mask"></div>
                                                        </div>
                                                        <span class="social-connect-title">Conectar</span>
                                                    </div>
                                                @endif
                                                @if($enabledSocialList['twitter'])
                                                    <div class="social-card ml-2 connect-twitter social-connected" id="twitter">
                                                        <div class="social-card-icon">
                                                            <div class="selected-colored-icon selected-twitter-mask"></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="social-card ml-2 connect-twitter">
                                                        <div class="social-card-icon">
                                                            <div class="colored-icon twitter-mask"></div>
                                                        </div>
                                                        <span class="social-connect-title">Conectar</span>
                                                    </div>
                                                @endif
                                                @if($enabledSocialList['linkedin'])
                                                    <div class="social-card ml-2 connect-linkedin social-connected" id="linkedin">
                                                        <div class="social-card-icon">
                                                            <div class="selected-colored-icon selected-linkedin-mask"></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="social-card ml-2 connect-linkedin">
                                                        <div class="social-card-icon">
                                                            <div class="colored-icon linkedin-mask"></div>
                                                        </div>
                                                        <span class="social-connect-title">Conectar</span>
                                                    </div>
                                                @endif
                                                @if($enabledSocialList['linkedin'])
                                                    <div class="social-card ml-2 connect-linkedin social-connected" id="linkedin">
                                                        <div class="social-card-icon">
                                                            <div class="selected-colored-icon selected-linkedin-mask"></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="social-card ml-2 connect-linkedin">
                                                        <div class="social-card-icon">
                                                            <div class="colored-icon linkedin-mask"></div>
                                                        </div>
                                                        <span class="social-connect-title">Conectar</span>
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="profile-b2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-title mb-4">
                                        <h4> Select services to sell and drag </h4>
                                    </div>
                                    <div class="row filterable-content">
                                        @for($index = 1; $index < 7; $index++)
                                            <div class="col-2 gal-box selectable">
                                                <a href="#" class="image-popup" title="Product {{ $index }}">
                                                   <img id="product-{{ $index }}" src="{{ asset("postflow_assests/images/products/product-$index.jpg") }}" class="img-fluid cursor-point" alt="work-thumbnail" draggable="true" ondragstart="drag(event)">
                                                </a>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

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
                                        <div></div>
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

                        <div class="tab-pane" id="messages-b2">
                            Hahahaha
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                </div>

                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    This is second part
                </div>

                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="product-title mb-4">
                                <h4> Select services to sell and drag </h4>
                            </div>
                            <div class="row filterable-content">
                                @for($index = 1; $index < 7; $index++)
                                    <div class="col-2 gal-box selectable">
                                        <a href="#" class="image-popup" title="This is url!" data-plugin="tippy" data-tippy-followCursor="true">
                                            <img id="product-{{ $index }}" src="{{ asset("postflow_assests/images/products/product-$index.jpg") }}" class="img-fluid cursor-point" alt="work-thumbnail" draggable="true" ondragstart="drag(event)">
                                        </a>
                                        <button class="m-1 btn btn-warning btn-xs waves-effect waves-light">
                                            Copy link
                                        </button>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
    </div> <!-- end row-->
</div>
@endsection
@section('scripts')
    <!-- third party js -->
    <script>
        var scheduleDate = "{{ session('post_create_date') }}";
        const socialApprovedIconUrl = @json(asset("common_assets/icons/approved.svg"));

        document.addEventListener('DOMContentLoaded', function () {
            const productImages = document.querySelectorAll('.gal-box img');
            const servicePlaceImages = document.querySelectorAll('.service-place img');

            // Make product images draggable
            productImages.forEach(img => {
                img.setAttribute('draggable', 'true');

                img.addEventListener('dragstart', function (event) {
                    event.dataTransfer.setData('src', event.target.src); // Store the image src in the drag event
                });
            });

            // Enable dropping on service place images
            servicePlaceImages.forEach(target => {
                target.addEventListener('dragover', function (event) {
                    event.preventDefault(); // Prevent default to allow drop
                });

                target.addEventListener('drop', function (event) {
                    event.preventDefault();

                    // Get the src of the dragged image
                    const draggedImgSrc = event.dataTransfer.getData('src');

                    // Set the src of the drop target to the dragged image's src
                    if (draggedImgSrc) {
                        event.target.src = draggedImgSrc;
                        event.target.style.opacity = 1; // Make image fully visible
                    }
                });
            });
        });

    </script>

    <script src="{{ asset('postflow_assests/js/post.js') }}"></script>
    <script src="{{ asset('postflow_assests/js/custom_calendar.js') }}"></script>
    <script src="{{ asset('postflow_assests/js/app.min.js') }}"></script>
    <script src="{{ asset('postflow_assests/js/vendor.min.js') }}"></script>
@endsection
