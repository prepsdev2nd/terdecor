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
                        {!! $data->description !!}
                    </div>


                </div>

            </div>

        </div>
    </section>
    <section class="related-post post-wrap py-4 my-5">
        <div class="container">
            <div class="section-header d-flex align-items-center justify-content-between">
                <h2 class="section-title text-uppercase mb-5">Related Posts</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <article class="post-item pb-5">
                        <div class="post-image">
                            <a href="single-post.html"><img src="images/item10.jpg" class="img-fluid"></a>
                        </div>
                        <div class="post-content">
                            <a href="#" class="text-decoration-none">
                                <p class="blog-topic text-uppercase mt-3">Rent / 12 jan, 2022</p>
                            </a>
                            <a href="single-post.html" class="text-decoration-none">
                                <h4 class="blog-title my-3">Modern vibes house, todays trending design</h4>
                            </a>
                            <p>Dignissim lacus, turpis ut suspendisse vel tellus. Turpis purus, gravida orci,
                                fringilla...</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
