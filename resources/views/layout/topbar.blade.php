<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="/beranda">
                    
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <p> APOTECH.ID </p>
                    </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- Notification -->
                <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i data-feather="bell" class="svg-icon"></i></span>
                        <span class="badge badge-primary notify-no rounded-circle" id="notify-no">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <ul class="list-style-none">
                            <li>
                                <div class="message-center notifications position-relative item-scrollable">
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-primary rounded-circle btn-circle"><i data-feather="box"
                                                class="text-white"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h6 class="message-title mb-0 mt-1">Information</h6> <span
                                                class="font-12 text-nowrap d-block text-muted">Your Notification Will
                                                Display Here</span>
                                            <span class="font-12 text-nowrap d-block text-muted">0:00 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link pt-3 text-center text-dark px-3 py-2" href="javascript:void(0);">
                                    <strong>Check all notifications</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Notification -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @guest
                        <span class="ml-2 d-none d-lg-inline-block">
                            <span>Hello, Apoteker</span>
                            <i data-feather="chevron-down"
                                        class="svg-icon"></i>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="{{ route('login') }}"><span
                                        class="ml-2 d-none d-lg-inline-block"><i data-feather="log-in"
                                            class="icon-login mr-2 ml-1"></i>{{ ('Login') }}</a>
                                @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">
                                    <span class="ml-2 d-none d-lg-inline-block">
                                        <i data-feather="user-plus" class="feather-icon mr-2 ml-1"></i>
                                        {{('Register') }}
                                    </span>
                                </a>
                                @endif
                            </div>
                            
                        </span>
                    </a>
                </li>
                @else
                
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span>Halo, <span class="text-dark">{{ Auth::user()->nama }}</span> <span class="caret"></span>
                            <i data-feather="chevron-down"
                                class="svg-icon"></i>
                        </span> 
                    </a>

                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i data-feather="log-out" class="svg-icon mr-2 ml-1"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>     
                    </div>
                </li>
                @endguest
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>