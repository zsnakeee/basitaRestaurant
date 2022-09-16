<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <a class="text-white fw-bold" href="{{ route('home') }}">مطعم بسيطه</a>
                <p class="text-white" style="font-size: 10px;">في أي زمان ومكان بسيطه يحقق احلامك</p>
            </div>
        </div>

        <div class="me-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="btn navIcon position-relative">
                        <i class="fas fa-shopping-cart"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="@if(session()->has('cart') && count(session()->get('cart')) > 0) display: block; @else display: none; @endif"
                                id="cart-badge">@if(session()->has('cart') && count(session()->get('cart')) > 0){{ count(session()->get('cart')) }}@endif
                            </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="container mb-5" style="min-height: 695px">
    <div class="row">
        <div class="d-flex" style="padding-top: 120px">

            <div class="sidebar d-none d-md-block d-lg-block">
                <div class="sidebarCard">
                    <ul>
                        @if(!Auth::check())
                            <li><a href="{{ route('login') }}" class="signIn"><span>تسجيل الدخول</span></a></li>
                        @else
                            <li>
                                <p class="text-center small mb-0 text-secondary fw-bold"> مرحبا
                                    بك {{ Auth::user()->name }}</p>

                                @if(Auth::user()->role == 2)
                                    <p class="text-center small mb-0 fw-bold" style="color: #FF450D">
                                        مسؤول</p>
                                @endif
                            </li>


                            @if(Auth::user()->role == 2)
                                <li>
                                    <a href="{{ route('admin.categories') }}"
                                       class="sidemenu @if(Str::contains(Route::current()->uri, 'admin/categories')) activeBg @endif mb-2">
                                        <i class="fas fa-gear sideIcon"></i><span>إدارة الأصناف</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.products') }}"
                                       class="sidemenu @if(Str::contains(Route::current()->uri, 'admin/products')) activeBg @endif mb-2">
                                        <i class="fas fa-gear sideIcon"></i><span>إدارة المنتاجات</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.orders') }}" class="sidemenu @if(Str::contains(Route::current()->uri, 'admin/orders')) activeBg @endif mb-2">
                                        <i class="fas fa-gear sideIcon"></i><span>إدارة الطلبات</span>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('orders') }}" class="sidemenu @if(Route::current()->uri === 'orders') activeBg @endif mb-2">
                                        <i class="fas fa-shopping-bag UserSideIcon sideIcon"></i><span>طلباتي</span>
                                    </a>
                                </li>
                            @endif



                            <li>
                                <a href="{{ route('logout') }}" class="signIn mb-4" style="justify-content: flex-start">
                                    <i class="fas fa-sign-out-alt sideIcon"></i><span>تسجيل الخروج</span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('home') }}"
                               class="sidemenu @if(Route::current()->uri === '/') activeBg @endif">
                                <i class="sideIcon fas fa-home"></i> <span>الرئيسه</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('categories') }}"
                               class="sidemenu @if(Route::current()->uri === 'categories' || Route::current()->uri === 'categories/{id}') activeBg @endif">
                                <i class="sideIcon fa-solid fa-cookie-bite"></i><span>الاصناف</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('cart') }}"
                               class="sidemenu @if(Route::current()->uri === 'cart') activeBg @endif">
                                <i class="sideIcon fas fa-shopping-cart"></i><span class="sideSpan">عربة التسوق</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('faqs') }}"
                               class="sidemenu @if(Route::current()->uri === 'faqs') activeBg @endif">
                                <i class="sideIcon fas fa-question"></i><span class="sideSpan">أسئلة وأجوبة</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

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

@stack('js')

</body>
</html>
