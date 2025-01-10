@extends('layouts.landing-page')

@section('content')
    <section class="my-5 my-md-14 my-lg-12">
        <div class="custom-container">
            <div class="bg-primary-subtle rounded-3 position-relative overflow-hidden">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="py-lg-12 ps-lg-12 py-5 px-lg-0 px-9">
                            <h2 class="fs-10 fw-bolder text-lg-start text-center">
                                Welcome to
                                <br> PTIK UNS computer lab
                            </h2>
                            <p class="fs-3 text-lg-start text-center mb-0">
                                Our computer lab is designed to foster <strong>creativity</strong>, <strong>collaboration</strong>, and <strong>learning</strong>.
                            </p>
                            <div class="d-flex justify-content-lg-start justify-content-center gap-3 my-4 flex-sm-nowrap flex-wrap">
                                <a href="/form" class="btn btn-primary py-6 px-9">Equipment Loan</a>
                                @guest
                                    <a href="/login" class="btn btn-outline-primary py-6 px-9">Login as Admin</a>
                                @endguest
                                @auth
                                    <a href="/admin" class="btn btn-outline-primary py-6 px-9">Dashobard</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-block d-none">
                        <img src="{{ asset('/assets/images/backgrounds/landing-page.png') }}" alt="banner" class=" object-fit-contain" style="width: 100%; height: 100%">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
