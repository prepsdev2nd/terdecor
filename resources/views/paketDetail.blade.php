@extends('user')

@section('content')
    <section id="page-billboard" style="background-image: url(../user/images/residence.png);">
        <div id="home" class="container py-5 ">
            <div class="page-billboard-container">
            </div>
        </div>
    </section>
    <section class="padding-small mb-5">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="container">
                        <div class="title-content text-center mb-5">
                            <h1 class="text-capitalize">{{ $data->title }}</h1>
                        </div>
                        <div class="product-container">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-12">
                                    <div class="main-image">
                                        @foreach ($data->images as $index => $media)
                                            <div class="image-container {{ $index == 0 ? 'active' : 'd-none' }}"
                                                id="main-image-{{ $index }}">
                                                @if ($media->image_type == 'Image')
                                                    <img src="{{ url($media->image_path) }}" class="d-block w-100"
                                                        alt="Product Image" onclick="openPopup()">
                                                @elseif($media->image_type == 'Video')
                                                    <div class="video-container">
                                                        <iframe src="https://www.youtube.com/embed/{{ $media->image_path }}"
                                                            allowfullscreen></iframe>
                                                    </div>
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
                                                    <div class="video-container">
                                                        <iframe src="https://www.youtube.com/embed/{{ $media->image_path }}"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Bagian Kanan (Judul, Detail, Deskripsi) -->
                                <div class="col-lg-8 col-md-7 col-sm-12">
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
                                    <div class="button-content text-center mt-3">
                                        <a href="https://wa.me/6281224377189?text=Aku%20mau%20tanya" target="_blank"
                                            class="btn btn-primary btn-lg px-4 me-md-2 rounded">Hubungi Kami</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Image Popup Modal -->
    <div id="imagePopup" class="popup-overlay d-none">
        <div class="popup-content">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <div id="popup-media"></div>
        </div>
    </div>

    @push('styles')
        <style>
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
                border-color: #c79677;
            }

            /* Popup Styles */
            .popup-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.7);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
            }

            .popup-content {
                background: white;
                padding: 20px;
                border-radius: 10px;
                max-width: 90%;
                max-height: 90%;
                overflow: hidden;
                position: relative;
            }

            .popup-content img,
            .popup-content iframe {
                width: 100%;
                height: auto;
                max-height: 80vh;
                display: block;
                margin: auto;
            }

            .close-btn {
                position: absolute;
                top: 10px;
                right: 15px;
                font-size: 30px;
                cursor: pointer;
                color: black;
            }

            .main-image {
                cursor: pointer;
            }

            .main-image img,
            .main-image iframe {
                pointer-events: auto;
                /* Ensures the event works */
            }

            .video-container {
                position: relative;
                width: 100%;
                padding-top: 56.25%;
                /* 16:9 Aspect Ratio (change if needed) */
            }

            .video-container iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>

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

            function openPopup() {
                // Get the active image container
                let activeImageContainer = document.querySelector('.image-container:not(.d-none)');

                if (activeImageContainer) {
                    let mediaElement = activeImageContainer.innerHTML; // Get the current media (image or video)
                    document.getElementById('popup-media').innerHTML = mediaElement;
                    document.getElementById('imagePopup').classList.remove('d-none');
                }
            }

            function closePopup() {
                document.getElementById('imagePopup').classList.add('d-none');
                document.getElementById('popup-media').innerHTML = ''; // Clear the content
            }
        </script>
    @endpush
@endsection
