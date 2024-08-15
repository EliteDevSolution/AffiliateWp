<div id="sidebar-menu">

    @php
        if(!isset($clients)) {
            $clients = getClient();
        }
    @endphp

    <ul class="metismenu" id="side-menu">
        @if( auth()->user()->hasRole("administrator") || auth()->user()->hasRole("master") )
            <li class="menu-title mt-2">admin</li>

            <li>
                <a href="javascript: void(0);">
                    <i class="fe-codepen"></i>
                    <span> User management </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li >
                        <a href="{{ route('users.index') }}">Users</a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>

