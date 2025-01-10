@extends('layouts.landing-page')

@section('style')
    <link rel="stylesheet" href="{{ '/assets/libs/daterangepicker/daterangepicker.css' }}">
    <link rel="stylesheet" href="{{ '/assets/libs/select2/dist/css/select2.min.css' }}">
@endsection

@section('content')
    <section class="py-lg-12 py-md-14 py-5">
        <div class="container-fluid">
            @if (session('success'))
                <div class="d-flex gap-2 alert alert-success alert-dismissible text-success end-0 mt-3 fade show" role="alert">
                    <i class="far fa-check-circle fs-6 align-middle"></i>
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="d-flex gap-2 alert alert-danger alert-dismissible text-danger end-0 mt-3 fade show" role="alert">
                    <i class="far fa-check-circle fs-6 align-middle"></i>
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mb-5">
                <h1 class="fw-bolder">Lending Form</h1>
            </div>
            <div class="row g-7">
                <div class="col-lg-8">
                    <form class="/form" method="post">
                        @csrf
                        <div class="d-flex flex-column gap-sm-7 gap-3">
                            <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                <div class="d-flex flex-column flex-grow-1 gap-2">
                                    <label for="name" class="fs-3 fw-semibold text-dark">
                                        Name
                                    </label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" autocomplete="off" required autofocus>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 gap-2">
                                    <label for="role" class="fs-3 fw-semibold text-dark">
                                        Role
                                    </label>
                                    <div class="d-flex align-items-center gap-5 h-100">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input primary check-outline outline-primary" type="radio" id="lecturer" name="role" value="lecturer" {{ old('role') == 'lecturer' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="lecturer">Lecturer</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input warning check-outline outline-warning" type="radio" id="student" name="role" value="student" {{ old('role') == 'student' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="student">Student</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                <div class="d-flex flex-column flex-grow-1 gap-2">
                                    <label for="role" class="fs-3 fw-semibold text-dark">
                                        Identity Number
                                    </label>
                                    <input type="text" name="identity_number" id="role" placeholder="Identity Number" class="form-control" value="{{ old('identity_number') }}" autocomplete="off" required>
                                    <small class="text-muted">NIM for student | NIP for lecturer</small>
                                </div>
                            </div>
                            <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                <div class="d-flex flex-column flex-grow-1 gap-2">
                                    <label for="name" class="fs-3 fw-semibold text-dark">
                                        Equipment
                                    </label>
                                    <select class="select2 form-control" name="equipment_id" autocomplete="off" required>
                                        <option disabled selected>Select Equipment</option>
                                        @foreach ($equipment as $item)
                                            <option value="{{ $item->id }}" {{ old('equipment_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">For details on availability and equipment description, <a href="/equipemnts" target="_blank">click here.</a></small>
                                </div>
                            </div>
                            <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                <div class="d-flex flex-column flex-grow-1 gap-2">
                                    <label for="name" class="fs-3 fw-semibold text-dark">
                                        Lending Period
                                    </label>
                                    <input type="text" name="duration_date" id="date" placeholder="Borrow Date - Return Date" class="form-control daterange" value="{{ old('duration_date') }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <label for="detail" class="fs-3 fw-semibold text-dark">Detail</label>
                                <textarea name="detail" id="detail" class="form-control" rows="5" autocomplete="off" required>{{ old('name') }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mt-sm-7 mt-3 px-9 py-6">Submit</button>
                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="d-flex gap-2 alert alert-danger alert-dismissible text-danger mt-3 fade show" role="alert">
                                    <i class="far fa-times-circle fs-6 align-middle"></i>
                                    <strong>{{ $error }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('/assets/js/extra-libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(".daterange").daterangepicker({
            minDate: new Date(),
        });

        $(".daterange").val({!! json_encode(old('duration_date', '')) !!});

        $(".select2").select2();
    </script>
@endsection
