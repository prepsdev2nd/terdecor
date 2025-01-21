@extends('app')

@push('page-title')
    Tambah Paket
@endpush

@push('page-styles')
    <style>
        .select2-container .select2-selection--multiple {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            height: auto;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .select2-container .select2-search--inline {
            display: inline-flex;
            align-items: center;
            flex: 1;
            margin: 0;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #86b7fe !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .select2-container .select2-selection--multiple:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .select2-selection__choice {
            background-color: #ffc20a !important;
            color: #000 !important;
            border: 0px !important;
            border-radius: 0.2rem;
            margin: 2px 4px !important;
            display: inline-flex;
            align-items: center;
            font-size: 0.875em;
            padding-top: 3px !important;
            padding-right: 3px !important;
            padding-bottom: 3px !important;
        }

        .select2-selection__choice__remove {
            color: #000 !important;
            border-right: 0px !important;
            padding: 3px 5px 3px 5px !important;
            cursor: pointer;
            margin-right: 5px;
        }

        .select2-selection__choice__remove:hover {
            background-color: rgba(255, 255, 255, 0.3) !important;
            transition: all 0.2s ease-in-out;
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            border: 1px solid #ced4da !important;
            border-radius: 0.375rem !important;
        }

        .select2-container--bootstrap-5 .select2-results__option--highlighted {
            background-color: #ffc20a !important;
            color: #000 !important;
        }
    </style>
@endpush

@section('content')
    <header class="page-header page-header-dark  pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="mb-0">Tambah Paket</h1>
                        <div class="small text-dark mt-2">
                            <a href="{{ route('admin.dashboard') }}" class="fw-500 text-dark"><i data-feather="home"></i>
                                Beranda </a>
                            /
                            <a href="{{ route('admin.package.index') }}" class="fw-500 text-dark"> Package </a>
                            / Tambah
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('admin.package.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <!-- Style Reference-->
        <form class="row" id="blog" action="{{ route('admin.package.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="col-lg-9">
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="title" class="form-label">Judul Paket<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Judul Paket" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="image" class="form-label">Cover Paket<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <div id="imagePreviewContainer" class="bg-light text-center mb-3"
                                        style="width: 100%;height: auto; border: 1px dashed #ccc; padding: 5px; border-radius: 4px;background-color:#f2f6fc;display:none;">
                                        <p class="mb-2">Pratinjau Cover Paket</p>
                                        <img id="imagePreview" class="mx-auto" style="width:100%;max-width:auto;">
                                    </div>
                                    <div>
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image" accept="image/*" required>
                                    </div>
                                    <div class="form-text">Direkomendasikan menggunakan gambar berukuran 1920x1080.</div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Deskripsi Paket<span
                                        class="text-danger">*</span></label>
                                <input name="content" type="hidden">
                                <div id="toolbar-container">
                                    <span class="ql-formats">
                                        <select class="ql-font"></select>
                                        <select class="ql-size"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <select class="ql-color"></select>
                                        <select class="ql-background"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-script" value="sub"></button>
                                        <button class="ql-script" value="super"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-header" value="1"></button>
                                        <button class="ql-header" value="2"></button>
                                        <button class="ql-blockquote"></button>
                                        <button class="ql-code-block"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-indent" value="-1"></button>
                                        <button class="ql-indent" value="+1"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-direction" value="rtl"></button>
                                        <select class="ql-align"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                        <button class="ql-video"></button>
                                        <button class="ql-formula"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-clean"></button>
                                    </span>
                                </div>
                                <div id="editor" style="min-height: 100px;">
                                </div>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="nav-sticky">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-sm-12">
                                <label for="lowest_price" class="form-label">Harga Terendah <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control @error('lowest_price') is-invalid @enderror"
                                    id="lowest_price" name="lowest_price" placeholder="Rp. xxx.xxx" required>
                                @error('lowest_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <label for="highest_price" class="form-label">Harga Tertinggi <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control @error('highest_price') is-invalid @enderror"
                                    id="highest_price" name="highest_price" placeholder="Rp. xxx.xxx" required>
                                @error('highest_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const quill = new Quill('#editor', {
            modules: {
                syntax: true,
                toolbar: '#toolbar-container',
            },
            placeholder: 'Ketik Sesuatu',
            theme: 'snow',
            height: 500,
        });

        var form = document.querySelector('#blog');
        form.onsubmit = function() {
            var content = document.querySelector('input[name=content]');
            content.value = quill.root.innerHTML;
        };

        document.getElementById('status-switch').addEventListener('change', function() {
            const statusLabel = document.getElementById('status-label');
            statusLabel.textContent = this.checked ? 'Publikasikan' : 'Draft';
        });
    </script>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const fileInput = event.target;
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');

            // Check if a file is selected
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                // Load the image and show the preview
                reader.onload = function(e) {
                    imagePreview.src = e.target.result; // Update the image src to the new file
                    imagePreview.style.display = 'block'; // Ensure the preview is visible
                    imagePreviewContainer.style.display = 'block'; // Ensure the preview is visible
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>
    <script>
        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        document.getElementById('lowest_price').addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value, 'Rp. ');
        });

        document.getElementById('highest_price').addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value, 'Rp. ');
        });
    </script>
@endpush
