@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('postflow_assests/css/post.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="postflow-container container-fluid">
    <div class="row">
        <div class="col-sm-3 mt-sm-4">
            <div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active show mb-2" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                    aria-selected="true">
                    My social network
                </a>
                <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                    aria-selected="false">
                    My whatsapp
                </a>
                <a class="nav-link mb-2" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                    aria-selected="false">
                    My email
                </a>
                <a class="nav-link mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                    aria-selected="false">
                    Randing page or blog
                </a>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="tab-content pt-0">
                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <ul class="nav nav-tabs nav-bordered nav-justified">
                        <li class="nav-item">
                            <a href="#home-b2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                AI PROMPT FOR YOU
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                POST NOW
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                SHEDULE POST
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="home-b2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-title mb-4">
                                        <h4><span class="btn btn-warning btn-xs">1</span> Select services to sell and drag </h4>
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
                                    <div class="card-header" id="socialheadingOne">
                                        <h5 class="m-0">
                                            <a class="text-dark" data-toggle="collapse" href="#socialcollapseOne" aria-expanded="false">
                                                <div class="row filterable-content">
                                                    @for($index = 1; $index < 7; $index++)
                                                        <div class="col-2 social-service-container">
                                                            <div  class="service-place">
                                                                <img src="{{ asset("postflow_assests/images/plus.png") }}" class="img-fluid cursor-point" alt="work-thumbnail">
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

                                    <div id="socialcollapseOne" class="collapse show" aria-labelledby="socialheadingOne" data-parent="#accordion">
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
                            Hmmmm
                        </div>

                        <div class="tab-pane" id="messages-b2">
                            Hahahaha
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    This is first part
                </div>

                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    This is second part
                </div>

                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    This is third part
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
    </script>
    <script src="{{ asset('postflow_assests/js/post.js') }}"></script>
    <!-- third party js ends -->
    <script>
        const socialApprovedIconUrl = @json(asset("common_assets/icons/approved.svg"));
    </script>
<script>

</script>
@endsection
