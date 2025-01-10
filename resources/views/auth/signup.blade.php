@extends('layouts.auth')

@section('content')
    <div id="main-wrapper" class="auth-customizer-none">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible text-danger position-absolute end-0 mt-3 me-3 fade show" role="alert">
                        <i class="far fa-times-circle align-middle fs-6"></i>
                        <strong>{{ session('error') }}</strong>
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
                            <img src="{{ asset('assets/images/backgrounds/auth-signup.svg') }}" alt="modernize-img" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-1 fs-7 fw-bolder">Sign Up</h2>
                                <p class="mb-7">for Admin</p>
                                <form action="/signup" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" aria-describedby="textHelp" autocomplete="off" autofocus>
                                        @error('name')
                                            <span class="d-inline-block text-danger mt-1 fw-medium">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" autocomplete="off">
                                        @error('email')
                                            <span class="d-inline-block text-danger mt-1 fw-medium">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        @error('password')
                                            <span class="d-inline-block text-danger mt-1 fw-medium">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password_confirmation">
                                        @error('password')
                                            <span class="d-inline-block text-danger mt-1 fw-medium">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                        <a class="text-primary fw-medium ms-2" href="/login">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
