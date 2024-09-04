@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('postflow_assests/css/post.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="postflow-container container-fluid">
    <h2>Crear publicación</h2>
    <div class="row">
        <div class="col-md-5 col-sm-5 mt-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="product-title">
                        <h4><span class="btn btn-warning btn-xs">1</span> Productos de GESE</h4>
                    </div>
                    <div class="row filterable-content">
                        @for($index = 1; $index < 9; $index++)
                            <div class="col-sm-6 col-xl-3 filter-item all web">
                                <div class="gal-box selectable">
                                    <a href="#" class="image-popup" title="Product {{ $index }}">
                                        <img src="{{ asset("postflow_assests/images/products/product-$index.jpg") }}" class="img-fluid cursor-point" alt="work-thumbnail">
                                    </a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="card d-none">
                <div class="card-body">
                    <div class="product-title">
                        <h4><span class="btn btn-warning btn-xs">2</span> Video conferencia</h4>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="product-title">
                        <h4><span class="btn btn-warning btn-xs">2</span> Selecciona dónde publicar</h4>
                    </div>
                    <div class="row">
                        @if($enabledSocialList['facebook'])
                            <div class="social-card ml-2 connect-facebook social-connected">
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
                            <div class="social-card ml-2 connect-instagram social-connected">
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
                            <div class="social-card ml-2 connect-tiktok social-connected">
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
                            <div class="social-card ml-2 connect-twitter social-connected">
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
                            <div class="social-card ml-2 connect-linkedin social-connected">
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
            <div>
                <button type="button" class="btn btn-block btn-lg btn-blue waves-effect waves-light" onclick="tiktokPost()">Crea una publicación para este día</button>
            </div>
        </div>
        <div class="col-md-7 col-sm-7 mt-2">
            <div class="card preview-card">
                <img class="card-img-top img-fluid" src="{{ asset("postflow_assests/images/products/product-1.jpg") }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Product 1</h5>
                    <p class="card-text">This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a little bit
                        longer.</p>
                    <p class="card-text">
                        <small class="text-muted">test test</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <!-- third party js -->
    <script src="{{ asset('postflow_assests/js/post.js') }}"></script>
    <!-- third party js ends -->
    <script>
        const socialApprovedIconUrl = @json(asset("common_assets/icons/approved.svg"));
        let tiktokPost = () => {
            // $.NotificationApp.send("Alarm!"
            //     ,"Type your email address please!"
            //     ,"top-right"
            //     ,"#2ebbdb"
            //     ,"error",
            // );

            // elementBlock('square1', '.modal-dialog');
            $.ajax({
                type: "POST",
                url: 'tiktok-post',
                data: {
                    // email : $("#forgot-password-email").val(),
                    _token : '{{ csrf_token() }}'
                }
            }).done(function( msg ) {
                console.log(msg);
                // elementUnBlock('.modal-dialog');
            }).fail(function(xhr, textStatus, errorThrown) {
                $.NotificationApp.send("Alarm!"
                    ,"Failed verify email!"
                    ,"top-right"
                    ,"#2ebbdb"
                    ,"error",
                );
                // elementUnBlock('.modal-dialog');
            });
        }
    </script>
@endsection

