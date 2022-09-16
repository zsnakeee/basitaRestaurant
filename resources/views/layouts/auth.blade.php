<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مطعم بسيطه - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Header Navbar -->
<header>
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="navbar-brand">
            <li class="nav-item list-unstyled pt-3 d-md-none d-lg-none">
                <a class="nav-link navIcon" id="sidebarBtn"><i class="fas fa-bars"></i></a>
            </li>

            <div class="d-block">
                <a class="text-white fw-bold" href="#">مطعم بسيطه</a>
                <p class="text-white" style="font-size: 10px;">في أي زمان ومكان بسيطه يحقق احلامك</p>
            </div>
        </div>

        <div class="me-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navIcon" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="container mb-5" style="min-height: 695px">
    <div class="row">
        <div class="col-md-12" style="padding-top: 120px">
            @yield('content')
        </div>
    </div>
</div>


<footer class="text-center m-auto" style="background-color: #262626;">
    <a style="font-size: 44px; color: #FC3901;">مطعم بسيطه</a>
    <p class="text-white text-center text-muted" style="margin: 0 25%">
        بفضل المرافقة الشخصية والمهنية ، نحن هنا من أجلك للحضور إلى الحدث دون قلق. تعد خدمات تقديم الطعام وصواني
        الضيافة من مطعم بسيطه مناسبة للعمل والمناسبات الخاصة ، الصغيرة والكبيرة على حد سواء.
        معًا ، نقوم بتكييف قائمة طعام حلال من منتجات الألبان من أجلك لكل ضيافة - بدءًا من رفع الكوب ، مرورًا
        بصواني الضيافة للاجتماعات وحتى الحفلات والحفلات.
    </p>

    <p class="mt-3" style="color: #656565;">© بسيطه : All Rights Reserved</p>
</footer>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- jquery -->
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
