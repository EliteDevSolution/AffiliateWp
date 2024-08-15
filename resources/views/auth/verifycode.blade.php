@extends('layouts.admin')
@section('styles')
    <!-- third party css -->
    <link href="{{ asset('admin_assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/verifycode.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endsection

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="verify-container mt-2">
                        <div class="verify-container-top">
                            <img src="{{ asset('/login_assets/bg/logo.jpg') }}" alt="user-image" class="d-none d-lg-block rounded-circle login-content-image" height="200">
                            <div class="verify-container-top-informs">
                                <p class="verify-container-informs-header mb-2">Verify your email!</p>
                                <div class="verify-container-informs-body">
                                    <p class="mb-0">We have sent an email verification to</p>
                                    <p class="mb-0">
                                        <strong>tester@gmail.com</strong>
                                    </p>
                                    <p>check your email and insert the code here</p>
                                </div>
                                <div class="verification-code-input mt-2">
                                    <span><strong>VERIFICATION CODE:</strong></span>
                                    <input type="text" class="verify-code-input-text" id="veryfycode" name="veryfycode">
                                    <button type="submit" class="verify-code-input-btn" onclick="verifyCodeEmail()">
                                        <span class="login-btn-text">
                                            Contiune
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="verify-container-bottom">
                            <p>Didn't receive this email? Check your spam file. If you still don't receive it, resend verification email here.</p>
                            <p>Remember that this email may take a few minutes to arrive.</p>
                            <p>if your email is wrong or misspelled please contact us at: support@socialpiper.com or use our live chat for help.</p>
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
    <!-- third party js start-->

    <!-- third party js end-->
    <script>
        let verifyCodeEmail = () => {
            elementBlock('square1', 'html');
            $.ajax({
                type: "POST",
                url: 'verifycode/confirm-code',
                data: {
                    verify_code : $("#veryfycode").val(),
                    _token : '{{ csrf_token() }}'
                }
            }).done(function( msg ) {
                if (msg['status'] == "success") {
                    window.location.href = '{{route("login")}}';
                } else if (msg['status'] == "inccorect") {
                    $.NotificationApp.send("Alarm!"
                        ,"The verification code is not correct!"
                        ,"top-right"
                        ,"#2ebbdb"
                        ,"error",
                    );
                } else {
                    window.location.href = '{{route("register")}}';
                }
                elementUnBlock('html');
            }).fail(function(xhr, textStatus, errorThrown) {
                $.NotificationApp.send("Alarm!"
                    ,"Failed verify email!"
                    ,"top-right"
                    ,"#2ebbdb"
                    ,"error",
                );
                elementUnBlock('html');
            });
        }
    </script>
@endsection
