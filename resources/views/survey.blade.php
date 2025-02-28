<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Form Survey | Terdecor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="https://coderthemes.com/hyper-admin/saas/assets/js/hyper-config.js"></script>

    <!-- Vendor css -->
    <link href="https://coderthemes.com/hyper-admin/saas/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="https://coderthemes.com/hyper-admin/saas/assets/css/app-saas.min.css" rel="stylesheet" type="text/css"
        id="app-style" />

    <!-- Icons css -->
    <link href="https://coderthemes.com/hyper-admin/saas/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
    <style>
        .text-center .form-check {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 25px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <div class="row mx-5 my-5">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3 text-center"> Formulir Survey Pre-Design</h4>

                        <form class="row" id="survey" action="{{ route('survey.store') }}" method="POST">
                            @csrf
                            <div id="basicwizard">

                                <ul class="nav nav-pills nav-justified form-wizard-header mb-4" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-2" aria-selected="false" role="tab"
                                            tabindex="-1">
                                            <span class="d-none d-sm-inline">Data Pribadi</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-2" aria-selected="false" role="tab"
                                            tabindex="-1">
                                            <span class="d-none d-sm-inline">Informasi Rumah</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-2" aria-selected="true" role="tab">
                                            <span class="d-none d-sm-inline">Informasi Proyek</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#basictab4" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-2" aria-selected="true" role="tab">
                                            <span class="d-none d-sm-inline">Preferensi Desain</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#basictab5" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-2" aria-selected="true" role="tab">
                                            <span class="d-none d-sm-inline">Preferensi Favorit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#basictab6" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link rounded-0 py-2 active" aria-selected="true" role="tab">
                                            <span class="d-none d-sm-inline">Finish</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane" id="basictab1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="name">Nama
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Nama Lengkap">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="domisili">Provinsi
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="provinsi" name="provinsi">
                                                            <option value="">Pilih Provinsi</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="domisili">Kabupaten/Kota
                                                    </label>
                                                    <div class="col-md-9">

                                                        <select class="form-control" id="kabupatenKota"
                                                            name="kabupatenKota">
                                                            <option value="">Pilih Kabupaten/Kota</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="alamat">Alamat
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="alamat"
                                                            name="alamat" placeholder="Alamat Lengkap">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="handphone">No
                                                        Handphone
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="handphone"
                                                            name="handphone" placeholder="0812xxxxxxx">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="emailanda@gmail.com">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <ul class="list-inline wizard mb-0">
                                            <li class="next list-inline-item float-end disabled">
                                                <a href="javascript:void(0);" class="btn btn-info">Next <i
                                                        class="mdi mdi-arrow-right ms-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane" id="basictab2" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="luas_ruangan"> Luas
                                                        Ruangan
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="luas_ruangan" name="luas_ruangan"
                                                            class="form-control" placeholder="10m²">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="jumlah_ruangan">Jumlah
                                                        Ruangan</label>
                                                    <div class="col-md-9">
                                                        <select class="form-select" name="jumlah_ruangan">
                                                            <option>--- Pilih Salah Satu ----</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="jenis_ruangan">Jenis
                                                        Ruangan</label>
                                                    <div class="col-md-9">
                                                        <select class="form-select" name="jenis_ruangan">
                                                            <option>--- Pilih Salah Satu ----</option>
                                                            <option value="Ruang Tamu">Ruang Tamu</option>
                                                            <option value="Kamar Tidur">Kamar Tidur</option>
                                                            <option value="Kamar Mandi">Kamar Mandi</option>
                                                            <option value="Kamar Anak">Kamar Anak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="kebutuhan_ruangan">Kebutuhan Ruangan</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check mb-1">
                                                            <input type="radio" id="kebutuhan_ruangan_1"
                                                                name="kebutuhan_ruangan" class="form-check-input"
                                                                value="Lansia">
                                                            <label class="form-check-label"
                                                                for="kebutuhan_ruangan_1">Lansia</label>
                                                        </div>
                                                        <div class="form-check mb-1">
                                                            <input type="radio" id="kebutuhan_ruangan_2"
                                                                name="kebutuhan_ruangan" class="form-check-input"
                                                                value="Disabilitas">
                                                            <label class="form-check-label"
                                                                for="kebutuhan_ruangan_2">Disabilitas</label>
                                                        </div>
                                                        <div class="form-check mb-1">
                                                            <input type="radio" id="kebutuhan_ruangan_3"
                                                                name="kebutuhan_ruangan" class="form-check-input"
                                                                value="Tidak Ada">
                                                            <label class="form-check-label"
                                                                for="kebutuhan_ruangan_3">Tidak Ada</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="radio" id="kebutuhan_ruangan_4"
                                                                name="kebutuhan_ruangan" class="form-check-input"
                                                                value="others">
                                                            <label class="form-check-label"
                                                                for="kebutuhan_ruangan_4">Lainnya</label>
                                                        </div>
                                                        <div id="others-input" class="form-group"
                                                            style="display: none;">
                                                            <input type="text" class="form-control"
                                                                id="others-text" name="kebutuhan_ruangan_other"
                                                                placeholder="Masukkan kebutuhan lainnya">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="kebutuhan_rencana">Apakah Anda memiliki rencana untuk
                                                        penggunaan tempat tinggal Anda di masa depan ? Berapa rencana
                                                        jangka panjangnya?
                                                    </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="kebutuhan_rencana"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="kebutuhan_teknis"> Apa
                                                        saja kebutuhan Teknis anda?
                                                    </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="kebutuhan_teknis"></textarea>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"> Back</button>
                                            </li>
                                            <li class="next list-inline-item float-end disabled">
                                                <button type="button" class="btn btn-info">Next <i
                                                        class="mdi mdi-arrow-right ms-1"></i></button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane show" id="basictab3" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="proyek_akses">Apakah
                                                        penghuni akan berada di rumah
                                                        selama proyek/konstruksi berlangsung untuk mendapatkan akses
                                                        ?</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check">
                                                            <input type="radio" id="proyek_akses_1"
                                                                name="proyek_akses" class="form-check-input"
                                                                value="Ya">
                                                            <label class="form-check-label"
                                                                for="proyek_akses_1">Ya</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="proyek_akses_2"
                                                                name="proyek_akses" class="form-check-input"
                                                                value="Tidak">
                                                            <label class="form-check-label"
                                                                for="proyek_akses_2">Tidak, Saya akan
                                                                mengizinkan tetangga atau orang yang ditunjuk untuk
                                                                memberikan akses</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="proyek_ruangan">Silakan pilih ruangan yang akan disertakan
                                                        dalam proyek. (Mohon centang semua yang berlaku)</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Entry Hall" id="entryHall">
                                                            <label class="form-check-label" for="entryHall">Entry
                                                                Hall</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Foyer" id="foyer">
                                                            <label class="form-check-label"
                                                                for="foyer">Foyer</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Kitchen" id="kitchen">
                                                            <label class="form-check-label"
                                                                for="kitchen">Kitchen</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Bedroom #2" id="bedroom2">
                                                            <label class="form-check-label" for="bedroom2">Bedroom
                                                                #2</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Master Bedroom"
                                                                id="masterBedroom">
                                                            <label class="form-check-label" for="masterBedroom">Master
                                                                Bedroom</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Formal Living Room"
                                                                id="formalLivingRoom">
                                                            <label class="form-check-label"
                                                                for="formalLivingRoom">Formal Living Room</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Master Bathroom"
                                                                id="masterBathroom">
                                                            <label class="form-check-label"
                                                                for="masterBathroom">Master Bathroom</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Nook" id="nook">
                                                            <label class="form-check-label"
                                                                for="nook">Nook</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Bedroom #3" id="bedroom3">
                                                            <label class="form-check-label" for="bedroom3">Bedroom
                                                                #3</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Home Theater"
                                                                id="homeTheater">
                                                            <label class="form-check-label" for="homeTheater">Home
                                                                Theater</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Formal Dining Room"
                                                                id="formalDiningRoom">
                                                            <label class="form-check-label"
                                                                for="formalDiningRoom">Formal Dining Room</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Hall Bathroom"
                                                                id="hallBathroom">
                                                            <label class="form-check-label" for="hallBathroom">Hall
                                                                Bathroom</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Office/Study"
                                                                id="officeStudy">
                                                            <label class="form-check-label"
                                                                for="officeStudy">Office/Study</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Bedroom #4" id="bedroom4">
                                                            <label class="form-check-label" for="bedroom4">Bedroom
                                                                #4</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Outdoor Kitchen"
                                                                id="outdoorKitchen">
                                                            <label class="form-check-label"
                                                                for="outdoorKitchen">Outdoor Kitchen</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Family Room" id="familyRoom">
                                                            <label class="form-check-label" for="familyRoom">Family
                                                                Room</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Laundry Area"
                                                                id="laundryArea">
                                                            <label class="form-check-label" for="laundryArea">Laundry
                                                                Area</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Guest Bathroom"
                                                                id="guestBathroom">
                                                            <label class="form-check-label" for="guestBathroom">Guest
                                                                Bathroom</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Outdoor Living"
                                                                id="outdoorLiving">
                                                            <label class="form-check-label"
                                                                for="outdoorLiving">Outdoor Living</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="ruangan[]" value="Other" id="other">
                                                            <label class="form-check-label"
                                                                for="other">Other:</label>
                                                            <input type="text" class="form-control mt-2"
                                                                name="other_ruangan" placeholder="Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="pertahankan">Apakah
                                                        ada perabot, jendela, dinding, atau penutup lantai yang harus
                                                        tetap dipertahankan, dan disesuaikan dengan denah yang baru?
                                                        (Jelaskan)</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" id="pertahankan" name="pertahankan" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="diganti">Apakah ada
                                                        item yang harus diganti? (Jelaskan)</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" id="diganti" name="diganti" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"> Back </button>
                                            </li>
                                            <li class="next list-inline-item float-end disabled">
                                                <button type="button" class="btn btn-info">Next</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="basictab4" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="desain_prioritas">Pilihlah prioritas tujuan desain pribadi
                                                        berikut ini untuk interior Anda</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check mb-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="desain_prioritas" id="desain_prioritas_1"
                                                                value="Saya tertarik untuk mendapatkan tampilan yang lebih bergaya/indah untuk interior saya">
                                                            <label class="form-check-label">Saya tertarik untuk
                                                                mendapatkan tampilan yang lebih bergaya/indah untuk
                                                                interior saya</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="desain_prioritas" id="desain_prioritas_2"
                                                                value="Saya ingin interior saya berfungsi lebih efektif untuk ruangan saya">
                                                            <label class="form-check-label">Saya ingin interior saya
                                                                berfungsi lebih efektif untuk ruangan saya</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="desain_prioritas" id="desain_prioritas_3"
                                                                value="Saya ingin interior saya lebih mencerminkan selera pribadi saya">
                                                            <label class="form-check-label">Saya ingin interior saya
                                                                lebih mencerminkan selera pribadi saya</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="radio" id="desain_prioritas_4"
                                                                name="desain_prioritas" class="form-check-input"
                                                                value="others">
                                                            <label class="form-check-label"
                                                                for="kebutuhan_ruangan_4">Lainnya</label>
                                                        </div>
                                                        <div id="desain_prioritas_other" class="form-group"
                                                            style="display: none;">
                                                            <input type="text" class="form-control"
                                                                id="desain_prioritas_text"
                                                                name="desain_prioritas_other"
                                                                placeholder="Masukkan kebutuhan lainnya">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="desain_ramah">Apakah
                                                        Anda ingin menyertakan "produk ramah lingkungan" jika
                                                        memungkinkan?</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check mb-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="desain_ramah" value="Ya">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="radio" class="form-check-input"
                                                                name="desain_ramah" value="Tidak">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="desain_suasana">Suasana apa yang anda inginkan ?
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Casual"
                                                                id="casual">
                                                            <label class="form-check-label"
                                                                for="casual">Casual</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Light/Airy"
                                                                id="lightAiry">
                                                            <label class="form-check-label"
                                                                for="lightAiry">Light/Airy</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Relaxed"
                                                                id="relaxed">
                                                            <label class="form-check-label"
                                                                for="relaxed">Relaxed</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Formal"
                                                                id="formal">
                                                            <label class="form-check-label"
                                                                for="formal">Formal</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Elegant"
                                                                id="elegant">
                                                            <label class="form-check-label"
                                                                for="elegant">Elegant</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Energetic"
                                                                id="energetic">
                                                            <label class="form-check-label"
                                                                for="energetic">Energetic</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Spacious"
                                                                id="spacious">
                                                            <label class="form-check-label"
                                                                for="spacious">Spacious</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Welcoming"
                                                                id="welcoming">
                                                            <label class="form-check-label"
                                                                for="welcoming">Welcoming</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Contemporary"
                                                                id="contemporary">
                                                            <label class="form-check-label"
                                                                for="contemporary">Contemporary</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Clean Lines"
                                                                id="cleanLines">
                                                            <label class="form-check-label" for="cleanLines">Clean
                                                                Lines</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Romantic"
                                                                id="romantic">
                                                            <label class="form-check-label"
                                                                for="romantic">Romantic</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_suasana[]" value="Other"
                                                                id="other">
                                                            <label class="form-check-label"
                                                                for="other">Other:</label>
                                                            <input type="text" class="form-control mt-2"
                                                                name="desain_suasana_other"
                                                                placeholder="Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="desain_gaya">Gaya apa
                                                        yang ingin Anda inginkan ?
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Tuscan" id="tuscan">
                                                            <label class="form-check-label"
                                                                for="tuscan">Tuscan</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Beach Cottage"
                                                                id="beachCottage">
                                                            <label class="form-check-label" for="beachCottage">Beach
                                                                Cottage</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Zen" id="zen">
                                                            <label class="form-check-label" for="zen">Zen</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Mediterranean"
                                                                id="mediterranean">
                                                            <label class="form-check-label"
                                                                for="mediterranean">Mediterranean</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Country Cottage"
                                                                id="countryCottage">
                                                            <label class="form-check-label"
                                                                for="countryCottage">Country Cottage</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Art Deco" id="artDeco">
                                                            <label class="form-check-label" for="artDeco">Art
                                                                Deco</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="French Country"
                                                                id="frenchCountry">
                                                            <label class="form-check-label" for="frenchCountry">French
                                                                Country</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Asian" id="asian">
                                                            <label class="form-check-label"
                                                                for="asian">Asian</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Early American"
                                                                id="earlyAmerican">
                                                            <label class="form-check-label" for="earlyAmerican">Early
                                                                American</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Minimalist"
                                                                id="minimalist">
                                                            <label class="form-check-label"
                                                                for="minimalist">Minimalist</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Modern" id="modern">
                                                            <label class="form-check-label"
                                                                for="modern">Modern</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Industrial"
                                                                id="industrial">
                                                            <label class="form-check-label"
                                                                for="industrial">Industrial</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="desain_gaya[]" value="Other" id="other">
                                                            <label class="form-check-label"
                                                                for="other">Other:</label>
                                                            <input type="text" class="form-control mt-2"
                                                                name="desain_gaya_other" placeholder="Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard mb-0 list-inline">
                                                <li class="previous list-inline-item">
                                                    <button type="button" class="btn btn-light"> Back</button>
                                                </li>
                                                <li class="next list-inline-item float-end disabled">
                                                    <button type="button" class="btn btn-info">Next <i
                                                            class="mdi mdi-arrow-right ms-1"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="basictab5" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="favorit_pribadi">
                                                        Ketidak sukaan mengenai gaya pribadi Anda
                                                    </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="favorit_pribadi"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="favorit_preferensi">Pilihlah dari yang berikut ini untuk
                                                        menjelaskan preferensi Anda pada bagian (Centang semua yang
                                                        diperlukan)</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Paisley"
                                                                id="paisley">
                                                            <label class="form-check-label"
                                                                for="paisley">Paisley</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Sheer"
                                                                id="sheer">
                                                            <label class="form-check-label"
                                                                for="sheer">Sheer</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Subtle pattern"
                                                                id="subtlePattern">
                                                            <label class="form-check-label" for="subtlePattern">Subtle
                                                                pattern</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Stripe"
                                                                id="stripe">
                                                            <label class="form-check-label"
                                                                for="stripe">Stripe</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Leather"
                                                                id="leather">
                                                            <label class="form-check-label"
                                                                for="leather">Leather</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Satin"
                                                                id="satin">
                                                            <label class="form-check-label"
                                                                for="satin">Satin</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Plaid"
                                                                id="plaid">
                                                            <label class="form-check-label"
                                                                for="plaid">Plaid</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Bold pattern"
                                                                id="boldPattern">
                                                            <label class="form-check-label" for="boldPattern">Bold
                                                                pattern</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Cotton"
                                                                id="cotton">
                                                            <label class="form-check-label"
                                                                for="cotton">Cotton</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Toilet"
                                                                id="toilet">
                                                            <label class="form-check-label"
                                                                for="toilet">Toilet</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Suede"
                                                                id="suede">
                                                            <label class="form-check-label"
                                                                for="suede">Suede</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Silk"
                                                                id="silk">
                                                            <label class="form-check-label"
                                                                for="silk">Silk</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Velvet"
                                                                id="velvet">
                                                            <label class="form-check-label"
                                                                for="velvet">Velvet</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_preferensi[]" value="Other"
                                                                id="other">
                                                            <label class="form-check-label"
                                                                for="other">Other:</label>
                                                            <input type="text" class="form-control mt-2"
                                                                name="favorit_preferensi_others"
                                                                placeholder="Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="favorit_warna">Pilihlah dari yang berikut ini untuk
                                                        menjelaskan preferensi Anda pada bagian (Centang semua yang
                                                        diperlukan)</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Whites" id="whites">
                                                            <label class="form-check-label"
                                                                for="whites">Whites</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Blacks" id="blacks">
                                                            <label class="form-check-label"
                                                                for="blacks">Blacks</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Burgundies"
                                                                id="burgundies">
                                                            <label class="form-check-label"
                                                                for="burgundies">Burgundies</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Pinks" id="pinks">
                                                            <label class="form-check-label"
                                                                for="pinks">Pinks</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Aquas" id="aquas">
                                                            <label class="form-check-label"
                                                                for="aquas">Aquas</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Mint Greens"
                                                                id="mintGreens">
                                                            <label class="form-check-label" for="mintGreens">Mint
                                                                Greens</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Olive Greens"
                                                                id="oliveGreens">
                                                            <label class="form-check-label" for="oliveGreens">Olive
                                                                Greens</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Forest Greens"
                                                                id="forestGreens">
                                                            <label class="form-check-label" for="forestGreens">Forest
                                                                Greens</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Teals" id="teals">
                                                            <label class="form-check-label"
                                                                for="teals">Teals</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Oranges"
                                                                id="oranges">
                                                            <label class="form-check-label"
                                                                for="oranges">Oranges</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Reds" id="reds">
                                                            <label class="form-check-label"
                                                                for="reds">Reds</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Navy Blue"
                                                                id="navyBlue">
                                                            <label class="form-check-label" for="navyBlue">Navy
                                                                Blue</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Powder Blue"
                                                                id="powderBlue">
                                                            <label class="form-check-label" for="powderBlue">Powder
                                                                Blue</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Warm Colors"
                                                                id="warmColors">
                                                            <label class="form-check-label" for="warmColors">Warm
                                                                Colors</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Cool Colors"
                                                                id="coolColors">
                                                            <label class="form-check-label" for="coolColors">Cool
                                                                Colors</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Subtle"
                                                                id="subtle">
                                                            <label class="form-check-label"
                                                                for="subtle">Subtle</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Bright"
                                                                id="bright">
                                                            <label class="form-check-label"
                                                                for="bright">Bright</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Blues"
                                                                id="blues">
                                                            <label class="form-check-label"
                                                                for="blues">Blues</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Jewel Tones"
                                                                id="jewelTones">
                                                            <label class="form-check-label" for="jewelTones">Jewel
                                                                Tones</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Neutrals"
                                                                id="neutrals">
                                                            <label class="form-check-label"
                                                                for="neutrals">Neutrals</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Earth tones"
                                                                id="earthTones">
                                                            <label class="form-check-label" for="earthTones">Earth
                                                                tones</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Pale yellows"
                                                                id="paleYellows">
                                                            <label class="form-check-label" for="paleYellows">Pale
                                                                yellows</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Yellows"
                                                                id="yellows">
                                                            <label class="form-check-label"
                                                                for="yellows">Yellows</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Peach"
                                                                id="peach">
                                                            <label class="form-check-label"
                                                                for="peach">Peach</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Bold"
                                                                id="bold">
                                                            <label class="form-check-label"
                                                                for="bold">Bold</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Pastels"
                                                                id="pastels">
                                                            <label class="form-check-label"
                                                                for="pastels">Pastels</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Grays"
                                                                id="grays">
                                                            <label class="form-check-label"
                                                                for="grays">Grays</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Beiges"
                                                                id="beiges">
                                                            <label class="form-check-label"
                                                                for="beiges">Beiges</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Tans"
                                                                id="tans">
                                                            <label class="form-check-label"
                                                                for="tans">Tans</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Eggplant"
                                                                id="eggplant">
                                                            <label class="form-check-label"
                                                                for="eggplant">Eggplant</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Lavenders"
                                                                id="lavenders">
                                                            <label class="form-check-label"
                                                                for="lavenders">Lavenders</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Purples"
                                                                id="purples">
                                                            <label class="form-check-label"
                                                                for="purples">Purples</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Greens"
                                                                id="greens">
                                                            <label class="form-check-label"
                                                                for="greens">Greens</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="favorit_warna[]" value="Other"
                                                                id="other">
                                                            <label class="form-check-label"
                                                                for="other">Other:</label>
                                                            <input type="text" class="form-control mt-2"
                                                                name="favorit_warna_other"
                                                                placeholder="Please specify">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="favorit_tidak">
                                                        Warna yang tidak Anda sukai
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control mt-2"
                                                            name="favorit_tidak">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="favorit_tema">
                                                        Apakah Anda memiliki tema warna dalam pikiran Anda? (Jika ada,
                                                        Jelaskan)
                                                    </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="favorit_tema"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="favorit_tambahan">
                                                        Informasi tambahan terkait preferensi
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control mt-2"
                                                            name="favorit_tambahan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="favorit_desainer">
                                                        Apakah Anda pernah menyewa seorang desainer interior sebelumnya?
                                                        (Jika ya, kapan itu terjadi, dan apakah Anda puas dengan
                                                        pengalaman dan hasilnya?)
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control mt-2"
                                                            name="favorit_desainer">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <ul class="pager wizard mb-0 list-inline">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"> Back</button>
                                            </li>
                                            <li class="next list-inline-item float-end disabled">
                                                <button type="button" class="btn btn-info">Next <i
                                                        class="mdi mdi-arrow-right ms-1"></i></button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane show" id="basictab6" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row text-center">
                                                    <div class="col-12">
                                                        <h2 class="mt-0"><i data-feather="check"></i> </h2>
                                                        <h3 class="mt-0">Terima Kasih!</h3>
                                                        <p class="w-75 mb-2 mx-auto">Apakah anda sudah mengisi data
                                                            informasi yang telah tersedia? Kami akan memproses pengajuan
                                                            form survey yang telah anda berikan setelah anda menekan
                                                            tombol
                                                            <b>SUBMIT</b>.<br>Kami akan memberikan infomasi melalui
                                                            Whatsapp
                                                            yang telah anda berikan sebagai feedback dari kami.
                                                        </p>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-center">
                                                        <div class="col-12">
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="confirmCheckbox" name="survey" required>
                                                                <label class="form-check-label"
                                                                    for="confirmCheckbox" style="margin-left: 5px;">
                                                                    Saya bersedia dilakukan Survey oleh tim Terdecor.
                                                                </label>
                                                            </div>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="col-4">
                                                                    <div id="tanggalSurveyContainer"
                                                                        style="display: none;">
                                                                        <label for="tanggal_survey">Tanggal
                                                                            Survey:</label>
                                                                        <input type="date" id="tanggal_survey"
                                                                            name="tanggal_survey"
                                                                            class="form-control w-20">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                            <li class="previous list-inline-item">
                                                <button type="button" class="btn btn-light"> Back </button>
                                            </li>
                                            <li class="next list-inline-item float-end disabled">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </li>
                                        </ul>
                                    </div>

                                </div> <!-- tab-content -->
                            </div> <!-- end #basicwizard-->
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>


    <!-- Vendor js -->
    <script src="https://coderthemes.com/hyper-admin/saas/assets/js/vendor.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Bootstrap Wizard Form js -->
    <script
        src="https://coderthemes.com/hyper-admin/saas/assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js">
    </script>

    <!-- Wizard Form Demo js -->
    <script src="https://coderthemes.com/hyper-admin/saas/assets/js/pages/demo.form-wizard.js"></script>

    <!-- App js -->
    <script src="https://coderthemes.com/hyper-admin/saas/assets/js/app.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        feather.replace();
    </script>
    <script>
        $(document).ready(function() {
            $('#kebutuhan_ruangan_1').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#others-input').hide();
                }
            });
            $('#kebutuhan_ruangan_2').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#others-input').hide();
                }
            });
            $('#kebutuhan_ruangan_3').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#others-input').hide();
                }
            });
            $('#kebutuhan_ruangan_4').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#others-input').show();
                } else {
                    $('#others-input').hide();
                }
            });

            $('#desain_prioritas_1').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#desain_prioritas_other').hide();
                }
            });
            $('#desain_prioritas_2').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#desain_prioritas_other').hide();
                }
            });
            $('#desain_prioritas_3').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#desain_prioritas_other').hide();
                }
            });
            $('#desain_prioritas_4').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#desain_prioritas_other').show();
                } else {
                    $('#desain_prioritas_other').hide();
                }
            });
        });
    </script>
    <script>
        // Select the checkbox, the container, and the date input
        const confirmCheckbox = document.getElementById('confirmCheckbox');
        const tanggalSurveyContainer = document.getElementById('tanggalSurveyContainer');
        const tanggalSurveyInput = document.getElementById('tanggal_survey');

        // Listen for changes on the checkbox
        confirmCheckbox.addEventListener('change', function() {
            if (this.checked) {
                tanggalSurveyContainer.style.display = 'block';
                tanggalSurveyInput.setAttribute('required', 'required');
            } else {
                tanggalSurveyContainer.style.display = 'none';
                tanggalSurveyInput.removeAttribute('required');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 for Provinsi
            $('#provinsi').select2({
                placeholder: "Pilih Provinsi",
                allowClear: true,
                ajax: {
                    url: '/api/provinces',
                    dataType: 'json',
                    delay: 250, // Delay in milliseconds before triggering the request
                    processResults: function(data) {
                        return {
                            results: data.map(item => ({
                                id: item.id,
                                text: item.name
                            }))
                        };
                    }
                }
            });

            // Initialize Select2 for Kabupaten/Kota (initially disabled)
            $('#kabupatenKota').select2({
                placeholder: "Pilih Kabupaten/Kota",
                allowClear: true,
                disabled: true
            });

            $('#provinsi').on('change', function() {
                const selectedProvinsiId = $(this).val();
                $('#kabupatenKota').empty(); // Clear previous options

                if (selectedProvinsiId) {
                    $('#kabupatenKota').prop('disabled', false); // Enable Kabupaten/Kota select

                    // Show loading indicator (optional)
                    $('#kabupatenKota').append('<option value="" disabled>Loading...</option>');

                    fetch(`/api/kabupaten-kota/${selectedProvinsiId}`)
                        .then(response => response.json())
                        .then(data => {
                            $('#kabupatenKota').empty(); // Remove loading indicator
                            const options = data.map(kabupatenKota => ({
                                id: kabupatenKota.name,
                                text: kabupatenKota.name
                            }));
                            $('#kabupatenKota').select2({
                                data: options
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching kabupaten/kota:', error);
                            $('#kabupatenKota').empty();
                            $('#kabupatenKota').append(
                                '<option value="" disabled>Gagal memuat data</option>');
                        });
                } else {
                    $('#kabupatenKota').prop('disabled', true);
                }
            });
        });
    </script>
</body>

</html>
