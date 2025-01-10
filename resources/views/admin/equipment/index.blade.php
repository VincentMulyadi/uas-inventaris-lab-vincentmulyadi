@extends('layouts.admin')

@section('content')
    <nav aria-label="breadcrumb" class="mb-3 d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Equipment</li>
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
    <!-- Modal -->
    <div id="addEquipmentModal" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" action="/admin/equipment" method="post">
                @csrf
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="AddEquipmentModalLabel">Add Equipment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-8 col-sm-9">
                            <div class="form-floating">
                                <input type="text" id="code" class="form-control" placeholder="Code" name="code" value="{{ old('code') }}" autocomplete="off" required>
                                <label for="code">Code</label>
                                <small class="form-text text-muted">Ex: RTR-001, SWC-002, MNT-003, etc.</small>
                            </div>
                        </div>
                        <div class="col-4 col-sm-3">
                            <div class="form-floating">
                                <input type="number" id="amount" class="form-control" min="1" placeholder="Amount" name="total_quantity" value="{{ old('total_quantity') }}" autocomplete="off" required>
                                <label for="amount">Amount</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" autocomplete="off" required>
                                <label for="name">Name</label>
                                <small class="form-text text-muted">Ex: Cisco Switch, Mikrotik Router Wireless, etc.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px" autocomplete="off" required>{{ old('description') }}</textarea>
                                <label for="description">Description</label>
                                <small class="form-text text-muted">Ex: 24 Port Switch, Dual Band Router Wireless, etc.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Add Equipment</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="datatables">
        <div class="card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-end">
                    <button id="btn-add-equipment" class="btn btn-primary d-flex align-items-center mb-3" data-bs-toggle="modal" data-bs-target="#addEquipmentModal">
                        <i class="ti ti-plus text-white me-1 fs-5"></i> Add Equipment
                    </button>
                </div>

                <div class="table-responsive overflow-y-hidden">
                    <table class="table w-100 table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Borrowed</th>
                                <th>Available</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipment as $item)
                                @php
                                    $borrowed = $item->borrowings->whereIn('status', ['approved', 'borrowed'])->count();
                                @endphp
                                <tr>
                                    <td>
                                        <span>{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->code }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->name }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <span class="badge text-bg-warning">{{ $borrowed }}</span>
                                            <span>/</span>
                                            <span>{{ $item->total_quantity }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <span class="badge text-bg-primary">{{ $item->total_quantity - $borrowed }}</span>
                                            <span>/</span>
                                            <span>{{ $item->total_quantity }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{ $item->description }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btn">
                                            <button id="btn-{{ $item->code }}" class="btn p-0 m-0" data-bs-toggle="modal" data-bs-target="#{{ $item->code }}">
                                                <i class="ti ti-eye fs-5" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Equipment"></i>
                                            </button>
                                            <form action="/admin/equipment/{{ $item->id }}" method="post" class="btn p-0 m-0" onsubmit="return confirm('Are you sure you want to delete this equipment ({{ $item->code }})?');">
                                                @csrf
                                                @method('delete')
                                                <button class="btn p-0 m-0" data-bs-toggle="tooltip" title="Delete Equipment">
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
    </div>
    @foreach ($equipment as $item)
        @php
            $borrowed = $item->borrowings->whereIn('status', ['approved', 'borrowed'])->count();
        @endphp

        <div id="{{ $item->code }}" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" action="/admin/equipment/{{ $item->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="myModalLabel">Edit Equipment</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 col-md-7 mb-3 mb-sm-0">
                                <div class="form-floating">
                                    <input type="text" id="update_code" class="form-control" placeholder="Code" name="code" value="{{ old('code', $item->code) }}" autocomplete="off" required>
                                    <label for="update_code">Code</label>
                                    <small class="form-text text-muted">Ex: RTR-001, SWC-002, MNT-003, etc.</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="row">
                                    <div class="col-6 pe-1">
                                        <div class=" form-floating">
                                            <input type="number" id="update_borrowed" class="form-control" placeholder="Borrowed" value="{{ $borrowed }}" disabled>
                                            <label for="update_borrowed">Borrowed</label>
                                        </div>
                                    </div>
                                    <div class="col-6 ps-1">
                                        <div class=" form-floating">
                                            <input type="number" id="update_total" class="form-control" min="{{ $borrowed }}" placeholder="Total" name="total_quantity" value="{{ old('total_quantity', $item->total_quantity) }}" autocomplete="off" required>
                                            <label for="update_total">Total</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" id="update_name" class="form-control" placeholder="Name" name="name" value="{{ old('name', $item->name) }}" autocomplete="off" required>
                                    <label for="update_name">Name</label>
                                    <small class="form-text text-muted">Ex: Cisco Switch, Mikrotik Router Wireless, etc.</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Description" id="update_description" name="description" style="height: 100px" autocomplete="off" required>{{ old('description', $item->description) }}</textarea>
                                    <label for="update_description">Description</label>
                                    <small class="form-text text-muted">Ex: 24 Port Switch, Dual Band Router Wireless, etc.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Edit Equipment</button>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection

@section('script')
    <script>
        $(".table").DataTable({
            "scrollX": true,
            "columnDefs": [{
                "className": "text-wrap",
                "targets": [1, 2, 5]
            }]
        });
    </script>
@endsection
