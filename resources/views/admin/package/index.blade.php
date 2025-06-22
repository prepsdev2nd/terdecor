@extends('app')

@push('page-title')
    Daftar Paket
@endpush

@section('content')
    <header class="page-header page-header-dark  pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="mb-0">Daftar Paket</h1>
                        <div class="small text-dark mt-2">
                            <a href="{{ route('admin.dashboard') }}" class="fw-500 text-dark"><i data-feather="home"></i>
                                Beranda</a>
                            / Paket
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-dark p-3" href="{{ route('admin.package.list') }}">
                            <span>Daftar List paket</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            @foreach ($globalPackages as $row)
                <div class="col-lg-6 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <form action="{{ route('admin.globalPackage.update', $row->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="name-{{ $row->id }}" class="form-label">Nama Paket</label>
                                    <input type="text" class="form-control" id="name-{{ $row->id }}" name="name"
                                        value="{{ $row->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="description-{{ $row->id }}" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="description-{{ $row->id }}" name="description" rows="3">{{ $row->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="photo-{{ $row->id }}" class="form-label">Ganti Gambar</label>
                                    <input type="file" class="form-control" id="photo-{{ $row->id }}"
                                        name="photo">
                                    <div class="mt-2">
                                        <img src="{{ asset('user/images/' . $row->photo) }}" alt="{{ $row->name }}"
                                            class="img-fluid mb-2" style="max-width: 150px;">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
            $('#packageDatatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.package.getData') }}",
                "columns": [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        name: 'iteration'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'list',
                        name: 'list'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'price',
                        name: 'price'
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
                                $('#packageDatatable').DataTable().ajax.reload();
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
