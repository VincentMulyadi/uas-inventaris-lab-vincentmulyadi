@extends('layouts.admin')

@section('content')
    <nav aria-label="breadcrumb" class="mb-3 d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Borrowing</li>
        </ol>
    </nav>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="d-flex gap-2 alert alert-danger alert-dismissible text-danger mt-3 fade show" role="alert">
                <i class="far fa-times-circle fs-6 align-middle"></i>
                <strong>{{ $error }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
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

    <div class="datatables">
        <div class="card">
            <div class="card-body p-3 p-md-4">
                <div class="table-responsive overflow-y-hidden">
                    <table class="table w-100 table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Name Equipment</th>
                                <th>Status</th>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowings as $borrowing)
                                <tr class="search-items">
                                    <td>
                                        <span>{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $borrowing->name }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $borrowing->role }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $borrowing->equipment->name }}</span>
                                    </td>
                                    <td>
                                        @switch($borrowing->status)
                                            @case('pending')
                                                <span class="badge bg-dark text-light">{{ $borrowing->status }}</span>
                                            @break

                                            @case('approved')
                                                <span class="badge bg-primary text-light">{{ $borrowing->status }}</span>
                                            @break

                                            @case('borrowed')
                                                <span class="badge bg-success text-light">{{ $borrowing->status }}</span>
                                            @break

                                            @case('returned')
                                                <span class="badge bg-warning text-light">{{ $borrowing->status }}</span>
                                            @break

                                            @case('rejected')
                                                <span class="badge bg-danger text-light">{{ $borrowing->status }}</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d-m-Y') }}</span>
                                    </td>
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($borrowing->return_date)->format('d-m-Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btn">
                                            <button id="btn-borrowing-{{ $borrowing->id }}" class="btn p-0 m-0" data-bs-toggle="modal" data-bs-target="#borrowing-{{ $borrowing->id }}-modal">
                                                <i class="ti ti-eye fs-5" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Borrowing"></i>
                                            </button>
                                            <form action="/admin/borrowings/{{ $borrowing->id }}" method="post" class="btn p-0 m-0" onsubmit="return confirm('Are you sure you want to delete this borrowing ({{ $borrowing->name }})?');">
                                                @csrf
                                                @method('delete')
                                                <button class="btn p-0 m-0" data-bs-toggle="tooltip" title="Delete Borrowing">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach ($borrowings as $borrowing)
        <div id="borrowing-{{ $borrowing->id }}-modal" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form class="modal-content" action="/admin/borrowings/{{ $borrowing->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="myModalLabel">Change Status</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="row mb-3">
                                    <div class="col-lg-6 pe-lg-1 mb-3 mb-lg-0">
                                        <div class="form-floating">
                                            <input type="text" id="update_name" class="form-control" placeholder="Name" value="{{ $borrowing->name }}" disabled>
                                            <label for="update_name">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-8 col-lg-4 pe-1">
                                        <div class="form-floating">
                                            <input type="text" id="update_identity_number" class="form-control" placeholder="Identity Number" value="{{ $borrowing->identity_number }}" disabled>
                                            <label for="update_identity_number">Identity Number</label>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-2 ps-1">
                                        <div class="form-floating">
                                            <input type="text" id="update_role" class="form-control" placeholder="Role" value="{{ $borrowing->role }}" disabled>
                                            <label for="update_role">Role</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-lg-6 pe-lg-1 mb-3 mb-lg-0">
                                        <div class="form-floating">
                                            <input type="text" id="update_code" class="form-control" value="{{ $borrowing->equipment->code }}" disabled>
                                            <label for="update_code">Code Equipment</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" id="update_equipment" class="form-control" value="{{ $borrowing->equipment->name }}" disabled>
                                            <label for="update_equipment">Name Equipment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 col-lg-6 pe-1">
                                        <div class="form-floating">
                                            <input type="date" id="update_borrow_date" class="form-control" placeholder="Borrow Date" value="{{ $borrowing->borrow_date }}" disabled>
                                            <label for="update_borrow_date">Borrow Date</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <div class="form-floating">
                                            <input type="date" id="update_return_date" class="form-control" placeholder="Return Date" value="{{ $borrowing->return_date }}" disabled>
                                            <label for="update_return_date">Return Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mb-lg-0">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea id="update_detail" class="form-control" placeholder="Detail" style="height: 100px" disabled>{{ $borrowing->detail }}</textarea>
                                            <label for="update_detail">Detail</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <h5 class="mb-3">Status</h5>
                                <div class="row justify-content-center">
                                    <div class="col-5 col-sm-4 col-lg-12">
                                        <div class="mb-3">
                                            <input type="radio" class="btn-check" name="status" id="btn-pending" autocomplete="off" value='pending' {{ $borrowing->status == 'pending' ? 'checked' : '' }}>
                                            <label class="d-block btn btn-outline-dark " for="btn-pending">Pending</label>
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-4 col-lg-12">
                                        <div class="mb-3">
                                            <input type="radio" class="btn-check" name="status" id="btn-approved" autocomplete="off" value="approved" {{ $borrowing->status == 'approved' ? 'checked' : '' }}>
                                            <label class="d-block btn btn-outline-primary " for="btn-approved">Approved</label>
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-4 col-lg-12">
                                        <div class="mb-3">
                                            <input type="radio" class="btn-check" name="status" id="btn-borrowed" autocomplete="off" value="borrowed" {{ $borrowing->status == 'borrowed' ? 'checked' : '' }}>
                                            <label class="d-block btn btn-outline-success " for="btn-borrowed">Borrowed</label>
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-4 col-lg-12">
                                        <div class="mb-3">
                                            <input type="radio" class="btn-check" name="status" id="btn-returned" autocomplete="off" value="returned" {{ $borrowing->status == 'returned' ? 'checked' : '' }}>
                                            <label class="d-block btn btn-outline-warning " for="btn-returned">Returned</label>
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-4 col-lg-12">
                                        <div class="mb-3">
                                            <input type="radio" class="btn-check" name="status" id="btn-rejected" autocomplete="off" value="rejected" {{ $borrowing->status == 'rejected' ? 'checked' : '' }}>
                                            <label class="d-block btn btn-outline-danger " for="btn-rejected">Rejected</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Change Status</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script>
        $(".table").DataTable({
            "scrollX": true,
            "columnDefs": [{
                "className": "text-wrap",
                "targets": [1, 3]
            }]
        });
    </script>
@endsection
