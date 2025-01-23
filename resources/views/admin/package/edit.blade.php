@extends('app')

@push('page-title')
    Ubah Package
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
                        <h1 class="mb-0">Ubah Package</h1>
                        <div class="small text-dark mt-2">
                            <a href="{{ route('admin.dashboard') }}" class="fw-500 text-dark"><i data-feather="home"></i>
                                Beranda </a>
                            /
                            <a href="{{ route('admin.package.index') }}" class="fw-500 text-dark"> Package </a>
                            / Ubah
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
        <form class="row" id="blog" action="{{ route('admin.package.update', $data->id) }}" method="POST"
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
                                        id="title" name="title" placeholder="Judul Paket" value="{{ $data->title }}"
                                        required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="image" class="form-label">Gambar Paket<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <div class="row m-0 p-2 bg-light text-start align-items-start"
                                        style="width: 100%;height: auto; border: 1px dashed #ccc; padding: 5px; border-radius: 4px;background-color:#f2f6fc">
                                        <p class="mb-2">Pratinjau Gambar</p>

                                        @php
                                            // Split the image string into an array
                                            $images = explode(';', $data->image);
                                        @endphp

                                        <div id="imageContainer" class="d-flex flex-wrap">
                                            <div class="row">
                                                @foreach ($images as $index => $image)
                                                    <div class="col-6">
                                                        <div class="image-item me-2 mb-2" data-index="{{ $index }}">
                                                            <div class="rounded bg-white p-2"
                                                                style="border: 1px dashed #ccc; height: 150px;">
                                                                <div class="d-flex" style="height: 130px;">
                                                                    <img id="existingImagePreview{{ $index }}"
                                                                        src="{{ asset('images/packages/' . $image) }}"
                                                                        alt="Gambar {{ $index + 1 }}"
                                                                        class="mx-auto my-auto"
                                                                        style="max-height: 120px; max-width: 160px;">
                                                                </div>
                                                                <p class="text-center small">Gambar {{ $index + 1 }}</p>
                                                            </div>
                                                            <div class="mt-2 d-flex justify-content-between">
                                                                <input class="form-control form-control-sm" type="file"
                                                                    id="image{{ $index }}"
                                                                    name="images[{{ $index }}]" accept="image/*"
                                                                    multiple>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm remove-image"
                                                                    data-index="{{ $index }}">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-between">
                                        <button id="addImageField" type="button" class="btn btn-success btn-sm">Tambah
                                            Gambar</button>
                                    </div>
                                    <div class="form-text">Direkomendasikan menggunakan gambar berukuran 1920x1080.</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Konten Paket<span
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
                                    {!! $data->description !!}
                                </div>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sticky Nav-->
            <div class="col-lg-3">
                <div class="nav-sticky">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-sm-12">
                                <label for="price" class="form-label">Harga Mulai dari <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" placeholder="Rp. xxx.xxx" value="{{ $data->price }}"
                                    required>
                                @error('price')
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
    </script>
    <script>
        function formatRupiah(angka, prefix) {
            // Ensure the input is a string
            let number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
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

        document.getElementById('price').addEventListener('keyup', function(e) {
            this.value = formatRupiah(this.value, 'Rp. ');
        });

        // Format the value when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            const priceInput = document.getElementById('price');
            if (priceInput.value) {
                priceInput.value = formatRupiah(priceInput.value, 'Rp. ');
            }
        });
    </script>


    <script>
        document.getElementById('addImageField').addEventListener('click', function() {
            const container = document.getElementById('imageContainer');
            const count = container.querySelectorAll('.image-item').length;

            const newField = document.createElement('div');
            newField.classList.add('col-6');
            newField.setAttribute('data-index', count);
            newField.innerHTML = `
            <div class="image-item me-2 mb-2">
                <div class="rounded bg-white p-2" style="border: 1px dashed #ccc; height: 150px;">
                    <div class="d-flex" style="height: 130px;">
                        <img id="newImagePreview${count}" src="#" alt="Pratinjau ${count + 1}" 
                            class="mx-auto my-auto" style="max-height: 120px; max-width: 160px; display: none;">
                    </div>
                    <p class="text-center small">Gambar ${count + 1}</p>
                </div>
                <div class="mt-2 d-flex justify-content-between">
                    <input class="form-control form-control-sm" type="file" id="newImage${count}" 
                        name="images[new][${count}]" accept="image/*">
                    <button type="button" class="btn btn-danger btn-sm remove-image" data-index="${count}">Hapus</button>
                </div>
            </div>
            `;
            container.appendChild(newField);

            // Add event listener for previewing the new image
            const fileInput = newField.querySelector(`#newImage${count}`);
            const preview = newField.querySelector(`#newImagePreview${count}`);
            fileInput.addEventListener('change', function() {
                if (fileInput.files && fileInput.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            });

            // Add remove functionality
            newField.querySelector('.remove-image').addEventListener('click', function() {
                newField.remove();
            });
        });

        // Add preview functionality for existing images
        document.querySelectorAll('.image-item input[type="file"]').forEach(function(fileInput) {
            const index = fileInput.id.match(/\d+/)[0]; // Extract index from id
            const preview = document.getElementById(`existingImagePreview${index}`);

            fileInput.addEventListener('change', function() {
                if (fileInput.files && fileInput.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        });

        // Remove existing image fields
        document.querySelectorAll('.remove-image').forEach(function(button) {
            button.addEventListener('click', function() {
                const index = button.getAttribute('data-index');
                const imageItem = document.querySelector(`.image-item[data-index="${index}"]`);
                imageItem.remove();
            });
        });
    </script>
@endpush
