@extends('user')

@section('content')
    <section class="hero-section text-white d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-4 fw-bold text-white"></h1>
        </div>
    </section>
    <section class="detail-section">
        <div class="container pb-5">
            <div class="d-flex flex-wrap mt-5 gap-4">
                <div style="flex: 0 0 auto;">
                    <img src="{{ asset('images/blogs/' . $data->image) }}" alt="{{ $data->title }}" class="img-fluid"
                        style="max-width: 400px; height: auto;">
                </div>
                <div style="flex: 1 1 auto; min-width: 250px;">
                    <h5>{{ $data->title }}</h5>
                    <h6 class="text-muted fw-light">
                        {!! $data->content !!}
                    </h6>
                </div>
            </div>
        </div>
    </section>
@endsection
