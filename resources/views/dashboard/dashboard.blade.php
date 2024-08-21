@extends('layouts.admin')
@section('styles')
    <!-- third party css -->
    <link href="{{ asset('dashboard_assets/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard_assets/css/dashboard.css') }}" rel="stylesheet" type="text/css" />

    <!-- third party css end -->
@endsection

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row justify-content-between create-account-panel">
                <div class="co1-7 mobile-protect-title">
                    <div class="page-title-box mt-lg-5">
                        <span class="d-none d-md-block dashboard-header-title">
                            Connect your accounts to create your
                            <p>first post</p>
                        </span>
                        <span class="d-md-none">
                            Connect your accounts to create your first post
                        </span>
                    </div>
                </div>
                <div class="co1-5 inform-protect-motherboard">
                    <div class="mt-lg-5 row inform-protect">
                       <div class="row protect-icon-part">
                            <i class="ti-css3 protect-icon"></i>
                            <span class="">
                                Secure <br>information
                            </span>
                        </div>
                        <div class="approved-part-app">
                            <span class="approved-part-label pb-1">
                                We are an app approved by:
                            </span>
                            <div class="row justify-content-center">
                                <img src="{{ asset('/dashboard_assets/images/facebook.png') }}" alt="user-image" class="project-social-image" height="200">
                                <img src="{{ asset('/dashboard_assets/images/instagram.jpg') }}" alt="user-image" class="project-social-image" height="200">
                                <img src="{{ asset('/dashboard_assets/images/tickok.png') }}" alt="user-image" class="project-social-image" height="200">
                                <img src="{{ asset('/dashboard_assets/images/twitter.jpg') }}" alt="user-image" class="project-social-image" height="200">
                                <img src="{{ asset('/dashboard_assets/images/linkedin.jpg') }}" alt="user-image" class="project-social-image" height="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 social-section">
                <div class="col">
                    @if($facebook)
                        ue">
                        <div class="social-card-image mt-3">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 34 34"><path fill="white" d="M17.002.337C7.798.337.337 7.798.337 17.002c0 8.317 6.093 15.21 14.061 16.465V21.82h-4.233v-4.818h4.233V13.33c0-4.18 2.489-6.485 6.294-6.485 1.823 0 3.733.325 3.733.325v4.098h-2.107c-2.066 0-2.713 1.287-2.713 2.605V17h4.618l-.738 4.818h-3.88v11.647c7.968-1.249 14.062-8.144 14.062-16.462 0-9.204-7.462-16.665-16.665-16.665z"></path></svg>
                            <span class="social-card-name text-white">Facebook</span>
                        </div>
                        <h4 class="text-white">{{ '@'.reset($facebook)['social_id'] }}</h4>
                        <div class="approved-image">
                            <img src="{{ asset("common_assets/icons/approved.svg") }}" height="30">
                        </div>
                        <a href="#" data-type="Facebook" class="btn-disconnect text-white waves-light mt-4 font-15 text-underline">Disconnect</a>
                </div>
                @else
                    <div class="card card-body">
                        <div class="social-card-image mt-3">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 34 34"><path fill="#43629F" d="M17.002.337C7.798.337.337 7.798.337 17.002c0 8.317 6.093 15.21 14.061 16.465V21.82h-4.233v-4.818h4.233V13.33c0-4.18 2.489-6.485 6.294-6.485 1.823 0 3.733.325 3.733.325v4.098h-2.107c-2.066 0-2.713 1.287-2.713 2.605V17h4.618l-.738 4.818h-3.88v11.647c7.968-1.249 14.062-8.144 14.062-16.462 0-9.204-7.462-16.665-16.665-16.665z"></path></svg>
                            <span class="social-card-name">Facebook</span>
                        </div>
                        <span class="card-body-text">Connect your Facebook business page</span>
                        <a href="{{ route('facebook-login') }}" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                    </div>
                @endif
            </div>

            <div class="col">
                @if($instagram)
                    <div class="card card-body bg-blue">
                        <div class="social-card-image mt-3">
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 32 32"><path fill="white" d="M16 7.988A8 8 0 007.988 16 8 8 0 0016 24.012 8 8 0 0024.012 16 8 8 0 0016 7.988zm0 13.219A5.218 5.218 0 0110.793 16 5.218 5.218 0 0116 10.793 5.218 5.218 0 0121.207 16 5.218 5.218 0 0116 21.207zm8.34-15.414a1.869 1.869 0 00-1.871 1.87c0 1.036.836 1.872 1.87 1.872a1.866 1.866 0 001.872-1.871 1.87 1.87 0 00-1.871-1.871zM31.617 16c0-2.156.02-4.293-.101-6.445-.121-2.5-.692-4.72-2.52-6.547-1.832-1.832-4.047-2.399-6.547-2.52-2.156-.12-4.293-.101-6.445-.101-2.156 0-4.293-.02-6.445.101-2.5.121-4.72.692-6.547 2.52C1.18 4.84.613 7.055.492 9.555.371 11.71.391 13.848.391 16s-.02 4.293.101 6.445c.121 2.5.692 4.719 2.52 6.547 1.832 1.832 4.047 2.398 6.547 2.52 2.156.12 4.293.101 6.445.101 2.156 0 4.293.02 6.445-.101 2.5-.122 4.719-.692 6.547-2.52 1.832-1.832 2.399-4.047 2.52-6.547.125-2.152.101-4.289.101-6.445zm-3.437 9.21A4.963 4.963 0 0127 27c-.55.55-1.078.894-1.79 1.18-2.054.816-6.933.632-9.21.632-2.277 0-7.16.184-9.215-.629a4.964 4.964 0 01-1.789-1.18 4.997 4.997 0 01-1.18-1.788c-.812-2.059-.629-6.938-.629-9.215s-.183-7.16.63-9.215a4.964 4.964 0 011.179-1.789 5.05 5.05 0 011.79-1.18c2.054-.812 6.937-.629 9.214-.629s7.16-.183 9.215.63c.71.284 1.242.628 1.789 1.179.55.55.894 1.078 1.18 1.789.812 2.055.628 6.938.628 9.215s.184 7.156-.632 9.21z"></path></svg>
                            <span class="social-card-name text-white">Instagram</span>
                        </div>                        <div class="card card-body bg-bl
                            <h4 class="text-white">{{ '@'.reset($instagram)['social_id'] }}</h4>
                            <div class="approved-image">
                                <img src="{{ asset("common_assets/icons/approved.svg") }}" height="30">
                            </div>
                            <a href="#" data-type="Instagram" class="btn-disconnect text-white waves-light mt-4 font-15 text-underline">Disconnect</a>
                        </div>
                    @else
                        <div class="card card-body">
                            <div class="social-card-image mt-3">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 32 32"><path fill="#DC3275" d="M16 7.988A8 8 0 007.988 16 8 8 0 0016 24.012 8 8 0 0024.012 16 8 8 0 0016 7.988zm0 13.219A5.218 5.218 0 0110.793 16 5.218 5.218 0 0116 10.793 5.218 5.218 0 0121.207 16 5.218 5.218 0 0116 21.207zm8.34-15.414a1.869 1.869 0 00-1.871 1.87c0 1.036.836 1.872 1.87 1.872a1.866 1.866 0 001.872-1.871 1.87 1.87 0 00-1.871-1.871zM31.617 16c0-2.156.02-4.293-.101-6.445-.121-2.5-.692-4.72-2.52-6.547-1.832-1.832-4.047-2.399-6.547-2.52-2.156-.12-4.293-.101-6.445-.101-2.156 0-4.293-.02-6.445.101-2.5.121-4.72.692-6.547 2.52C1.18 4.84.613 7.055.492 9.555.371 11.71.391 13.848.391 16s-.02 4.293.101 6.445c.121 2.5.692 4.719 2.52 6.547 1.832 1.832 4.047 2.398 6.547 2.52 2.156.12 4.293.101 6.445.101 2.156 0 4.293.02 6.445-.101 2.5-.122 4.719-.692 6.547-2.52 1.832-1.832 2.399-4.047 2.52-6.547.125-2.152.101-4.289.101-6.445zm-3.437 9.21A4.963 4.963 0 0127 27c-.55.55-1.078.894-1.79 1.18-2.054.816-6.933.632-9.21.632-2.277 0-7.16.184-9.215-.629a4.964 4.964 0 01-1.789-1.18 4.997 4.997 0 01-1.18-1.788c-.812-2.059-.629-6.938-.629-9.215s-.183-7.16.63-9.215a4.964 4.964 0 011.179-1.789 5.05 5.05 0 011.79-1.18c2.054-.812 6.937-.629 9.214-.629s7.16-.183 9.215.63c.71.284 1.242.628 1.789 1.179.55.55.894 1.078 1.18 1.789.812 2.055.628 6.938.628 9.215s.184 7.156-.632 9.21z"></path></svg>
                                <span class="social-card-name">Instagram</span>
                            </div>
                            <span class="card-body-text">To connect Instagram, first connect Facebook.</span>
                            <a href="javascript:void(0);" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                        </div>
                    @endif
                </div>

                <div class="col">
                    @if($tiktok)
                        <div class="card card-body bg-blue">
                            <div class="social-card-image mt-3">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 36 36"><path fill="white" fill-rule="evenodd" d="M17.9995 0.818359C8.51079 0.818359 0.818848 8.51106 0.818848 17.999C0.818848 27.487 8.51155 35.1797 17.9995 35.1797C27.4875 35.1797 35.1802 27.487 35.1802 17.999C35.1802 8.51106 27.489 0.818359 17.9995 0.818359ZM27.0894 15.9729C26.9153 15.9903 26.7412 15.9987 26.5672 15.9994C25.6254 15.9997 24.6984 15.7655 23.8699 15.3178C23.0414 14.8701 22.3375 14.2231 21.8217 13.4352V22.1678C21.8217 23.8795 21.1417 25.5211 19.9315 26.7315C18.7212 27.942 17.0796 28.6221 15.3679 28.6223C13.6561 28.6223 12.0144 27.9423 10.8039 26.7318C9.59347 25.5214 8.91344 23.8796 8.91344 22.1678C8.91344 20.4565 9.59305 18.8152 10.8028 17.6049C12.0126 16.3945 13.6536 15.7141 15.3649 15.7133C15.4996 15.7133 15.6313 15.7254 15.7638 15.7338V18.9126C15.6317 18.8911 15.4985 18.8777 15.3649 18.8724C14.9323 18.8723 14.5039 18.9575 14.1042 19.123C13.7045 19.2884 13.3413 19.531 13.0353 19.8369C12.7294 20.1428 12.4867 20.5059 12.3211 20.9056C12.1555 21.3053 12.0703 21.7337 12.0703 22.1663C12.0703 22.5989 12.1555 23.0273 12.3211 23.427C12.4867 23.8266 12.7294 24.1898 13.0353 24.4957C13.3413 24.8015 13.7045 25.0441 14.1042 25.2096C14.5039 25.3751 14.9323 25.4602 15.3649 25.4601C17.1814 25.4601 18.7912 24.0266 18.7912 22.2056L18.823 7.37502H21.8656C22.0045 8.69689 22.6037 9.92786 23.5583 10.8527C24.5129 11.7776 25.7623 12.3375 27.0879 12.4346L27.0894 15.9729Z" clip-rule="evenodd"></path></svg>
                                <span class="social-card-name text-white">Tiktok</span>
                            </div>
                            <h4 class="text-white">{{ '@'.reset($tiktok)['social_id'] }}</h4>
                            <div class="approved-image">
                                <img src="{{ asset("common_assets/icons/approved.svg") }}" height="30">
                            </div>
                            <a href="#" data-type="Tiktok" class="btn-disconnect text-white waves-light mt-4 font-15 text-underline">Disconnect</a>
                        </div>
                    @else
                        <div class="card card-body">
                            <div class="social-card-image mt-3">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 36 36"><path fill="#000" fill-rule="evenodd" d="M17.9995 0.818359C8.51079 0.818359 0.818848 8.51106 0.818848 17.999C0.818848 27.487 8.51155 35.1797 17.9995 35.1797C27.4875 35.1797 35.1802 27.487 35.1802 17.999C35.1802 8.51106 27.489 0.818359 17.9995 0.818359ZM27.0894 15.9729C26.9153 15.9903 26.7412 15.9987 26.5672 15.9994C25.6254 15.9997 24.6984 15.7655 23.8699 15.3178C23.0414 14.8701 22.3375 14.2231 21.8217 13.4352V22.1678C21.8217 23.8795 21.1417 25.5211 19.9315 26.7315C18.7212 27.942 17.0796 28.6221 15.3679 28.6223C13.6561 28.6223 12.0144 27.9423 10.8039 26.7318C9.59347 25.5214 8.91344 23.8796 8.91344 22.1678C8.91344 20.4565 9.59305 18.8152 10.8028 17.6049C12.0126 16.3945 13.6536 15.7141 15.3649 15.7133C15.4996 15.7133 15.6313 15.7254 15.7638 15.7338V18.9126C15.6317 18.8911 15.4985 18.8777 15.3649 18.8724C14.9323 18.8723 14.5039 18.9575 14.1042 19.123C13.7045 19.2884 13.3413 19.531 13.0353 19.8369C12.7294 20.1428 12.4867 20.5059 12.3211 20.9056C12.1555 21.3053 12.0703 21.7337 12.0703 22.1663C12.0703 22.5989 12.1555 23.0273 12.3211 23.427C12.4867 23.8266 12.7294 24.1898 13.0353 24.4957C13.3413 24.8015 13.7045 25.0441 14.1042 25.2096C14.5039 25.3751 14.9323 25.4602 15.3649 25.4601C17.1814 25.4601 18.7912 24.0266 18.7912 22.2056L18.823 7.37502H21.8656C22.0045 8.69689 22.6037 9.92786 23.5583 10.8527C24.5129 11.7776 25.7623 12.3375 27.0879 12.4346L27.0894 15.9729Z" clip-rule="evenodd"></path></svg>
                                <span class="social-card-name">Tiktok</span>
                            </div>
                            <span class="card-body-text">Connect your Tiktok account or page</span>
                            <a href="javascript:void(0);" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                        </div>
                    @endif
                </div>

                <div class="col">
                    @if($twitter)
                        <div class="card card-body bg-blue">
                            <div class="social-card-image mt-3">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 34 28"><path fill="white" d="M33.25 3.934a13.358 13.358 0 01-3.836 1.031 6.645 6.645 0 002.93-3.672 13.15 13.15 0 01-4.227 1.61A6.645 6.645 0 0023.25.796a6.66 6.66 0 00-6.66 6.664c0 .516.063 1.031.164 1.527A18.93 18.93 0 013.02 2.016a6.614 6.614 0 00-.907 3.363 6.665 6.665 0 002.97 5.55 6.719 6.719 0 01-3.013-.847v.082a6.662 6.662 0 005.34 6.54 7.052 7.052 0 01-1.754.226 8.86 8.86 0 01-1.257-.102 6.673 6.673 0 006.226 4.621 13.35 13.35 0 01-8.27 2.848c-.558 0-1.074-.02-1.609-.082a18.862 18.862 0 0010.23 2.988c12.25 0 18.954-10.148 18.954-18.957 0-.289 0-.578-.02-.867a14.345 14.345 0 003.34-3.445z"></path></svg>
                                <span class="social-card-name text-white">Twitter</span>
                            </div>
                            <h4 class="text-white">{{ '@'.reset($twitter)['social_id'] }}</h4>
                            <div class="approved-image">
                                <img src="{{ asset("common_assets/icons/approved.svg") }}" height="30">
                            </div>
                            <a href="#" data-type="Twitter" class="btn-disconnect text-white waves-light mt-4 font-15 text-underline">Disconnect</a>
                        </div>
                    @else
                        <div class="card card-body">
                            <div class="social-card-image mt-3">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 34 28"><path fill="#4FB1DD" d="M33.25 3.934a13.358 13.358 0 01-3.836 1.031 6.645 6.645 0 002.93-3.672 13.15 13.15 0 01-4.227 1.61A6.645 6.645 0 0023.25.796a6.66 6.66 0 00-6.66 6.664c0 .516.063 1.031.164 1.527A18.93 18.93 0 013.02 2.016a6.614 6.614 0 00-.907 3.363 6.665 6.665 0 002.97 5.55 6.719 6.719 0 01-3.013-.847v.082a6.662 6.662 0 005.34 6.54 7.052 7.052 0 01-1.754.226 8.86 8.86 0 01-1.257-.102 6.673 6.673 0 006.226 4.621 13.35 13.35 0 01-8.27 2.848c-.558 0-1.074-.02-1.609-.082a18.862 18.862 0 0010.23 2.988c12.25 0 18.954-10.148 18.954-18.957 0-.289 0-.578-.02-.867a14.345 14.345 0 003.34-3.445z"></path></svg>
                                <span class="social-card-name">Twitter</span>
                            </div>
                            <span class="card-body-text">Connect your Twitter account &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <a href="javascript:void(0);" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                        </div>
                    @endif
                </div>

                <div class="col">
                    @if($linkedin)
                        <div class="card card-body bg-blue">
                            <div class="social-card-image mt-3">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 30 30"><path fill="white" fill-rule="evenodd" d="M2.213 0H27.78C29.004 0 30 .968 30 2.163v25.672C30 29.03 29.004 30 27.78 30H2.214C.992 30 0 29.03 0 27.835V2.163C0 .968.992 0 2.213 0zm4.312 4a2.526 2.526 0 012.522 2.528 2.526 2.526 0 01-2.522 2.528A2.525 2.525 0 014 6.528 2.525 2.525 0 016.525 4zm-2.18 21h4.357V10.973H4.346V25zm7.087-14.027h4.17v1.917h.06c.58-1.102 2-2.265 4.118-2.265 4.406 0 5.22 2.904 5.22 6.682V25H20.65v-6.821c0-1.627-.028-3.72-2.261-3.72-2.265 0-2.61 1.773-2.61 3.603V25h-4.346V10.973z" clip-rule="evenodd"></path></svg>
                                <span class="social-card-name text-white">Linkedin</span>
                            </div>
                            <h4 class="text-white">{{ '@'.reset($linkedin)['social_id'] }}</h4>
                            <div class="approved-image">
                                <img src="{{ asset("common_assets/icons/approved.svg") }}" height="30">
                            </div>
                            <a href="#" data-type="Linkedin" class="btn-disconnect text-white waves-light mt-4 font-15 text-underline">Disconnect</a>
                        </div>
                    @else
                        <div class="card card-body">
                            <div class="social-card-image mt-3">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 30 30"><path fill="#0E76A8" fill-rule="evenodd" d="M2.213 0H27.78C29.004 0 30 .968 30 2.163v25.672C30 29.03 29.004 30 27.78 30H2.214C.992 30 0 29.03 0 27.835V2.163C0 .968.992 0 2.213 0zm4.312 4a2.526 2.526 0 012.522 2.528 2.526 2.526 0 01-2.522 2.528A2.525 2.525 0 014 6.528 2.525 2.525 0 016.525 4zm-2.18 21h4.357V10.973H4.346V25zm7.087-14.027h4.17v1.917h.06c.58-1.102 2-2.265 4.118-2.265 4.406 0 5.22 2.904 5.22 6.682V25H20.65v-6.821c0-1.627-.028-3.72-2.261-3.72-2.265 0-2.61 1.773-2.61 3.603V25h-4.346V10.973z" clip-rule="evenodd"></path></svg>
                                <span class="social-card-name">Linkedin</span>
                            </div>
                            <span class="card-body-text">Connect your Linkedin account or page</span>
                            <a href="javascript:void(0);" class="card-btn btn btn-primary waves-light mt-4">Connect</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 connect-us-part">
                    <a href="{{route('home.index')}}" class="connect-us">
                        Skip and go to Dashboard
                    </a>
                    <button class="connect-us-btn">
                        <span>
                            Create your first post
                        </span>
                    </button>
                </div>
            </div>

            <div class="row mt-4 agent-part">
                <div class="agent-part-image">
                    <img src="{{ asset('/login_assets/bg/logo.jpg') }}" alt="user-image" class="rounded-circle" height="30">
                    <span class="agent-part-image-text">
                        “Don't want to connect your accounts yet?”
                    </span>
                </div>
                <div class="agent-explain-part">
                    <span class="agent-explain-part-text">
                        Schedule a 1-on1- consultation to guide you and show<br>
                        you the full possibilities of Social Piper for your business
                    </span>
                </div>
                <button class="agent-part-btn">
                    Schedule
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @parent
    <!-- third party js -->
    <!-- third party js ends -->
    <script>
        $("a.btn-disconnect").click(function(evt) {
            const socialType = $(this).attr('data-type');
            $.confirm({
                title: 'Disconnect',
                content: `Do you want to disconnect continue ${socialType} account?`,
                draggable: true,
                type: 'red',
                closeIcon: false,
                icon: 'fa fa-exclamation-triangle',
                closeAnimation: 'top',
                buttons: {
                    somethingElse: {
                        text: "Ok",
                        btnClass: 'btn-danger',
                        keys: ['shift'],
                        action: function()
                        {
                            elementBlock('square1', 'html');
                            $.ajax({
                                type: "POST",
                                url: "{{ route('social.disconnect') }}",
                                data: {
                                    type : socialType,
                                }
                            }).done(function( msg ) {
                                location.reload();
                                elementUnBlock('html');
                            }).fail(function(xhr, textStatus, errorThrown) {
                                $.NotificationApp.send("Alert!"
                                    ,"The account discounnect failed."
                                    ,"top-right"
                                    ,"#ff001d"
                                    ,"error",
                                );
                                elementUnBlock('html');
                            });
                        }
                    },
                    cancel: function () {
                        return true;
                    },
                }
            });
        });

    </script>
@endsection
