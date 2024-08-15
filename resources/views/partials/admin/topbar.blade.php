<header id="topnav">
    <div class="navbar-custom">

        <div class="logo-box topbar-logo">
            <div class="logo text-right">
                <span class="logo-lg d-lg-flex flex-row">
                    <img src="{{ asset('/login_assets/bg/logo.jpg') }}" alt="user-image" class="rounded-circle" height="34">
                    <h4 class="logo-title ml-1 mt-sm-1 pt-1">@lang('FANSTOSELLERS')</h4>
                </span>
            </div>
        </div>

        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </li>
            </ul>

            @if ( Auth::user() == null )
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown d-none d-lg-block">
                        <a class="top-link nav-link dropdown-toggle waves-effect toolbar-text" data-toggle="" href="{{route('register')}}" >
                            REGISTER
                        </a>
                    </li>

                    <li class="dropdown d-none d-lg-block toolbar-text">
                        <a class="top-link nav-link dropdown-toggle waves-effect toolbar-text" data-toggle="" href="{{route('login')}}" >
                            LOGIN
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light text-black-50" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('admin_assets/images/users/standard.png') }}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{-- {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> --}}
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item"  onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="list-unstyled topnav-menu mb-0">
                    <li class="dropdown d-none d-lg-block logined-toolbar">
                        <a class="top-link nav-link dropdown-toggle waves-effect toolbar-text" data-toggle="" href="{{route('dashboard.index')}}" >
                            CALENDER
                        </a>
                    </li>

                    <li class="dropdown d-none d-lg-block ml-3">
                        <a class="top-link nav-link dropdown-toggle waves-effect toolbar-text" data-toggle="" href="{{route('register')}}" >
                            ADVERTISE
                        </a>
                    </li>

                    <li class="top-link dropdown d-none d-lg-block ml-3">
                        <a class="nav-link dropdown-toggle waves-effect toolbar-text" data-toggle="" href="{{route('register')}}" >
                            METRIX
                        </a>
                    </li>

                    <li class="top-link dropdown d-none d-lg-block ml-3">
                        <a class="nav-link dropdown-toggle waves-effect toolbar-text" data-toggle="" href="{{route('register')}}" >
                            COMMUNITY
                        </a>
                    </li>

                    <li class="top-link dropdown float-right topbar-user-logo">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light text-black-50" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('admin_assets/images/users/standard.png') }}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{-- {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> --}}
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item"  onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            @endif

        </div> <!-- end container-fluid-->
    </div>
            <!-- end Topbar -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu">
                                <a href="#">
                                    <i class="fe-airplay"></i>TOOLS<div class="arrow-down"></div>
                                </a>
                            </li>

                            <li class="has-submenu">
                                <a href="#">
                                    <i class="fe-airplay"></i>REGISTER<div class="arrow-down"></div>
                                </a>
                            </li>

                            <li class="has-submenu">
                                <a href="#">
                                    <i class="fe-airplay"></i>LOGIN<div class="arrow-down"></div>
                                </a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->

        </header>