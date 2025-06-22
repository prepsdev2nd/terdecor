@extends('user')
@extends('whatsapp')
@section('content')
    <section id="carousel-section" class="mt-5 bg-custom">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banner as $row)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <!-- Desktop image -->
                        <img src="{{ asset('images/banners/' . $row->image_path) }}" class="d-none d-sm-block w-100"
                            alt="Landscape 1">
                        <!-- Mobile image -->
                        <img src="{{ asset('images/banners/' . $row->image_path_mobile) }}" class="d-block d-sm-none w-100"
                            alt="Landscape 1 Mobile">
                    </div>
                @endforeach
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
                        @foreach ($jenis as $row)
                            <option value="{{ $row->jenis }}">{{ $row->jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" disabled>
                        <option selected disabled>Pilih Kategori</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sub_kategori" class="form-label">Sub Kategori</label>
                    <select class="form-select" id="sub_kategori" disabled>
                        <option selected disabled>Pilih Sub Kategori</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="luas" class="form-label">Luas</label>
                    <input type="number" class="form-control" id="luas" placeholder="Luas">
                </div>
                <button type="button" class="btn btn-primary w-100" id="cekHargaBtn">Cek Harga</button>
                <div id="result-harga" class="mt-4" style="display:none;">
                    <div class="alert alert-info"></div>
                </div>
            </form>
        </div>
    </div>
    <section class="company-section container my-5 text-center">
        <div class="section-header mb-4">
            <h2 class="company-title">Terdecor Hadir Memenuhi Kebutuhan Anda</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <img src="{{ asset('user/images/company.jpg') }}" class="rounded img-fluid w-100" alt="Produk 1"
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
                @foreach ($globalPackage as $row)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card shadow-sm rounded-bottom-0">
                            <img src="{{ asset('user/images/' . $row->photo) }}" class="card-img-top" alt="Produk 1">
                            <div class="card-body text-center">
                                <h5 class="product-title">{{ $row->name }}</h5>
                                <p class="product-description">{!! $row->description !!}</p>
                            </div>
                        </div>
                        <a href="{{ route('jasa', ['model' => $row->name]) }}"
                            class="btn btn-primary w-100 rounded-top-0 rounded-bottom">Lihat
                            Selengkapnya</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="choose-section container my-5 text-center">
        <div class="section-header mb-4">
            <h2 class="choose-title">Kenapa harus pakai jasa Terdecor?</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-3 col-12">
                <img src="{{ asset('user/images/fast.png') }}" class="img-fluid" alt="Produk 1" style="max-width: 125px;">
                <div class="mt-3">
                    <p class="choose-subtitle">Cepat</p>
                    <p class="choose-description">Proses pembuatan desain kami efisien tanpa mengorbankan kualitas. Dengan
                        sistem kerja yang terstruktur, proyek Anda selesai tepat waktu.</p>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <img src="{{ asset('user/images/tepatsasaran.png') }}" class="img-fluid" alt="Produk 1"
                    style="max-width: 125px;">
                <div class="mt-3">
                    <p class="choose-subtitle">Tepat Sasaran</p>
                    <p class="choose-description">Kami merancang berdasarkan kebutuhan, gaya hidup, dan karakter Anda.
                        Hasil akhir mencerminkan kepribadian sekaligus fungsionalitas ruang.</p>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <img src="{{ asset('user/images/berpengalaman.png') }}" class="img-fluid" alt="Produk 1"
                    style="max-width: 125px;">
                <div class="mt-3">
                    <p class="choose-subtitle">Berpengalaman</p>
                    <p class="choose-description">Didukung oleh tim ahli berpengalaman di bidang desain dan renovasi, kami
                        siap menangani proyek skala kecil hingga besar dengan hasil yang konsisten.</p>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <img src="{{ asset('user/images/functional.png') }}" class="img-fluid" alt="Produk 1"
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
        <div class="container-fluid my-5 py-5 text-center">
            <div class="section-header mb-4">
                <h2 class="section-title">Produk Pilihan Kami</h2>
                <p class="section-description">Beragam produk terbaik untuk kebutuhan Anda</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <div class="horizontal-scroll w-100">
                        @foreach ($produk as $row)
                            <a href="https://wa.me/6287841019855?text={{ urlencode('Halo, saya ingin bertanya terkait produk ' . $row->name . '. Terima kasih') }}"
                                target="_blank">
                                <img src="{{ asset('images/products/' . $row->image) }}" alt="{{ $row->name }}">
                            </a>
                        @endforeach
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
    <section class="testimony-section bg-custom">
        <div class="container my-5 py-5 text-center">
            <div class="section-header mb-4">
                <h2 class="choose-title">Testimoni Pengguna</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="testimony-scroll w-100 py-3">
                    @foreach ($testi as $row)
                        <div class="testimonial-card p-4 mx-2">
                            <div class="testimonial-stars mb-2">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                            </div>
                            <p class="testimonial-text mb-4">
                                {{ $row->testi }}
                            </p>
                            <div class="testimonial-user">- {{ $row->name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    <section class="blog-section container my-5 text-center">
        <div class="section-header mb-4">
            <h2 class="choose-title">Bacaan Terbaru</h2>
        </div>
        @foreach ($blog as $row)
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/blogs/' . $row->image) }}" alt="Blog 1"
                            class="card-img-top blog-image">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $row->title }}</h5>
                            <p class="card-text blog-description">
                                {!! Str::limit($row->content, 100) !!}
                            </p>
                            <a href="{{ route('read', $row->slug) }}" class="btn btn-primary mt-auto">Read More</a>
                        </div>
                    </div>
                </div>
        @endforeach

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById('jenis').addEventListener('change', function() {
            var jenis = this.value;
            fetch('/kategori-by-jenis/' + encodeURIComponent(jenis))
                .then(res => res.json())
                .then(data => {
                    var kategoriSel = document.getElementById('kategori');
                    kategoriSel.innerHTML = '<option selected disabled>Pilih Kategori</option>';
                    data.forEach(function(k) {
                        kategoriSel.innerHTML += '<option value="' + k + '">' + k + '</option>';
                    });
                    kategoriSel.disabled = false;
                    document.getElementById('sub_kategori').innerHTML =
                        '<option selected disabled>Pilih Sub Kategori</option>';
                    document.getElementById('sub_kategori').disabled = true;
                });
        });

        document.getElementById('kategori').addEventListener('change', function() {
            var jenis = document.getElementById('jenis').value;
            var kategori = this.value;
            fetch('/quality-by-jenis-kategori/' + encodeURIComponent(jenis) + '/' + encodeURIComponent(kategori))
                .then(res => res.json())
                .then(data => {
                    var subSel = document.getElementById('sub_kategori');
                    if (data && data.id) {
                        // Sub kategori options only the quality/nama
                        subSel.innerHTML = '<option value="' + data.id + '" data-harga="' + data.harga + '">' +
                            data.nama + '</option>';
                        subSel.disabled = false;
                    } else {
                        subSel.innerHTML = '<option selected disabled>Pilih Sub Kategori</option>';
                        subSel.disabled = true;
                    }
                });
        });

        // Harga Calculation
        document.getElementById('cekHargaBtn').addEventListener('click', function() {
            var luas = parseInt(document.getElementById('luas').value);
            var subKategoriSel = document.getElementById('sub_kategori');
            if (!subKategoriSel.value) {
                alert('Pilih sub kategori!');
                return;
            }
            var harga = parseInt(subKategoriSel.options[subKategoriSel.selectedIndex].getAttribute('data-harga'));
            if (isNaN(luas) || isNaN(harga)) {
                alert('Lengkapi semua field dengan benar!');
                return;
            }
            var total = luas * harga;
            var formatted = total.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            document.querySelector('#result-harga .alert').textContent = "Harga: " + harga.toLocaleString('id-ID') +
                " x " + luas + " = " + formatted;
            document.getElementById('result-harga').style.display = 'block';
        });
    </script>
@endpush
