@extends('user')

@section('content')
    <section id="page-billboard" style="background-image: url(../user/images/residence.png);">
        <div id="home" class="container py-5 ">
            <div class="page-billboard-container">
                <h1 class=" text-capitalize lh-1 mb-3">{{ $title }}</h1>
            </div>
        </div>
    </section>
    <section class="related-post post-wrap py-4 my-5">
        <div class="container">
            {{-- <div class="section-header d-flex align-items-center justify-content-between">
                <h2 class="section-title text-uppercase mb-5">Related Blogs</h2>
            </div> --}}
            <div class="row">
                @foreach ($data as $row)
                    <div class="col-md-4 d-flex flex-column">
                        <article class="post-item pb-3 d-flex flex-column justify-content-between">
                            <div class="post-image">
                                @php
                                    $coverImage = \App\Models\PackageImages::where('package_id', $row->id)->first();
                                @endphp
                                @if ($coverImage)
                                    <a href="{{ route('paket.detail', $row->slug) }}" title="{{ $row->title }}">
                                        <img src="{{ $coverImage->image_path }}" class="img-fluid"
                                            alt="{{ $row->title }}">
                                    </a>
                                @endif
                            </div>
                            <div class="post-content mt-auto">
                                <a href="#" class="text-decoration-none">
                                    <p class="blog-topic text-uppercase mt-3">
                                        {{ $row->created_at->translatedFormat('d F Y') }}
                                    </p>
                                </a>
                                <a href="{{ route('paket.detail', $row->slug) }}" class="text-decoration-none">
                                    <h4 class="blog-title my-3">{{ $row->title }}</h4>
                                </a>
                                <p>{{ Str::words(strip_tags($row->description), 40) }}...</p>

                                <a href="{{ route('paket.detail', $row->slug) }}" title="{{ $row->title }}"
                                    class="btn btn-outline-primary stretched-link"><span>Selengkapnya </span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
