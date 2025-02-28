@extends('app')

@push('page-title')
    Dashboard
@endpush

@section('content')
    <header class="page-header page-header-dark  pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2 border border-warning">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Survey Bulan Ini</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $thisMonth }} Client</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-12 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header border border-danger">
                                <h5 class="card-title mb-0">Survey Hari Ini!</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="d-none d-xl-table-cell">Nama</th>
                                        <th class="d-none d-xl-table-cell">Alamat</th>
                                        <th class="d-none d-xl-table-cell">Status</th>
                                        <th class="d-none d-xl-table-cell">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($today as $row)
                                        <tr>
                                            <td>1</td>
                                            <td><span class="">{{ $row->name }}</span></td>
                                            <td class="d-none d-md-table-cell">{{ $row->alamat }} -
                                                {{ ucwords(strtolower($row->kota)) }}
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ $row->status }}</td>
                                            <td class="d-none d-md-table-cell">
                                                <a href="https://wa.me/{{ $row->phone }}" target="_blank"
                                                    class="btn btn-sm btn-success">
                                                    <i data-feather="message-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header border border-success">
                                <h5 class="card-title mb-0">Survey Terdekat (7 Hari terdekat)</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="d-none d-xl-table-cell">Nama</th>
                                        <th class="d-none d-xl-table-cell">Tanggal</th>
                                        <th class="d-none d-xl-table-cell">Status</th>
                                        <th class="d-none d-xl-table-cell">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($closest as $row)
                                        <tr>
                                            <td>1</td>
                                            <td><span class="">{{ $row->name }}</span></td>
                                            <td class="d-none d-md-table-cell">
                                                {{ \Carbon\Carbon::parse($row->tanggal_survey)->translatedFormat('l, d F Y') }}
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ $row->status }}</td>
                                            <td class="d-none d-md-table-cell">
                                                <a href="https://wa.me/{{ $row->phone }}" target="_blank"
                                                    class="btn btn-sm btn-success">
                                                    <i data-feather="message-square"></i>
                                                </a>
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
    </header>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endpush
