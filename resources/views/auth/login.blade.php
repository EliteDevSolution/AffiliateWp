@extends('layouts.admin')
@section('styles')
    <!-- third party css -->
    <link href="{{ asset('admin_assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/style.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endsection

@section('content')
    <div class="bg-layer">
        <div class="row login-container justify-content-between m-auto">
            <div class="col-12">
                <div class="login-content">
                    <img src="{{ asset('/login_assets/bg/logo.jpg') }}" alt="user-image" class="rounded-circle mt-5 d-none d-lg-block login-content-image" height="200">
                    <form class="login-form mt-5 text-center" role="form" method="POST" action="{{ url('login') }}">
                        <p class="login-header text-center">Welcome Back!</p>
                        <h5 class="login-subtitle">
                            <span class="login-subtitle">
                                Don't you have an account yet?
                                <a href="{{route('register')}}" class="login-signup-href">
                                    Sign Up
                                </a>
                            </span>
                        </h5>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger" id="alertMessage" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger" id="alertMessage" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        {{-- <h2 class="mb-lg-2">FANSTOSELLERS</h2> --}}
                        <div class="form-group mt-3">
                            <div class="text-left login-label">E-mail</div>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="text-left login-label">Password</div>
                        <div class="form-group login-pass-input">
                            <input type="password" class="form-control login-pass-inputtag" id="password" name="password">
                            <i class="far fa-eye-slash pass-icon" id="togglePassword"></i>
                        </div>
                        <button type="submit" class="login-btn-text mt-2">
                            Login
                        </button>
                        <div class="login-bottom pt-3">
                            <span class="login-bottom-remember text-black-50">
                                <input type="checkbox"/>
                                Remember me
                            </span>
                            <span class="login-bottom-forgot text-black-50" data-toggle="modal" data-target="#con-close-modal">
                                Forgot Password?
                            </span>
                        </div>
                    </form>
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title pl-2">Reset your password</h4>
                                </div>
                                <div class="modal-body p-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                Please write the email you registered in Social Piper. You'll receive a link to create a new password.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="field-3" class="control-label">E-mail</label>
                                                <input type="text" class="form-control" id="forgot_password_email" placeholder="E-mail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer row">
                                    <div class="row reset-pass-btn mb-2">
                                        <button type="button" class="mr-2 reset-cancel-btn col-md-3 btn waves-effect" data-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="button" class="col-md-5 btn reset-send-btn waves-effect waves-light" onclick="forgot_password()">
                                            Send email
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            If you encounter any problem, please contact us at support@socialpiper.com or use our live chat.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @parent
    {{-- <script src="{{ asset('user_assets/js/jquery_3.3.1_jquery.min.js') }}"></script> --}}

    <script>
        $(".alert").fadeTo(4000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            const className = togglePassword.getAttribute('class') === 'fas fa-eye pass-icon' ? 'far fa-eye-slash pass-icon' : 'fas fa-eye pass-icon';
            togglePassword.setAttribute('class', className)
        });

        let forgot_password = () => {
            if( $("#forgot_password_email").val() === "" ) {
                $.NotificationApp.send("Alarm!"
                    ,"Type your email address please!"
                    ,"top-right"
                    ,"#2ebbdb"
                    ,"error",
                );
                $("#forgot_password_email").focus();
                return;
            }
            elementBlock('square1', '.modal-dialog');
            $.ajax({
                type: "POST",
                url: 'forgot_password',
                data: {
                    email : $("#forgot_password_email").val(),
                    _token : '{{ csrf_token() }}'
                }
            }).done(function( msg ) {
                if( msg['status'] == "Your email is sent" ) {
                    $.NotificationApp.send("Alarm!"
                        ,"Your email is sent!"
                        ,"top-right"
                        ,"green"
                        ,"success",
                    );
                } else {
                    $.NotificationApp.send("Alarm!"
                        ,"Your email does not exist!"
                        ,"top-right"
                        ,"#2ebbdb"
                        ,"error",
                    );
                }
                elementUnBlock('.modal-dialog');
            }).fail(function(xhr, textStatus, errorThrown) {
                $.NotificationApp.send("Alarm!"
                    ,"Failed verify email!"
                    ,"top-right"
                    ,"#2ebbdb"
                    ,"error",
                );
                elementUnBlock('.modal-dialog');
            });
        }
    </script>
@endsection
