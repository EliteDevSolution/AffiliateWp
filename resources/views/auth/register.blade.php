@extends('layouts.admin')
@section('styles')
    <!-- third party css -->
    <link href="{{ asset('login_assets/style.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endsection

@section('content')
    <div class="row m-auto">
        <div class="col-12">
            <div class="register-content">

                <img src="{{ asset('/login_assets/bg/logo1.jpg') }}" alt="user-image" class="rounded-circle register-content-image d-none d-lg-block" height="200">
                <form class="text-center register-form" role="form" method="POST" action="{{ url('register') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h2 class="register-title pb-3">Create your account</h2>
                    {{-- <h4 class="register-subtitle pb-2">You are creating an account in the
                        <span class="register-subtitle-plan">PRO plan, 30-day free trial.</span>
                    </h4> --}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" id="alertMessage" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-6 col-md-12 form-group">
                            <div class="text-left register-label">First name<span class="text-danger">*</span></div>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}">
                        </div>
                        <div class="col-lg-6 col-md-12 form-group">
                            <div class="text-left register-label">Last name
                                <span class="text-danger">*</span>
                            </div>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12 form-group">
                            <div class="text-left register-label">Email
                                <span class="text-danger">*</span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-lg-6 col-md-12 form-group">
                            <div class="text-left register-label">Password
                                <span class="text-danger">*</span>
                            </div>
                            <div class="form-group login-pass-input">
                                <input type="password" class="login-pass-inputtag" id="password" name="password">
                                <i class="fas fa-eye pass-icon" id="togglePassword"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12 form-group">
                            <div class="text-left register-label">Mobile (Optional)</div>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <button type="submit" class="register-btn p-2 mt-2">
                        <span class="register-btn-label">
                            Sign Up
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @parent
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <script>
        // This is datarangepark
        $(document).ready(function(){
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            togglePassword.addEventListener('click', () => {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                const className = togglePassword.getAttribute('class') === 'fas fa-eye pass-icon' ? 'far fa-eye-slash pass-icon' : 'fas fa-eye pass-icon';
                togglePassword.setAttribute('class', className)
            });
        });
    </script>
@endsection
