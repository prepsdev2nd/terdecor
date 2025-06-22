<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terdecor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="icon" type="image/jpeg" href="{{ asset('user/favicon.jpg') }}">
    <link rel="stylesheet" href="{{ asset('user/css/main.css') }}">
</head>

<body>
    <nav
        class="navbar navbar-light fixed-top border-bottom py-2 px-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" class="navbar-brand m-0 fw-bold"><img src="{{ asset('user/images/logo.png') }}"
                class="img-fluid logo"></a>
        <a href="https://wa.me/6287841019855" target="_blank" class="btn btn-primary" type="button">Hubungi Kami</a>
    </nav>
    @yield('content')
    <footer class="bg-custom-primary text-center py-4 mt-5">
        <div class="container pb-5 pb-lg-0">
            <div class="text-white">
                <p class="mb-0" style="color: #e9e9e9">© 2025 Terdecor. All rights reserved.</p>
                <p class="mb-0" style="color: #e9e9e9">Follow us on:
                    <a href="#" class="text-decoration-none" style="color: #e9e9e9"><i
                            class="fab fa-instagram"></i></a>
                </p>
            </div>
        </div>
    </footer>
    @yield('whatsapp')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
