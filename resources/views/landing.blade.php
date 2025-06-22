@extends('app')
@extends('whatsapp')
@section('content')
    <section id="carousel-section" class="mt-5 bg-custom">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- Desktop image -->
                    <img src="https://placehold.co/960x300" class="d-none d-sm-block w-100" alt="Landscape 1">
                    <!-- Mobile image -->
                    <img src="https://placehold.co/1080" class="d-block d-sm-none w-100" alt="Landscape 1 Mobile">
                </div>
                <div class="carousel-item">
                    <!-- Desktop image -->
                    <img src="https://placehold.co/960x300" class="d-none d-sm-block w-100" alt="Landscape 2">
                    <!-- Mobile image -->
                    <img src="https://placehold.co/1080" class="d-block d-sm-none w-100" alt="Landscape 2 Mobile">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <div class="container my-3">
        <div class="card shadow-sm p-4 position-relative">
            <div class="badge-gratis">GRATIS!</div>
            <div class="card-title text-center mb-4">
                <h4 class="fw-bold">Cek Biaya Renovasi</h4>
            </div>
            <form>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select class="form-select" id="jenis">
                        <option selected disabled>Pilih Jenis</option>
                        <option value="1">Jenis 1</option>
                        <option value="2">Jenis 2</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori">
                        <option selected disabled>Pilih Kategori</option>
                        <option value="1">Kategori 1</option>
                        <option value="2">Kategori 2</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sub_kategori" class="form-label">Sub Kategori</label>
                    <select class="form-select" id="sub_kategori">
                        <option selected disabled>Pilih Sub Kategori</option>
                        <option value="1">Sub 1</option>
                        <option value="2">Sub 2</option>
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="luas" class="form-label">Luas</label>
                        <input type="number" class="form-control" id="luas" placeholder="Luas">
                    </div>
                    <div class="col">
                        <label for="lebar" class="form-label">Lebar</label>
                        <input type="number" class="form-control" id="lebar" placeholder="Lebar">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Cek Harga</button>
            </form>
        </div>
    </div>
    <section class="company-section container my-5 text-center">
        <div class="section-header mb-4">
            <h2 class="company-title">Terdecor Hadir Memenuhi Kebutuhan Anda</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <img src="{{ asset('images/company.jpg') }}" class="rounded img-fluid w-100" alt="Produk 1"
                    style="max-width:700px; height:auto;">
                <div class="mt-3">
                    <p class="company-description">Terdecor adalah penyedia jasa desain interior profesional untuk rumah,
                        hotel, apartemen, dan kantor. Kami menggabungkan estetika yang menawan dengan fungsionalitas yang
                        cermat, menciptakan ruang yang tidak hanya indah dipandang, tetapi juga nyaman dan efisien
                        digunakan. Setiap desain kami hadir sebagai cerminan dari karakter dan kebutuhan unik setiap klien.
                    </p>
                    <p class="company-description">
                        Lebih dari sekadar desain, Terdecor juga menawarkan layanan renovasi untuk menyegarkan tampilan
                        ruang Anda. Dengan sentuhan baru yang selaras dengan gaya hidup modern, kami memastikan setiap
                        proyek ditangani oleh tim ahli yang berpengalaman. Percayakan kebutuhan desain dan renovasi Anda
                        kepada kami untuk hasil akhir yang memuaskan, elegan, dan berkelas.</p>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="product-section bg-custom">
        <div class="container my-5 py-5 text-center ">
            <div class="section-header mb-4">
                <h2 class="section-title">Jasa Kami Menyediakan</h2>
                <p class="section-description">Kami menyediakan jasa desain profesional untuk rumah, hotel, apartement dan
                    kantor
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-sm-6 col-lg-3">
                    <div class="card shadow-sm rounded-bottom-0">
                        <img src="{{ asset('images/home.jpg') }}" class="card-img-top" alt="Produk 1">
                        <div class="card-body text-center">
                            <h5 class="product-title">Rumah</h5>
                            <p class="product-description">Desain rumah yang mencerminkan kepribadian Anda. Estetis,
                                fungsional, dan dirancang untuk mendukung aktivitas sehari-hari dengan nuansa modern yang
                                elegan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card shadow-sm rounded-bottom-0">
                        <img src="{{ asset('images/apartment.jpg') }}" class="card-img-top" alt="Produk 1">
                        <div class="card-body text-center">
                            <h5 class="product-title">Apartment</h5>
                            <p class="product-description">Desain cerdas untuk hunian yang dinamis. Maksimalkan setiap
                                sudut apartemen Anda dengan gaya modern yang simpel, elegan, dan sesuai gaya hidup urban
                                masa kini.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card shadow-sm rounded-bottom-0">
                        <img src="{{ asset('images/hotel.jpg') }}" class="card-img-top" alt="Produk 1">
                        <div class="card-body text-center">
                            <h5 class="product-title">Kantor</h5>
                            <p class="product-description">Kantor bukan hanya tempat bekerja, tapi juga ruang untuk
                                berkembang. Desain modern kami membantu menciptakan lingkungan kerja yang profesional,
                                nyaman, dan inspiratif.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card shadow-sm rounded-bottom-0">
                        <img src="{{ asset('images/office.jpg') }}" class="card-img-top" alt="Produk 1">
                        <div class="card-body text-center">
                            <h5 class="product-title">Hotel</h5>
                            <p class="product-description">Kombinasi estetika dan kenyamanan bagi para tamu Anda. Kami
                                hadirkan desain interior hotel yang menarik, hangat, dan berkelas—siap memberikan pengalaman
                                menginap yang memikat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <a href="https://wa.me/6287841019855" target="_blank"
                        class="btn btn-primary w-100 rounded-top-0 rounded-bottom">Tanya
                        Selengkapnya</a>
                </div>

            </div>
        </div>
    </section>
    <section class="choose-section container my-5 text-center">
        <div class="section-header mb-4">
            <h2 class="choose-title">Kenapa harus pakai jasa Terdecor?</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-3 col-12">
                <img src="{{ asset('images/fast.png') }}" class="img-fluid" alt="Produk 1" style="max-width: 125px;">
                <div class="mt-3">
                    <p class="choose-subtitle">Cepat</p>
                    <p class="choose-description">Proses pembuatan desain kami efisien tanpa mengorbankan kualitas. Dengan
                        sistem kerja yang terstruktur, proyek Anda selesai tepat waktu.</p>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <img src="{{ asset('images/tepatsasaran.png') }}" class="img-fluid" alt="Produk 1"
                    style="max-width: 125px;">
                <div class="mt-3">
                    <p class="choose-subtitle">Tepat Sasaran</p>
                    <p class="choose-description">Kami merancang berdasarkan kebutuhan, gaya hidup, dan karakter Anda.
                        Hasil akhir mencerminkan kepribadian sekaligus fungsionalitas ruang.</p>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <img src="{{ asset('images/berpengalaman.png') }}" class="img-fluid" alt="Produk 1"
                    style="max-width: 125px;">
                <div class="mt-3">
                    <p class="choose-subtitle">Berpengalaman</p>
                    <p class="choose-description">Didukung oleh tim ahli berpengalaman di bidang desain dan renovasi, kami
                        siap menangani proyek skala kecil hingga besar dengan hasil yang konsisten.</p>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <img src="{{ asset('images/functional.png') }}" class="img-fluid" alt="Produk 1"
                    style="max-width: 125px;">
                <div class="mt-3">
                    <p class="choose-subtitle">Estetis & Fungsional</p>
                    <p class="choose-description">Kami menggabungkan keindahan visual dengan kenyamanan penggunaan,
                        menciptakan ruang yang tidak hanya indah tapi juga nyaman untuk beraktivitas sehari-hari.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="porto-section bg-custom">
        <div class="container my-5 py-5 text-center">
            <div class="section-header mb-4">
                <h2 class="section-title">Beberapa Hasil Desain Kami</h2>
                <p class="section-description">Beragam pilihan desain terbaik untuk kebutuhan Anda</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4 col-6">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/room1.jpg') }}" class="card-img-top" alt="Produk 1">
                        <div class="card-body text-center">
                            <h5 class="product-title">Kamar Tidur Modern & Nyaman</h5>
                            <p class="product-description">Ruang tidur dengan dominasi warna netral yang menciptakan kesan
                                tenang, dilengkapi pencahayaan hangat untuk kenyamanan maksimal.

                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/room2.jpg') }}" class="card-img-top" alt="Produk 2">
                        <div class="card-body text-center">
                            <h5 class="product-title">Dapur & Area Makan yang Terbuka</h5>
                            <p class="product-description">Desain dapur minimalis yang terhubung langsung dengan ruang
                                makan, memaksimalkan ruang dan cahaya alami.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/room3.jpg') }}" class="card-img-top" alt="Produk 3">
                        <div class="card-body text-center">
                            <h5 class="product-title">Ruang Keluarga Hangat & Fungsional</h5>
                            <p class="product-description">Kombinasi elemen kayu dan tekstil hangat menciptakan suasana
                                rumah yang hidup dan nyaman untuk berkumpul.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/room4.jpg') }}" class="card-img-top" alt="Produk 4">
                        <div class="card-body text-center">
                            <h5 class="product-title">Living Room Bergaya Elegan</h5>
                            <p class="product-description">Ruang tamu bergaya klasik modern dengan plafon tinggi dan
                                pencahayaan alami yang memperkuat kesan luas dan mewah.

                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-6">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/room5.jpg') }}" class="card-img-top" alt="Produk 5">
                        <div class="card-body text-center">
                            <h5 class="product-title">Kamar Tidur dengan Pemandangan</h5>
                            <p class="product-description">Penataan ruang tidur yang sederhana namun elegan, dilengkapi
                                jendela besar untuk pencahayaan alami dan panorama luar.

                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/room6.jpg') }}" class="card-img-top" alt="Produk 6">
                        <div class="card-body text-center">
                            <h5 class="product-title">Ruang Duduk Minimalis Skandinavia</h5>
                            <p class="product-description">Tampilan bersih dan simpel dengan sentuhan warna cerah, ideal
                                untuk apartemen atau ruang tamu kecil yang stylish.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cta-section container my-5 text-center">
        <div class="section-header mb-4">
            <h2 class="choose-title">Apalagi yang kamu tunggu, hubungi kami untuk detail lebih lanjut!</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4 col-12">
                <a href="https://wa.me/6287841019855" target="_blank" class="btn btn-outline-primary"><i
                        class="fab fa-whatsapp"></i>
                    Hubungi Kami</a>
            </div>
        </div>
    </section>
    <section class="tahapan-section bg-custom">
        <div class="container my-5 py-5 text-center">
            <div class="section-header mb-4">
                <h2 class="choose-title">Tahapan Kerja Tim Kami</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-12">
                    <img src="{{ asset('images/1tahap.png') }}" class="img-fluid" alt="Produk 1"
                        style="max-width: 125px;">
                    <div class="mt-3">
                        <p class="choose-subtitle">Tahapan Pertama</p>
                        <p class="choose-description">Kami adalah penyedia jasa desain profesional untuk rumah, hotel,
                            apartemen, dan kantor, dengan pendekatan yang mengutamakan estetika dan fungsionalitas.</p>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('images/2tahap.png') }}" class="img-fluid" alt="Produk 1"
                        style="max-width: 125px;">
                    <div class="mt-3">
                        <p class="choose-subtitle">Tahapan Kedua</p>
                        <p class="choose-description">Kami adalah penyedia jasa desain profesional untuk rumah, hotel,
                            apartemen, dan kantor, dengan pendekatan yang mengutamakan estetika dan fungsionalitas.</p>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('images/3tahap.png') }}" class="img-fluid" alt="Produk 1"
                        style="max-width: 125px;">
                    <div class="mt-3">
                        <p class="choose-subtitle">Tahapan Ketiga</p>
                        <p class="choose-description">Kami adalah penyedia jasa desain profesional untuk rumah, hotel,
                            apartemen, dan kantor, dengan pendekatan yang mengutamakan estetika dan fungsionalitas.</p>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <img src="{{ asset('images/4tahap.png') }}" class="img-fluid" alt="Produk 1"
                        style="max-width: 125px;">
                    <div class="mt-3">
                        <p class="choose-subtitle">Tahapan Terakhir</p>
                        <p class="choose-description">Kami adalah penyedia jasa desain profesional untuk rumah, hotel,
                            apartemen, dan kantor, dengan pendekatan yang mengutamakan estetika dan fungsionalitas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq-section container my-5 text-center">
        <div class="section-header mb-4">
            <h2 class="choose-title">FAQ</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                                Apa itu Terdecor?
                            </button>
                        </h2>
                        <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                Bagaimana cara memesan jasa Terdecor?
                            </button>
                        </h2>
                        <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faqCollapseThree" aria-expanded="false"
                                aria-controls="faqCollapseThree">
                                Apakah Terdecor menyediakan konsultasi gratis?
                            </button>
                        </h2>
                        <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
