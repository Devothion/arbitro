<header class="header">
    <div class="page-brand">
        <a href="{{ url('/admin/dashboard') }}">
            <span class="brand" style="color: #fff;">ARBITRAJE AR</span>
            <span class="brand-mini">AR</span>
        </a>
    </div>
    <div class="flexbox flex-1 pl-3 pr-3">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </li>
        </ul>

        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <span>Super User</span>
                    <img src="{{ asset('assets/img/users/admin-image.png') }}" alt="image" />
                </a>
                <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                    <div class="dropdown-arrow"></div>

                    <div class="dropdown-header">
                        <div class="admin-avatar">
                            <img src="{{ asset('assets/img/users/admin-image.png') }}" alt="image" />
                        </div>

                        <div>
                            <h5 class="font-strong text-white">Super User</h5>

                            <div>
                                <span class="admin-badge mr-3"><i class="ti-alarm-clock mr-2"></i>30m.</span>
                                <span class="admin-badge"><i class="ti-lock mr-2"></i>Safe Mode</span>
                            </div>
                        </div>
                    </div>

                    <div class="admin-menu-features">
                        <a class="admin-features-item"><i class="ti-user"></i>
                            <span>PROFILE</span>
                        </a>

                        <a href="{{ url('/') }}" class="admin-features-item"><i class="ti-settings"></i>
                            <span>ECOMMERCE</span>
                        </a>

                        <a class="admin-features-item"><i class="ti-shift-right"></i>
                            <span>SALIR</span>
                        </a>
                    </div>
                </div>
            </li>
            <li>
        </ul>
    </div>
</header>
