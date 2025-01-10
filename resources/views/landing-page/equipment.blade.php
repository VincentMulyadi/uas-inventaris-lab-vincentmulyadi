@extends('layouts.landing-page')

@section('content')
    <div class="container my-5">
        <div class="datatables">
            <div class="table-responsive py-3">
                <table class="table w-100 table-striped table-bordered text-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Borrowed</th>
                            <th>Available</th>
                            <th>Description</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
