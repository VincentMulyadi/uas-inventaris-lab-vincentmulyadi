<header class="topbar">
    <div class="with-vertical">
        <nav class="navbar navbar-expand-lg justify-content-between p-0">
            <ul class="navbar-nav">
                <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                    <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>

            <div class="d-block d-lg-none py-4">
                <a href="/" class="text-nowrap logo-img">
                    <img src="{{ asset('/assets/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                    <span class="fw-bolder fs-3 d-none d-sm-inline">PTIK Lab Computer</span>
                </a>
            </div>

            <ul class="navbar-nav flex-row align-items-center justify-content-center">
                <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="user-profile-img">
                                <img src="{{ asset('/assets/images/profile/user-1.jpg ') }}" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                        <div class="profile-dropdown position-relative" data-simplebar>
                            <div class="py-3 px-7 pb-0">
                                <h5 class="mb-0 fs-5 fw-semibold">Admin</h5>
                            </div>
                            <div class="d-flex align-items-center py-9 mx-7">
                                <img src="{{ asset('/assets/images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                                <div class="ms-3">
                                    <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                    <span class="mb-1 d-block">Lab Assistent</span>
                                </div>
                            </div>
                            <div class="pt-0 pb-3 px-7 border-bottom">
                                <p class="mb-0 d-flex align-items-center gap-2 text-break">
                                    <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email }}
                                </p>
                            </div>
                            <div class="d-grid py-4 px-7 pt-8">
                                <form action="/logout" method="post" class="d-block">
                                    @csrf
                                    <button class="btn btn-outline-primary w-100">Log Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
