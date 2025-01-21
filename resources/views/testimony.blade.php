<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Form Testimony | Terdecor</title>
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
</head>

<body>
    <div class="container-fluid">

        <div class="row mx-5 my-5">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3 text-center"> Formulir Testimoni</h4>

                        <form class="row" id="testimony" action="{{ route('testimonyuser.store') }}" method="POST">
                            @csrf
                            <div class="col-sm-4 mb-3">
                                <label for="name" class="form-label">Nama</label>
                            </div>
                            <div class="col-sm-8 mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Nama" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="type" class="form-label">Tipe Pembelian Jasa</label>
                            </div>
                            <div class="col-sm-8 mb-3">
                                <input type="text" class="form-control @error('type') is-invalid @enderror"
                                    id="type" name="type" placeholder="Contoh: Apartment full unit" required>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="testi" class="form-label">Deskripsi</label>
                            </div>
                            <div class="col-sm-8 mb-3">
                                <textarea class="form-control @error('testi') is-invalid @enderror" id="testi" name="testi"
                                    placeholder="Deskripsi Komplain" required></textarea>
                                @error('testi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>


    <!-- Vendor js -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://coderthemes.com/hyper-admin/saas/assets/js/vendor.min.js"></script>

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
