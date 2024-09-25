@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('sales/css/affiliate.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="affiliate-url-wrapper">
        <div class="container-fluid mt-lg-2 mb-2">
            <h4 class="page-title text-center mb-3 affiliate-title">Affiliate URLs</h4>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-box ribbon-box">
                        <div class="ribbon ribbon-danger float-left copy-btn"><i class="mdi mdi-access-point mr-1"></i>Go to this url</div>

                        <h5 class="text-pink float-right mt-0 copy-btn">Your Affiliate Link</h5>
                        <div class="ribbon-content">
                            <p class="mb-0">
                                Share this link to earn commissions.
                            </p>
                            <input type="text" readonly class="form-control mt-2" id="affiliateurl" value={{$affLink}}>
                            <button class="btn btn-primary mt-2" onclick="copyLink()">
                                Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-box ribbon-box">
                        <div class="ribbon ribbon-danger float-right"><i class="mdi mdi-access-point mr-1"></i>
                            Page URL
                        </div>

                        <h5 class="text-danger float-left mt-0">Custom Link Generator</h5>
                        <div class="ribbon-content">
                            <p class="mb-0">
                                Enter any URL from this website in the form below to generate a custom link.
                            </p>
                            <input type="text" class="form-control mt-2" id="createaffiliatelink">
                            <button class="btn btn-primary mt-2">
                                Create Custorm Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let copyLink = () => {
              var copyText = document.getElementById("affiliateurl");

            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            document.execCommand("copy");

            $.NotificationApp.send("Alarm!"
                ,"The affiliate link is copied!"
                ,"top-right"
                ,"green"
                ,"success",
            );
            return;
        }
    </script>
@endsection
