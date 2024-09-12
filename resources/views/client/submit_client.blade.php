<link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <p class="text-muted mb-4 mt-3">Enter your email address and name to visit to shop.</p>
                            </div>

                            <form action="#">

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Name</label>
                                    <input class="form-control" type="name" id="name" required="" placeholder="Enter your name">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Phone Number</label>
                                    <input class="form-control" type="text" required="" id="phone_number" placeholder="Enter your phone number">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit" onclick="submitClient()"> Submit </button>
                                </div>
                                <div class="form-group mb-0 text-center mt-2">
                                    <button class="btn btn-primary btn-block" type="submit"> VIsit to Shop </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('admin_assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('user_assets/js/pages/toastr.init.js') }}"></script>

<script>
    let submitClient = () => {
        console.log("dsdsd");
        var email = $("#emailaddress").val();
        var name = $("#name").val();
        var phoneNumber = $("#phone_number").val();

        if ( email === '' || name === '' || phoneNumber === '' ) {
            $.NotificationApp.send("Alarm!"
                ,"All of data is a must"
                ,"top-right"
                ,"#2ebbdb"
                ,"error",
            );
            return;
        } else {
            $.ajax({
                type: "POST",
                url: '{{ route("submit.clientdata") }}',
                data: {
                    email : email,
                    name : name,
                    phoneNumber: phoneNumber,
                    _token : '{{ csrf_token() }}'
                }
            }).done(function( msg ) {
                if( msg === "success" ) {
                    $.NotificationApp.send("Alarm!"
                        ,"Your password is correctly changed!"
                        ,"top-right"
                        ,"green"
                        ,"success",
                    );
                } else if (msg === "The client exist") {
                    $.NotificationApp.send("Alarm!"
                        ,"The client already exists!"
                        ,"top-right"
                        ,"green"
                        ,"success",
                    );
                    window.location.href = "https://shop.masmoney.es/";
                } else {
                    $.NotificationApp.send("Alarm!"
                        ,"Submit faield!"
                        ,"top-right"
                        ,"#2ebbdb"
                        ,"error",
                    );
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