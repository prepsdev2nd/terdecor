@extends('app')

@push('page-title')
    Daftar Checker
@endpush

@section('content')
    <header class="page-header page-header-dark  pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="mb-0">Daftar Checker</h1>
                        <div class="small text-dark mt-2">
                            <a href="{{ route('admin.dashboard') }}" class="fw-500 text-dark"><i data-feather="home"></i>
                                Beranda</a>
                            / Checker
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-dark p-3" href="{{ route('admin.checker.create') }}">
                            <span>Tambah <i data-feather="plus"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card mb-4">
            <div class="card-body p-3">
                <table class="table table-bordered small text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th width="200">Jenis</th>
                            <th width="200">Kategori</th>
                            <th width="300">Sub Kategori</th>
                            <th width="200">Harga</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        {{-- <form class="row" id="quality" action="{{ route('admin.checker.storeQuality') }}" method="POST">
            <div class="col-lg-3">
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="nama" class="form-label">Nama Kualitas<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="harga" class="form-label">Harga<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                        id="harga" name="harga" required>
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <table class="table table-bordered small text-center" id="dataTableQuality">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th width="200">Nama</th>
                                    <th width="200">Harga</th>
                                    <th width="100">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </form> --}}
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.checker.getData') }}",
                "columns": [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        name: 'iteration'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'kualitas',
                        name: 'kualitas'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                "drawCallback": function() {
                    feather.replace(); // Mengganti ikon Feather setelah render
                }
            });
        });


        function deleteRow(routeDelete) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Kamu tidak akan bisa mengembalikan aksi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(routeDelete)
                        .then(response => {
                            Swal.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                            ).then(() => {
                                $('#dataTable').DataTable().ajax.reload();
                            });
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the item.',
                                'error'
                            );
                            console.error('Delete error:', error);
                        });
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTableQuality').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.checker.getDataQuality') }}",
                "columns": [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        name: 'iteration'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                ],
                "drawCallback": function() {
                    feather.replace(); // Mengganti ikon Feather setelah render
                }
            });
        });


        function deleteRow(routeDelete) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Kamu tidak akan bisa mengembalikan aksi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(routeDelete)
                        .then(response => {
                            Swal.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                            ).then(() => {
                                $('#dataTableQuality').DataTable().ajax.reload();
                            });
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the item.',
                                'error'
                            );
                            console.error('Delete error:', error);
                        });
                }
            });
        }
    </script>
@endpush
