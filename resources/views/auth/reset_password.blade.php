
<link href="{{ asset('login_assets/reset_password.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

<div class="reset_password_container">
    <div class="reset_password_box">
        <div class="password_header">
            <div class="password_header_title">
                <img src="{{ asset('/login_assets/bg/logo_black.png') }}" alt="user-image" class="password_logo">
                {{-- <p class="password_header_title_text">MASMONEY</p> --}}
            </div>
            <p class="change-password_title">
                Change Password
            </p>
        </div>

        <div class="password_body">
            <span class="enter_password">Enter a new password for</span>
            <span class="your_email">{{$to_update_email}}</span>
            <input class="input_password" type="password" id="new_password" placeholder="Your new password">
            <input class="input_password" type="password" id="confirm_password" placeholder="Confirm your new password">
            <button class="reset_password_btn" onclick="reset_password()">
                Reset password
            </button>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('admin_assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('user_assets/js/pages/toastr.init.js') }}"></script>

<script>
    let reset_password = () => {
        var new_password = $("#new_password").val();
        var confirm_password = $("#confirm_password").val();
        if( new_password.length <= 7 ) {
            $.NotificationApp.send("Alarm!"
                ,"The password is invalid!"
                ,"top-right"
                ,"#2ebbdb"
                ,"error",
            );
            return;
        } else if ( new_password !== confirm_password ) {
            $.NotificationApp.send("Alarm!"
                ,"The password spell is not correct!"
                ,"top-right"
                ,"#2ebbdb"
                ,"error",
            );
            return;
        } else {
            $.ajax({
                type: "POST",
                url: '{{ route("reset.update") }}',
                data: {
                    email : "{{$to_update_email}}",
                    password : new_password,
                    _token : '{{ csrf_token() }}'
                }
            }).done(function( msg ) {
                if( msg['status'] == "success!" ) {
                    $.NotificationApp.send("Alarm!"
                        ,"Your password is correctly changed!"
                        ,"top-right"
                        ,"green"
                        ,"success",
                    );
                    $("#new_password").val("");
                    $("#confirm_password").val("");
                } else {
                    alert("This server seems have some problem!");
                }
            }).fail(function(xhr, textStatus, errorThrown) {
                $.NotificationApp.send("Alarm!"
                    ,"This server seems have some problem"
                    ,"top-right"
                    ,"#2ebbdb"
                    ,"error",
                );
            });
        }
    }

</script>


