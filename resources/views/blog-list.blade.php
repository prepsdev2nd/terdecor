@extends('user')
@extends('whatsapp')
@section('content')
    <section class="hero-section text-white d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-4 fw-bold text-white">Blog</h1>
        </div>
    </section>
    <section class="product-section">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                @foreach ($data as $row)
                    <div class="col-sm-12 col-lg-4">
                        <div class="card shadow-sm rounded-bottom-0">
                            <img src="{{ asset('images/blogs/' . $row->image) }}" class="card-img-top"
                                alt="{{ $row->title }}">
                            <div class="card-body">
                                <div
                                    class="d-flex flex-row flex-lg-column justify-content-between align-items-center text-lg-start">
                                    <h5 class="product-title mb-0 text-justify-custom w-lg-100">{{ $row->title }}</h5>
                                </div>
                                <p class="product-description mt-2 text-justify-custom">
                                    {!! $row->content !!}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('read', ['slug' => $row->slug]) }}"
                            class="btn btn-primary w-100 rounded-top-0 rounded-bottom">Lihat Selengkapnya</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
