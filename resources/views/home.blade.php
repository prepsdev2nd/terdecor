<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Terdecor - Bisa Bikin Ruanganmu dari Red Flag jadi Green Flag</title>

    <link rel="stylesheet" type="text/css" href="css/vendor.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


    <!-- Link Bootstrap's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('user/style.css') }}">

    <!-- Google Fonts ================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- script ================================================== -->
    <script src="{{ asset('user/js/modernizr.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        .title {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-weight: bold;
            text-align: center;
            text-transform: capitalize;
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0">

    <!-- nav bar start  -->
    <header id="nav" class="site-header position-fixed text-dark">
        <nav id="navbar-example2" class="navbar navbar-expand-lg py-2">

            <div class="container ">

                <a class="navbar-brand" href="./index.html"><img src="{{ asset('user/images/logo.png') }}"
                        alt="terdecor.id" style="max-width: 175px;"></a>


                <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2"
                    aria-label="Toggle navigation"><ion-icon name="menu-outline"
                        style="font-size: 30px;"></ion-icon></button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2"
                    aria-labelledby="offcanvasNavbar2Label">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav align-items-center justify-content-end align-items-center flex-grow-1 ">
                            <li class="nav-item">
                                <a class="nav-link active me-md-4" href="#billboard">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-md-4" href="#portfolio">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-md-4" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-md-4" href="#testimoni">Testimoni</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn-medium btn btn-primary"
                                    href="https://wa.me/6281224377189?text=Aku%20mau%20tanya" target="_blank">Hubungi
                                    Kami</a>
                            </li>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="tabs-listing mt-4">
                                                <nav>
                                                    <div class="nav nav-tabs d-flex justify-content-center border-0"
                                                        id="nav-tab2" role="tablist">
                                                        <button class="btn btn-outline-primary text-uppercase me-4 "
                                                            id="nav-sign-in-tab2" data-bs-toggle="tab"
                                                            data-bs-target="#nav-sign-in2" type="button" role="tab"
                                                            aria-controls="nav-sign-in2" aria-selected="false">Log
                                                            In</button>
                                                        <button class="btn btn-outline-primary text-uppercase active"
                                                            id="nav-register-tab2" data-bs-toggle="tab"
                                                            data-bs-target="#nav-register2" type="button"
                                                            role="tab" aria-controls="nav-register2"
                                                            aria-selected="true">Sign Up</button>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent1">
                                                    <div class="tab-pane fade " id="nav-sign-in2" role="tabpanel"
                                                        aria-labelledby="nav-sign-in-tab2">
                                                        <form id="form3" class="form-group flex-wrap p-3 ">
                                                            <div class="form-input col-lg-12 my-4">
                                                                <label for="exampleInputEmail3"
                                                                    class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                                                    Address</label>
                                                                <input type="text" id="exampleInputEmail3"
                                                                    name="email" placeholder="Email"
                                                                    class="form-control ps-3">
                                                            </div>
                                                            <div class="form-input col-lg-12 my-4">
                                                                <label for="inputPassword3"
                                                                    class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                                                <input type="password" id="inputPassword3"
                                                                    placeholder="Password" class="form-control ps-3"
                                                                    aria-describedby="passwordHelpBlock">
                                                                <div id="passwordHelpBlock2"
                                                                    class="form-text text-center">
                                                                    <a href="#" class=" password">Forgot
                                                                        Password ?</a>
                                                                </div>

                                                            </div>
                                                            <label class="py-3">
                                                                <input type="checkbox" required=""
                                                                    class="d-inline">
                                                                <span class="label-body text-black">Remember Me</span>
                                                            </label>
                                                            <div class="d-grid my-3">
                                                                <button
                                                                    class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Log
                                                                    In</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade active show" id="nav-register2"
                                                        role="tabpanel" aria-labelledby="nav-register-tab2">
                                                        <form id="form4" class="form-group flex-wrap p-3 ">
                                                            <div class="form-input col-lg-12 my-4">
                                                                <label for="exampleInputEmail4"
                                                                    class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                                                    Address</label>
                                                                <input type="text" id="exampleInputEmail4"
                                                                    name="email" placeholder="Email"
                                                                    class="form-control ps-3">
                                                            </div>
                                                            <div class="form-input col-lg-12 my-4">
                                                                <label for="inputPassword4"
                                                                    class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                                                <input type="password" id="inputPassword4"
                                                                    placeholder="Password" class="form-control ps-3"
                                                                    aria-describedby="passwordHelpBlock">
                                                            </div>
                                                            <label class="py-3">
                                                                <input type="checkbox" required=""
                                                                    class="d-inline">
                                                                <span class="label-body text-black">I agree to the <a
                                                                        href="#"
                                                                        class="text-black password border-bottom">Privacy
                                                                        Policy</a>
                                                                </span>
                                                            </label>
                                                            <div class="d-grid my-3">
                                                                <button
                                                                    class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Sign
                                                                    Up</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>

                    </div>
                </div>


            </div>
        </nav>
    </header>

    <!-- billboard start  -->
    <section id="billboard">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center ">

                <div class="col-lg-6">
                    <img src="{{ asset('user/images/home.jpg') }}" class="d-block mx-lg-auto img-fluid"
                        alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>

                <div class="col-lg-6">
                    <h1 class="  lh-1 my-3">Bisa Bikin Ruanganmu dari <span class="text-danger">Red
                            Flag</span>
                        jadi
                        <span class="text-success">Green Flag</span>
                    </h1>
                    <p class="lead">Terdecor hadir untuk mengubah setiap sudut jadi ruang penuh cerita. Jasa desain
                        interior kami siap wujudkan rumah impianmu dengan sentuhan profesional dan estetika terbaik.</p>
                    <nav class="navbar navbar-expand-lg billboard-nav">
                        <div class="container billboard-search p-0">

                            <div class="row billboard-row">
                                <div class="col-lg-3 billboard-select">
                                    <select class="form-select mb-2 mb-lg-0" aria-label="Option">
                                        <option selected>Option</option>
                                        <option value="3">Add Something Here!</option>

                                    </select>
                                </div>
                                <div class="col-lg-3 billboard-select">
                                    <select class="form-select mb-2 mb-lg-0" aria-label="Option 2">
                                        <option selected>Option 2</option>
                                        <option value="3">Add Something Here!</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 billboard-select">
                                    <select class="form-select mb-2 mb-lg-0" aria-label="Option 3">
                                        <option selected>Option 3</option>
                                        <option value="3">Add Something Here!</option>
                                    </select>
                                </div>

                                <div class="col-lg-3 billboard-btn">
                                    <button type="submit"
                                        class="btn btn-primary btn-lg billboard-search">Search</button>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section id="banner" class="py-3">
        <div class="container-fluid px-lg-5">
            <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>

                <!-- Carousel Images -->
                <div class="carousel-inner">
                    @foreach ($banner as $row)
                        <div class="carousel-item active">
                            <a href="{{ $row->url }}">
                                <img src="{{ asset('images/banners/' . $row->image_path) }}" class="d-block w-100"
                                    alt="{{ $row->alt }}">
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section id="package" class="py-3">
        <div class="container-lg">
            <h2 class="m-0 py-lg-5 title">Paket Unggulan</h2>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center justify-content-center">
                @foreach ($package as $row)
                    <div class="col d-flex justify-content-center">
                        <div class="card mb-4 rounded-3 shadow-sm h-100">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-bold">{{ $row->title }}</h4>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <!-- Added justify-content-between -->
                                <div id="carouselExampleControls{{ $row->id }}" class="carousel slide"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($row->images as $detail)
                                            @if ($detail->image_type === 'Image')
                                                <div class="carousel-item active">
                                                    <img src="{{ asset($detail->image_path) }}"
                                                        class="d-block w-100 border rounded" alt="Image 1">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls{{ $row->id }}"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls{{ $row->id }}"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <p class="mt-2 fw-bold">Daftar yang kamu dapatkan:</p>
                                <ul style="">
                                    @foreach ($row->details as $detail)
                                        <li class="list-unstyled">{{ $detail->title }}</li>
                                    @endforeach
                                </ul>
                                <div class="mt-auto">
                                    <h1 class="card-title pricing-card-title"><small class="text-muted fw-light">mulai
                                            dari</small><br> Rp 1.999.999</h1>
                                    <a href="{{ route('paket', $row->slug) }}"
                                        class="w-100 btn btn-lg btn-primary rounded">Detail
                                        Paket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="design" class="py-3">
        <div class="container my-5">
            <h2 class="m-0 py-lg-5 title">Desain Interior</h2>

            <div class="swiper-button-next residence-swiper-next  residence-arrow"></div>
            <div class="swiper-button-prev residence-swiper-prev residence-arrow"></div>

            <div class="swiper residence-swiper">
                <div class="swiper-wrapper">
                    @foreach ($design as $row)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="position-relative">
                                    <img src="{{ $row->images->first()->image_path }}" class="card-img-top img-fluid"
                                        alt="{{ $row->title }}"
                                        style="object-fit: cover; height: 280px; width: 100%; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">

                                    <div class="position-absolute top-0 end-0 p-2">
                                        <span class="badge bg-secondary me-1 fw-normal">{{ $row->type }}</span>
                                        <span class="badge bg-primary fw-normal">{{ $row->material }}</span>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <h5 class="card-title pt-4">{{ $row->title }}</h5>
                                    <p class="card-text">
                                        {{ $row->description }}
                                    </p>
                                </div>
                                <div class="p-3 text-center">
                                    <a href="/" class="btn btn-primary"> Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="help" class="py-3"
        style="background: linear-gradient(270deg, #c79677 0.01%, rgba(26, 36, 47, 0.00) 100%);">
        <div class="container-lg my-5">

            <div class="row d-flex justify-content-between align-items-center">

                <div class="col-md-3 d-none d-sm-block">
                    <div class="image-holder d-flex">
                        <img src="{{ asset('user/images/cta-2.jpg') }}" class="img-fluid" alt="Bootstrap Themes"
                            loading="lazy">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="image-holder d-flex">
                        <img src="{{ asset('user/images/cta.jpg') }}" class="img-fluid" alt="Bootstrap Themes"
                            loading="lazy">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-content ps-md-5 mt-4 mt-md-0">
                        <h2 class="text-capitalize">Kami Siap Membuat Rumah Idamanmu</h2>
                        <p>Dari ide jadi realita! Wujudkan Interior yang Menginspirasi. Gak perlu bingung lagi, kami
                            hadir dengan solusi desain interior yang personal, fungsional, dan instagramable!</p>
                        <a href="index.html" class="btn btn-primary btn-lg rounded">Hubungi Kami</a>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!--About us start  -->
    <section id="about-us" class="py-3">
        <div class="container">
            <div class="row py-lg-5">

                <h2 class="text-center title m-0 py-lg-5">Kenapa Harus Dengan Terdecor.id</h2>

                <div class="text-center col-lg-4">
                    <img src="{{ asset('user/images/responsive.png') }}" class="" alt="Bootstrap Themes"
                        width="140" height="140" loading="lazy">
                    <h4 class="fw-bold mt-5 text-main ">Gratis Konsultasi</h4>
                    <p>Dapatkan Saran Desain Profesional Tanpa Biaya – Gratis untuk Anda!</p>
                </div>

                <div class="text-center col-lg-4">
                    <img src="{{ asset('user/images/price.png') }}" class="bd-placeholder-img rounded-circle"
                        alt="Bootstrap Themes" width="140" height="140" loading="lazy">
                    <h4 class="fw-bold mt-5 text-main ">Harga Bersaing</h4>
                    <p>Mau dapat solusi desain premium sekarang gak harus mahal, hubungi terdecor aja!</p>
                </div>

                <div class="text-center col-lg-4">
                    <img src="{{ asset('user/images/fast.png') }}" class="bd-placeholder-img rounded-circle"
                        alt="Bootstrap Themes" width="140" height="140" loading="lazy">
                    <h4 class="fw-bold mt-5 text-main ">Pengerjaan Cepat</h4>
                    <p>Pengerjaan Super Cepat dengan Sentuhan Profesional!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Lets start  -->
    <section id="start" class="py-3"
        style="background: linear-gradient(270deg, #c79677 0.01%, rgba(26, 36, 47, 0.00) 100%);">
        <div class="container my-5">
            <div class="row featurette py-lg-5 ">
                <div class="col-md-5 order-md-1 d-flex">
                    <h1 class=" lh-1 mb-3">Ciptakan Rumah Idamanmu Bersama terdecor.id</h1>
                </div>
                <div class="col-md-7 order-md-2 d-flex justify-content-center align-items-center">
                    <div class="text-content ps-md-5 mt-4 mt-md-0">
                        <p class="py-lg-2">Langkah pertama menuju rumah impian dimulai dari sini. Klik untuk mulai
                            sekarang dan nikmati pengalaman desain terbaik!</p>
                        <a href="https://wa.me/6281224377189?text=Aku%20mau%20tanya" target="_blank"
                            class="btn btn-primary btn-lg px-4 me-md-2 rounded">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial">
        <div class="container my-5">

            <h2 class="text-center title">Apa Kata Orang Tentang Terdecor.id</h2>
            <div
                class="swiper testimonial-swiper swiper-initialized swiper-horizontal swiper-free-mode swiper-backface-hidden">
                <div class="swiper-wrapper" id="swiper-wrapper-039bef7af10aeb77d" aria-live="polite">
                    @foreach ($testi as $row)
                        <div class="swiper-slide swiper-slide-active" style="width: 390px; margin-right: 30px;"
                            role="group" aria-label="1 / 3">
                            <div class="row py-lg-5">
                                <div class="col-md-8 mx-auto">
                                    <img src="{{ asset('user/images/quote.svg') }}" class="rounded mx-auto d-inline"
                                        style="max-height: 125px" alt="...">
                                    <p class="testimonial-p mt-4">{{ $row->testi }}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="pt-5 mb-1">{{ $row->name }}<br>
                                                <b>{{ $row->type }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="testimonial-swiper-button col-md-3 position-absolute">
                    <div class="swiper-button-prev testimonial-arrow swiper-button-disabled" tabindex="-1"
                        role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-039bef7af10aeb77d"
                        aria-disabled="true" style="color:#c79677"></div>
                    <div class="arrow-divider"> | </div>
                    <div class="swiper-button-next testimonial-arrow" tabindex="0" role="button"
                        aria-label="Next slide" aria-controls="swiper-wrapper-039bef7af10aeb77d"
                        aria-disabled="false" style="color:#c79677"></div>
                </div>

                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </section>

    <section id="blog" style="background: #F8F5F2">
        <div class="container my-5 py-5">
            <h2 class="text-center title my-3">Blog</h2>
            <div class="row">
                @foreach ($blog as $row)
                    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-box">
                            <div class="post-img">
                                <img loading="lazy" src="{{ asset('images/blogs/' . $row->image) }}"
                                    alt="{{ $row->title }}" class="img-fluid rounded">
                            </div>
                            <div class="meta mt-2">
                                <small class="text-muted">{{ $row->created_at->translatedFormat('d F Y') }}</small>
                                <small class="post-author"> / Admin</small>
                            </div>
                            <h3 class="post-title">{{ $row->title }}</h3>
                            <p>{{ Str::words(strip_tags($row->content), 75) }}...</p>
                            <a href="{{ url($row->slug) }}" title="{{ $row->title }}"
                                class="btn btn-outline-primary stretched-link"><span>Selengkapnya </span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="complaint">
        <div class="container my-5 py-5">
            <h2 class="text-center title">Kritik dan Saran</h2>
            <div class="row d-flex justify-content-center pt-5">
                <div class="col-12 col-lg-8">
                    <div class="card-body">
                        <div class="form-container">
                            <form class="form" action="{{ route('complaintuser.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Nama</label>
                                    <input type="text" class="@error('name') is-invalid @enderror mx-auto"
                                        id="name" name="name" autocomplete="off" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email"> No Handphone
                                        <small class="text-muted"> (Opsional)</small></label>
                                    <input type="text" class="@error('name') is-invalid @enderror mx-auto"
                                        id="name" name="name" autocomplete="off"
                                        placeholder="Cth: 0812xxxxxxx">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="textarea">Deskripsi</label>
                                    <textarea class="@error('description') is-invalid @enderror mx-auto" id="description" name="description"
                                        rows="10" cols="50" required></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-lg px-5 rounded" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center my-5">
                <div class="card">

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </section>
    <section id="footer">
        <div class="container footer-container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center border-top"></footer>

            <div class="container">
                <footer class=" d-flex flex-wrap justify-content-between align-items-center pt-4 pb-2">
                    <div class=" col-md-8 d-flex align-items-center">
                        <p>©2024 terdecor.id</p>
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                        <p>
                            <i class="bi-facebook pe-4"></i>
                            <a href="https://www.instagram.com/terdecor.id/"><i class="bi-instagram pe-4"></i></a>
                            <i class="bi-twitter pe-4"></i>
                            <i class="bi-youtube pe-4"></i>
                        </p>

                    </div>

                </footer>
            </div>
    </section>




    <script src="{{ asset('user/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('user/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                html: "{!! session('success') !!}",
            });
        </script>
    @endif
</body>

</html>
