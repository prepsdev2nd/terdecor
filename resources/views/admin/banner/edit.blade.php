@extends('app')

@push('page-title')
    Ubah Banner
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
                        <h1 class="mb-0">Ubah Banner</h1>
                        <div class="small text-dark mt-2">
                            <a href="{{ route('admin.dashboard') }}" class="fw-500 text-dark"><i data-feather="home"></i>
                                Beranda </a>
                            /
                            <a href="{{ route('admin.banner.index') }}" class="fw-500 text-dark"> Banner </a>
                            / Ubah
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('admin.banner.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <!-- Style Reference-->
        <form class="row" id="banner" action="{{ route('admin.banner.update', $data->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="col-lg-9">
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="alt" class="form-label">Alt Banner<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control @error('alt') is-invalid @enderror"
                                        id="alt" name="alt" value="{{ $data->alt }}" required>
                                    @error('alt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="url" class="form-label">URL Banner<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        id="url" name="url" value="{{ $data->url }}" required>
                                    @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="image" class="form-label">Banner</label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <div class="row m-0 p-2 bg-light text-center"
                                        style="width: 100%;height: auto; border: 1px dashed #ccc; padding: 5px; border-radius: 4px;background-color:#f2f6fc">
                                        <p class="mb-0">Pratinjau Banner</p>
                                        <div class="col-6 p-1">
                                            <div class="rounded bg-white p-2" style="border: 1px dashed #ccc;"
                                                style="height: 150px">
                                                <div class="d-flex" style="height: 130px">
                                                    <img src="{{ asset('images/banners/' . $data->image_path) }}"
                                                        alt="{{ $data->alt }}" class="mx-auto my-auto"
                                                        style="max-height: 120px; max-width: 160px;">
                                                </div>
                                                <p class="mb-0">Banner Sebelumnya</p>
                                            </div>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="rounded bg-white p-2" style="border: 1px dashed #ccc;">
                                                <div class="d-flex" style="height: 130px">
                                                    <img id="imagePreview" class="mx-auto my-auto"
                                                        style="max-height: 120px; max-width: 160px;">
                                                </div>
                                                <p class="mb-0">Pratinjau Banner Baru</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image" accept="image/*">
                                    </div>
                                    <div class="form-text">Direkomendasikan menggunakan gambar berukuran 960x300.</div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="image_mobile" class="form-label">Banner Mobile</label>
                                </div>
                                <div class="col-sm-8 mb-3">
                                    <div class="row m-0 p-2 bg-light text-center"
                                        style="width: 100%;height: auto; border: 1px dashed #ccc; padding: 5px; border-radius: 4px;background-color:#f2f6fc">
                                        <p class="mb-0">Pratinjau Banner</p>
                                        <div class="col-6 p-1">
                                            <div class="rounded bg-white p-2" style="border: 1px dashed #ccc;"
                                                style="height: 150px">
                                                <div class="d-flex" style="height: 130px">
                                                    <img src="{{ asset('images/banners/' . $data->image_path_mobile) }}"
                                                        alt="{{ $data->alt }}" class="mx-auto my-auto"
                                                        style="max-height: 120px; max-width: 160px;">
                                                </div>
                                                <p class="mb-0">Banner Sebelumnya</p>
                                            </div>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="rounded bg-white p-2" style="border: 1px dashed #ccc;">
                                                <div class="d-flex" style="height: 130px">
                                                    <img id="imagePreviewMobile" class="mx-auto my-auto"
                                                        style="max-height: 120px; max-width: 160px;">
                                                </div>
                                                <p class="mb-0">Pratinjau Banner Baru</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image_mobile" name="image_mobile" accept="image/*">
                                    </div>
                                    <div class="form-text">Direkomendasikan menggunakan gambar berukuran 1080x1080.</div>
                                    @error('image_mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

        document.getElementById('image_mobile').addEventListener('change', function(event) {
            const fileInput2 = event.target;
            const imagePreview2 = document.getElementById('imagePreviewMobile');
            const imagePreviewContainer2 = document.getElementById('imagePreviewContainerMobile');

            // Check if a file is selected
            if (fileInput2.files && fileInput2.files[0]) {
                const reader = new FileReader();

                // Load the image and show the preview
                reader.onload = function(e) {
                    imagePreview2.src = e.target.result; // Update the image src to the new file
                    imagePreview2.style.display = 'block'; // Ensure the preview is visible
                    imagePreviewContainer2.style.display = 'block'; // Ensure the preview is visible
                };

                reader.readAsDataURL(fileInput2.files[0]);
            }
        });
    </script>
@endpush
