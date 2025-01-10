<header class="header-fp top-0 p-0 w-100 z-3" style="position: sticky !important;">
    <nav class="navbar navbar-expand-lg py-2 py-lg-4" style="background-color: #eef3ff;">
        <div class="custom-container d-flex align-items-center justify-content-between">
            <a href="/" class="text-nowrap logo-img">
                <img src="{{ asset('/assets/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                <span class="fw-bolder fs-3">PTIK Lab Computer</span>
            </a>
            <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="ti ti-menu-2 fs-8"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 gap-xl-7 gap-8 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }} fs-4 fw-bold text-dark link-primary" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('form') ? 'active' : '' }} fs-4 fw-bold text-dark link-primary" href="/form">Lending Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('equipment') ? 'active' : '' }} fs-4 fw-bold text-dark link-primary" href="/equipment">Equipment List</a>
                    </li>
                </ul>
                <div>
                    @auth
                        <form action="/logout" method="post">
                            @csrf
                            <button class="btn btn-primary py-8 px-9">Log out</button>
                        </form>
                    @endauth
                    @guest
                        <a href="/login" class="btn btn-primary py-8 px-9">Log In</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>
