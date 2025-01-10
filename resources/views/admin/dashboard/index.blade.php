@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-8 mb-3 mb-lg-0">
            <div class="card h-100">
                <div class="card-body p-0">
                    <div class="row h-100">
                        <div class="col-7 ms-4 pt-3">
                            <div class="mb-4">
                                <h4 class="fs-5 text-primary fw-medium mb-0">Welcome back 🎉</h4>
                                <h4 class="fs-6 text-primary fw-bolder">{{ auth()->user()->name }}</h4>
                            </div>
                            <div>
                                <p class="fs-3 text-muted">Hope you have a wonderful and successful day!</p>
                                <p>You have several borrowing requests that have not been approved, Let's approved them.</p>
                            </div>
                            <div>
                                <a href="/admin/borrowings" class="btn bg-primary-subtle text-primary"> Borrowing List </a>
                            </div>
                        </div>
                        <div class="col align-self-end">
                            <img class="w-100" src="{{ asset('/assets/images/illustration/admin.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-6 col-md-3 col-lg-6">
                    <div class="card mb-0">
                        <div class="card-body d-flex flex-column gap-2 bg-info-subtle">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('/assets/images/svgs/computer.svg') }}" height="50px" width="50px" alt="computer icon">
                                <span class="fs-6 fw-bolder flex-grow-1 text-info text-center text-break">{{ $totalEquipment }}</span>
                            </div>
                            <div class="text-center">
                                <h5 class="mb-0 fs-3 text-info">Total <br> Equipment</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-6">
                    <div class="card">
                        <div class="card-body d-flex flex-column gap-2 bg-success-subtle">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('/assets/images/svgs/user.svg') }}" height="50px" width="50px" alt="user icon">
                                <span class="fs-6 fw-bolder flex-grow-1 text-success text-center text-break">{{ $totalBorrower }}</span>
                            </div>
                            <div class="text-center">
                                <h5 class="mb-0 fs-3 text-success">Total <br> Borrower</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-6">
                    <div class="card mb-0">
                        <div class="card-body d-flex flex-column gap-2 bg-warning-subtle">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('/assets/images/svgs/icon-briefcase.svg') }}" height="50px" width="50px" alt="">
                                <span class="fs-6 fw-bolder flex-grow-1 text-warning text-center text-break">{{ $equipmentBorrowed }}</span>
                            </div>
                            <div class="text-center">
                                <h5 class="mb-0 fs-3 text-warning">Equipment Borrowed</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-6">
                    <div class="card mb-0">
                        <div class="card-body d-flex flex-column gap-2 bg-danger-subtle">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('/assets/images/svgs/delivery-time.svg') }}" height="50px" width="50px" alt="">
                                <span class="fs-6 fw-bolder flex-grow-1 text-danger text-center text-break">{{ $borrowingPending }}</span>
                            </div>
                            <div class="text-center">
                                <h5 class="mb-0 fs-3 text-danger">Borrowing Pending</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-8 order-2 order-lg-1 ">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card rounded-end-0">
                        <div class="card-body">
                            <h4 class="card-title fs-4 fw-bolder mb-4">Top <span class="text-primary">Borrowed Equipment</span></h4>
                            <ul class="d-flex flex-column gap-4 align-items-md-center">
                                @foreach ($topBorrowedEquipment as $item)
                                    @switch($loop->iteration)
                                        @case(1)
                                            @php
                                                $bg = 'primary';
                                                $text = 'primary';
                                            @endphp
                                        @break

                                        @case(2)
                                            @php
                                                $bg = 'secondary';
                                                $text = 'secondary';
                                            @endphp
                                        @break

                                        @case(3)
                                            @php
                                                $bg = 'success';
                                                $text = 'success';
                                            @endphp
                                        @break

                                        @case(4)
                                            @php
                                                $bg = 'warning';
                                                $text = 'warning';
                                            @endphp
                                        @break

                                        @case(5)
                                            @php
                                                $bg = 'danger';
                                                $text = 'danger';
                                            @endphp
                                        @break

                                        @case(6)
                                            @php
                                                $bg = 'dark';
                                                $text = 'light';
                                            @endphp
                                        @break

                                        @case(7)
                                            @php
                                                $bg = 'light';
                                                $text = 'dark';
                                            @endphp
                                        @break
                                    @endswitch
                                    <li class="col-md-9 col-lg-12 d-flex justify-content-between align-items-center">
                                        <div class="me-3 bg-{{ $bg }}-subtle d-flex justify-content-center align-items-center rounded-2" style="height: 40px; width: 40px">
                                            <span class="text-{{ $text }} fw-bolder fs-4">{{ $loop->iteration }}</span>
                                        </div>
                                        <div class="d-flex flex-grow-1 flex-column gap-0">
                                            <f6 class="fw-bolder text-dark mb-0">{{ $item->name }}</f6>
                                            <span class="text-muted fs-2">{{ $item->code }}</span>
                                        </div>
                                        <span class="fs-5 text-dark fw-bolder lh-1">{{ $item->borrowings_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card rounded-start-0">
                        <div class="card-body">
                            <h4 class="card-title fs-4 fw-bolder mb-4">Top <span class="text-primary">Borrower</span></h4>
                            <ul class="d-flex flex-column gap-4 align-items-md-center">
                                @foreach ($topBorrower as $item)
                                    @switch($loop->iteration)
                                        @case(1)
                                            @php
                                                $bg = 'primary';
                                                $text = 'primary';
                                            @endphp
                                        @break

                                        @case(2)
                                            @php
                                                $bg = 'secondary';
                                                $text = 'secondary';
                                            @endphp
                                        @break

                                        @case(3)
                                            @php
                                                $bg = 'success';
                                                $text = 'success';
                                            @endphp
                                        @break

                                        @case(4)
                                            @php
                                                $bg = 'warning';
                                                $text = 'warning';
                                            @endphp
                                        @break

                                        @case(5)
                                            @php
                                                $bg = 'danger';
                                                $text = 'danger';
                                            @endphp
                                        @break

                                        @case(6)
                                            @php
                                                $bg = 'dark';
                                                $text = 'light';
                                            @endphp
                                        @break

                                        @case(7)
                                            @php
                                                $bg = 'light';
                                                $text = 'dark';
                                            @endphp
                                        @break
                                    @endswitch
                                    <li class="col-md-9 col-lg-12 d-flex justify-content-between align-items-center">
                                        <div class="me-3 bg-{{ $bg }}-subtle d-flex justify-content-center align-items-center rounded-2" style="height: 40px; width: 40px">
                                            <span class="text-{{ $text }} fw-bolder fs-4">{{ $loop->iteration }}</span>
                                        </div>
                                        <div class="d-flex flex-grow-1 flex-column gap-0">
                                            <f6 class="fw-bolder text-dark mb-0 text-truncate d-block">{{ $item->name }}</f6>
                                            <div class="text-muted fs-2">
                                                <span class="text-capitalize">{{ $item->role }}</span>
                                                <span class="d-inline-block mx-1">/</span>
                                                <span>{{ $item->identity_number }}</span>
                                            </div>
                                        </div>
                                        <span class="fs-5 text-dark fw-bolder lh-1">{{ $item->total }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 order-1 order-lg-2 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title fw-bolder mb-4">Borrowing Status</h4>

                    <div class="d-flex flex-column align-items-center">
                        <h5 class="fs-6 mb-0 text-dark ln-0 mb-2">Total</h5>
                        <a href="/admin/borrowings" class="d-flex flex-column align-items-center justify-content-center mb-4 bg-primary-subtle py-2 rounded-circle" style="height: 75px; width: 75px">
                            <span class="text-dark fw-bolder ln-0" style="font-size: 2rem">{{ $borrowings->count() }}</span>
                        </a>
                    </div>

                    <ul class="d-flex flex-column align-items-md-center gap-4">
                        <li class="col-md-9 col-lg-8 col-xl-12 d-flex align-items-center">
                            <span class="col-4 col-lg-3 col-xl-4 py-2 rounded-2 text-center text-light bg-dark">Pending</span>
                            <hr class="col-6 col-lg-7 col-xl-6 bg-dark" style="padding: 2px 0">
                            <span class="col-2 fs-5 fw-bolder text-end text-dark">{{ $borrowings->where('status', 'pending')->count() }}</span>
                        </li>
                        <li class="col-md-9 col-lg-8 col-xl-12 d-flex align-items-center">
                            <span class="col-4 col-lg-3 col-xl-4 py-2 rounded-2 text-center text-light bg-primary">Approved</span>
                            <hr class="col-6 col-lg-7 col-xl-6 bg-primary" style="padding: 2px 0">
                            <span class="col-2 fs-5 fw-bolder text-end text-dark">{{ $borrowings->where('status', 'approved')->count() }}</span>
                        </li>
                        <li class="col-md-9 col-lg-8 col-xl-12 d-flex align-items-center">
                            <span class="col-4 col-lg-3 col-xl-4 py-2 rounded-2 text-center text-light bg-success">Borrowed</span>
                            <hr class="col-6 col-lg-7 col-xl-6 bg-success" style="padding: 2px 0">
                            <span class="col-2 fs-5 fw-bolder text-end text-dark">{{ $borrowings->where('status', 'borrowed')->count() }}</span>
                        </li>
                        <li class="col-md-9 col-lg-8 col-xl-12 d-flex align-items-center">
                            <span class="col-4 col-lg-3 col-xl-4 py-2 rounded-2 text-center text-light bg-warning">Returned</span>
                            <hr class="col-6 col-lg-7 col-xl-6 bg-warning" style="padding: 2px 0">
                            <span class="col-2 fs-5 fw-bolder text-end text-dark">{{ $borrowings->where('status', 'returned')->count() }}</span>
                        </li>
                        <li class="col-md-9 col-lg-8 col-xl-12 d-flex align-items-center">
                            <span class="col-4 col-lg-3 col-xl-4 py-2 rounded-2 text-center text-light bg-danger">Rejected</span>
                            <hr class="col-6 col-lg-7 col-xl-6 bg-danger" style="padding: 2px 0">
                            <span class="col-2 fs-5 fw-bolder text-end text-dark">{{ $borrowings->where('status', 'rejected')->count() }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
