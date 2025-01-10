@extends('layouts.auth')

@section('content')
    <div id="main-wrapper" class="auth-customizer-none">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                @if (session('success'))
                <div class="alert alert-primary alert-dismissible text-primary position-absolute end-0 mt-3 me-3 fade show" role="alert">
                    <i class="far fa-check-circle fs-6 align-middle"></i>
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="/" class="text-nowrap logo-img d-flex gap-1 align-items-center px-4 py-9 w-100">
                            <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                            <span class="fw-bolder fs-3">PTIK Lab Computer</span>
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
                            <img src="{{ asset('assets/images/backgrounds/auth-login.svg') }}" alt="modernize-img" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-1 fs-7 fw-bolder">Sign In</h2>
                                <p class="mb-7">to Admin</p>
                                <form action="/login" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" autocomplete="off" autofocus>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">Not signed up yet?</p>
                                        <a class="text-primary fw-medium ms-2" href="/signup">Create an account</a>
                                    </div>
                                    @if ($errors->has('login'))
                                        <span class="d-inline-block mt-3 fw-bolder fs-4 text-danger text-center">{{ $errors->first('login') }}</span>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
