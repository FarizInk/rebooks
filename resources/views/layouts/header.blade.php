        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <b>
                            <img src="{!! asset('images/logo-icon.png') !!}" alt="homepage" class="dark-logo" />
                        </b>
                        <span>
                            <img src="{!! asset('images/logo-text.png') !!}" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-custom nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" method="get" action="{{ route('search') }}">
                                <input type="text" name="search" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                        @guest
                        <li style="padding: 17px 0px 0px 17px">
                            <a href="{{ route('login') }}" class="btn waves-effect waves-light btn-danger"> Masuk</a>
                            <a href="{{ route('register') }}" class="btn waves-effect waves-light btn-success"> Daftar</a>
                        </li>
                        @else
                        <li class="nav-item dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                            <a class="nav-link waves-effect waves-dark dropdown-toggle" href="#"><img src="{!! asset('images/profile') !!}/{{ Auth::user()->img }}" alt="user" class="profile-pic" /><span style="margin-left: 12px;">{{ Auth::user()->name }}</span></a>
                            <div style="position: absolute; top: 70px; right: 225px;">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('dashboard.index') }}"
                                    onclick="location.href = '{{ route('dashboard.index') }}';">Dashboard Penjualan</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>