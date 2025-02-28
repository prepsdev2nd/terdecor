@extends('app')

@push('page-title')
    Daftar Customer
@endpush

@section('content')
    <header class="page-header page-header-dark  pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="mb-0">Daftar Customer</h1>
                        <div class="small text-dark mt-2">
                            <a href="{{ route('admin.dashboard') }}" class="fw-500 text-dark"><i data-feather="home"></i>
                                Beranda</a>
                            / Customer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card mb-4">
            <div class="card-body p-3">
                <table class="table table-bordered small text-center" id="blogsDatatable">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th width="200">Nama</th>
                            <th width="200">Whatsapp</th>
                            <th width="200">Email</th>
                            <th width="200">Kebersediaan Survey</th>
                            <th width="200">Tanggal Survey</th>
                            <th width="200">Tanggal Submit</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Survey</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Data Pribadi
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        <strong>Name:</strong> <span id="modalName"></span><br>
                                        <strong>Email:</strong> <span id="modalEmail"></span><br>
                                        <strong>Whatsapp:</strong> <span id="modalWhatsapp"></span><br>
                                        <strong>Alamat:</strong> <span id="modalAlamat"></span><br>
                                        <strong>Kota/Kabupaten:</strong> <span id="modalKota"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Informasi Rumah
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Luas Ruangan:</strong> <span id="modalLuasruangan"></span><br>
                                    <strong>Jumlah Ruangan:</strong> <span id="modalJumlahruangan"></span><br>
                                    <strong>Jenis Ruangan:</strong> <span id="modalJenisruangan"></span><br>
                                    <strong>Kebutuhan Ruangan:</strong> <span id="modalKebutuhanruangan"></span><br>
                                    <strong>Kebutuhan Rencana:</strong> <span id="modalKebutuhanrencana"></span><br>
                                    <strong>Kebutuhan Teknis:</strong> <span id="modalKebutuhanteknis"></span>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Informasi Proyek
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Proyek Akses:</strong> <span id="modalProyekakses"></span><br>
                                    <strong>Daftar Ruangan:</strong> <span id="modalRuangan"></span><br>
                                    <strong>Hal yang dipertahakan:</strong> <span id="modalPertahankan"></span><br>
                                    <strong>Hal yang diganti:</strong> <span id="modalDiganti"></span>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Preferensi Desain
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Prioritas Tujuan Desain:</strong> <span id="modalDesainprioritas"></span><br>
                                    <strong>Penggunaan Ramah Lingkungan:</strong> <span id="modalDesainramah"></span><br>
                                    <strong>Pilihan Suasana:</strong> <span id="modalDesainsuasana"></span><br>
                                    <strong>Gaya yang Diinginkan:</strong> <span id="modalDesaingaya"></span>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Preferensi Favorit
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Ketidaksukaan Gaya Pribadi:</strong> <span id="modalFavoritpribadi"></span><br>
                                    <strong>Prefensi Favorit:</strong> <span id="modalFavoritpreferensi"></span><br>
                                    <strong>Prefensi Warna:</strong> <span id="modalFavoritwarna"></span><br>
                                    <strong>Warna yang Dihindari:</strong> <span id="modalFavorittidak"></span><br>
                                    <strong>Tema Warna:</strong> <span id="modalFavorittema"></span><br>
                                    <strong>Informasi Tambahan:</strong> <span id="modalFavorittambahan"></span><br>
                                    <strong>Informasi Desainer Sebelumnya:</strong> <span id="modalFavoritdesainer"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-styles')
    <style>
        .nowrap {
            white-space: nowrap;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#blogsDatatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.customer.getData') }}",
                "columns": [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        name: 'iteration'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'handphone',
                        name: 'handphone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'tanggal_survey',
                        name: 'tanggal_survey'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'nowrap'
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
                                $('#blogsDatatable').DataTable().ajax.reload();
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.update-status').forEach(button => {
                button.addEventListener('click', function() {
                    console.log('Tombol diklik!'); // Debug: Periksa apakah tombol diklik
                });
            });
            const detailModal = document.getElementById('detailModal');

            detailModal.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                const button = event.relatedTarget;

                // Extract data-* attributes
                const name = button.getAttribute('data-name');
                const email = button.getAttribute('data-email');
                const whatsapp = button.getAttribute('data-whatsapp');
                const alamat = button.getAttribute('data-alamat');
                const kota = button.getAttribute('data-kota');
                const luas_ruangan = button.getAttribute('data-luasruangan');
                const jumlah_ruangan = button.getAttribute('data-jumlahruangan');
                const jenis_ruangan = button.getAttribute('data-jenisruangan');
                const kebutuhan_ruangan = button.getAttribute('data-kebutuhanruangan');
                const kebutuhan_rencana = button.getAttribute('data-kebutuhanrencana');
                const kebutuhan_teknis = button.getAttribute('data-kebutuhanteknis');
                const proyek_akses = button.getAttribute('data-proyekakses');
                const ruangan = button.getAttribute('data-ruangan');
                const pertahankan = button.getAttribute('data-pertahankan');
                const diganti = button.getAttribute('data-diganti');
                const desainprioritas = button.getAttribute('data-desainprioritas');
                const desainramah = button.getAttribute('data-desainramah');
                const desainsuasana = button.getAttribute('data-desainsuasana');
                const desaingaya = button.getAttribute('data-desaingaya');
                const favoritpribadi = button.getAttribute('data-favoritpribadi');
                const favoritpreferensi = button.getAttribute('data-favoritpreferensi');
                const favoritwarna = button.getAttribute('data-favoritwarna');
                const favorittidak = button.getAttribute('data-favorittidak');
                const favorittema = button.getAttribute('data-favorittema');
                const favorittambahan = button.getAttribute('data-favorittambahan');
                const favoritdesainer = button.getAttribute('data-favoritdesainer');
                const tanggalsurvey = button.getAttribute('data-tanggalsurvey');
                const status = button.getAttribute('data-status');

                // Update modal content
                document.getElementById('modalName').textContent = name;
                document.getElementById('modalEmail').textContent = email;
                document.getElementById('modalWhatsapp').textContent = whatsapp;
                document.getElementById('modalAlamat').textContent = alamat;
                document.getElementById('modalKota').textContent = kota;
                document.getElementById('modalLuasruangan').textContent = luas_ruangan;
                document.getElementById('modalJumlahruangan').textContent = jumlah_ruangan;
                document.getElementById('modalJenisruangan').textContent = jenis_ruangan;
                document.getElementById('modalKebutuhanruangan').textContent = kebutuhan_ruangan;
                document.getElementById('modalKebutuhanrencana').textContent = kebutuhan_rencana;
                document.getElementById('modalKebutuhanteknis').textContent = kebutuhan_teknis;
                document.getElementById('modalProyekakses').textContent = proyek_akses;
                document.getElementById('modalRuangan').textContent = ruangan;
                document.getElementById('modalPertahankan').textContent = pertahankan;
                document.getElementById('modalDiganti').textContent = diganti;
                document.getElementById('modalDesainprioritas').textContent = desainprioritas;
                document.getElementById('modalDesainramah').textContent = desainramah;
                document.getElementById('modalDesainsuasana').textContent = desainsuasana;
                document.getElementById('modalDesaingaya').textContent = desaingaya;
                document.getElementById('modalFavoritpribadi').textContent = favoritpribadi;
                document.getElementById('modalFavoritpreferensi').textContent = favoritpreferensi;
                document.getElementById('modalFavoritwarna').textContent = favoritwarna;
                document.getElementById('modalFavorittidak').textContent = favorittidak;
                document.getElementById('modalFavorittema').textContent = favorittema;
                document.getElementById('modalFavorittambahan').textContent = favorittambahan;
                document.getElementById('modalFavoritdesainer').textContent = favoritdesainer;
                document.getElementById('modalTanggalsurvey').textContent = tanggalsurvey;
                document.getElementById('modalStatus').textContent = status;
            });
        });
    </script>
@endpush
