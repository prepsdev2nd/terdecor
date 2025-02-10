@extends('user')

@section('content')
    <section id="page-billboard" style="background-image: url(../user/images/residence.1png);">
        <div id="home" class="container py-5 ">
            <div class="page-billboard-container">
            </div>
        </div>
    </section>
    <section class="padding-small">
        <div class="container">
            <div class="row">

                <div class="">
                    <div class="container">
                        <div class="product-container">
                            <!-- Bagian Kiri (Gambar & Video) -->
                            <div class="left-content">
                                <div class="main-image">
                                    @foreach ($data->images as $index => $media)
                                        <div class="image-container {{ $index == 0 ? 'active' : 'd-none' }}"
                                            id="main-image-{{ $index }}">
                                            @if ($media->image_type == 'Image')
                                                <img src="{{ url($media->image_path) }}" class="d-block w-100"
                                                    alt="Product Image">
                                            @elseif($media->image_type == 'Video')
                                                <iframe width="100%" height="315"
                                                    src="https://www.youtube.com/embed/08Ndzf5-HxI"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <div class="thumbnail-row d-flex mt-2">
                                    @foreach ($data->images as $index => $media)
                                        <div class="thumbnail-item me-2" onclick="changeMainImage({{ $index }})">
                                            @if ($media->image_type == 'Image')
                                                <img src="{{ url($media->image_path) }}" class="img-thumbnail"
                                                    alt="Thumbnail">
                                            @elseif($media->image_type == 'Video')
                                                <iframe width="100" height="60"
                                                    src="https://www.youtube.com/embed/08Ndzf5-HxI" class="img-thumbnail"
                                                    allowfullscreen></iframe>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Bagian Kanan (Judul, Detail, Deskripsi) -->
                            <div class="right-content">
                                <h1 class="text-capitalize lh-1 mb-3">{{ $data->title }}</h1>
                                <div class="post-detail">
                                    <h4>Detail:</h4>
                                    <ul class="list-unstyled">
                                        @foreach ($data->details as $index => $row)
                                            <li>{{ $row->title }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="post-content">
                                    <h4>Description:</h4>
                                    {!! $data->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    @push('styles')
        <style>
            .product-container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                /* Dua kolom dengan ukuran sama */
                gap: 20px;
                /* Jarak antar elemen */
                align-items: start;
                /* Mulai dari atas */
                grid-auto-flow: dense;
                /* Mengisi area kosong */
            }

            .left-content {
                display: flex;
                flex-direction: column;
                max-width: 100%;
            }

            .right-content {
                display: flex;
                flex-direction: column;
            }

            /* Jika konten kanan lebih tinggi, biarkan turun ke bawah */
            @media (min-width: 768px) {
                .product-container {
                    grid-template-columns: 1fr auto;
                    /* Kolom kanan lebih fleksibel */
                }
            }

            .main-image img,
            .main-image video {
                width: 100%;
                max-height: 400px;
                object-fit: cover;
            }

            .thumbnail-row {
                gap: 10px;
                overflow-x: auto;
            }

            .thumbnail-item {
                width: 80px;
                height: 80px;
                cursor: pointer;
                border: 2px solid transparent;
                transition: border-color 0.3s;
            }

            .thumbnail-item img,
            .thumbnail-item video {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .thumbnail-item:hover,
            .thumbnail-item.active {
                border-color: red;
            }
        </style>
    @endpush
    @push('scripts')
        <script>
            function changeMainImage(index) {
                // Hide all main images
                document.querySelectorAll('.image-container').forEach(img => img.classList.add('d-none'));

                // Show the selected main image
                document.getElementById('main-image-' + index).classList.remove('d-none');

                // Remove active class from all thumbnails
                document.querySelectorAll('.thumbnail-item').forEach(thumb => thumb.classList.remove('active'));

                // Add active class to clicked thumbnail
                document.querySelectorAll('.thumbnail-item')[index].classList.add('active');
            }
        </script>
    @endpush
@endsection
