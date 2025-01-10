<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    @include('partials.landing-page.header')

    @yield('style')
</head>

<body>


    <!-- Preloader -->
    <div class="preloader">
        <img src="../assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>

    @include('partials.landing-page.navbar')

@include('partials.landing-page.sidebar')

    <div class="main-wrapper overflow-hidden">
        @yield('content')
    </div>

    @include('partials.landing-page.footer')

    @yield('script')
</body>

</html>
