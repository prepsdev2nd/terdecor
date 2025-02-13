@extends('user')

@section('content')
    <section id="page-billboard" style="background-image: url(../user/images/residence.png);">
        <div id="home" class="container py-5 ">
            <div class="page-billboard-container">
                <h1 class=" text-capitalize lh-1 mb-3">{{ $data->title }}</h1>
            </div>
        </div>
    </section>
    <section class="padding-small">

        <div class="container">
            <div class="row">

                <div class="">

                    <div class="post-content">
                        <img src="{{ asset('images/blogs/' . $data->image) }}" class="img-fluid w-100 mb-3">
                        {!! $data->content !!}
                    </div>

                </div>

            </div>

        </div>
    </section>
    <section class="related-post post-wrap py-4 my-5">
        <div class="container">
            <div class="section-header d-flex align-items-center justify-content-between">
                <h2 class="section-title text-uppercase mb-5">Related Blogs</h2>
            </div>
            <div class="row">
                @foreach ($relatedBlogs as $row)
                    <div class="col-md-4">
                        <article class="post-item pb-3">
                            <div class="post-image">
                                <a href="{{ url($row->slug) }}" title={{ $row->title }}><img
                                        src="{{ asset('images/blogs/' . $row->image) }}" class="img-fluid"
                                        alt="{{ $row->title }}"></a>
                            </div>
                            <div class="post-content">
                                <a href="#" class="text-decoration-none">
                                    <p class="blog-topic text-uppercase mt-3">
                                        {{ $row->created_at->translatedFormat('d F Y') }}
                                    </p>
                                </a>
                                <a href="{{ url($row->slug) }}" class="text-decoration-none">
                                    <h4 class="blog-title my-3">{{ $row->title }}</h4>
                                </a>
                                <p>{{ Str::words(strip_tags($row->content), 40) }}...</p>

                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
