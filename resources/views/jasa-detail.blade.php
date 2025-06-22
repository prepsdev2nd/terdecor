@extends('user')

@section('content')
    <section class="hero-section text-white d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-4 fw-bold text-white">Desain Interior Rumah</h1>
        </div>
    </section>
    <section class="detail-section">
        <div class="container-fluid py-5">
            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <div class="horizontal-scroll w-100">
                        @foreach ($data->images as $image)
                            @if ($image->image_type == 'Image')
                                <img src="{{ asset($image->image_path) }}" alt="{{ $data->title }}">
                            @else
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ $image->image_path }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container pb-5">
            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <h2 class="display-6 fw-bold" style="color: #484848">{{ $data->title }}</h2>
                    <h6 class="text-muted">Rp {{ number_format($data->price, 0, ',', '.') }} · {{ $data->luas }}m²</h6>
                    <hr>
                    <div class="row text-center justify-content-center">
                        <div class="col-4 col-md-2 mb-3">
                            <i class="bi bi-house-door fs-4 text-primary"></i>
                            <div class="mt-1 small">Desain Modern</div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <i class="bi bi-brush fs-4 text-success"></i>
                            <div class="mt-1 small">Finishing Rapi</div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <i class="bi bi-lightbulb fs-4 text-warning"></i>
                            <div class="mt-1 small">Pencahayaan Optimal</div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <i class="bi bi-door-open fs-4 text-danger"></i>
                            <div class="mt-1 small">Material Berkualitas</div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <i class="bi bi-people fs-4 text-info"></i>
                            <div class="mt-1 small">Konsultasi Gratis</div>
                        </div>
                    </div>

                    <hr>
                    <div class="detail-description">
                        <h5 class="fw-bold">Deskripsi Paket</h5>
                        <h6 class="text-muted fw-light">
                            {!! $data->description !!}
                        </h6>
                    </div>
                    <hr>
                    <div class="detail-description">
                        <h5 class="fw-bold">Rincian Paket</h5>
                        <div class="table-responsive">
                            @php $no = 1; @endphp
                            @foreach ($data->details as $row)
                                <div class="item-row d-flex justify-content-between">
                                    <div class="item-name text-truncate">{{ $no++ }} | {{ $row->title }}</div>
                                    <div class="item-price"></div>
                                </div>
                            @endforeach
                            <div class="item-row d-flex justify-content-between fw-bold">
                                <div class="item-name text-truncate">Total</div>
                                <div class="item-price">Rp {{ number_format($data->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="floating-cta-wrapper d-lg-none">
        <a href="#" class="btn btn-get-price w-85">
            Dapatkan Harga Terbaik
        </a>
    </div>
@endsection
