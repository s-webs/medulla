<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Medulla - Клиника инновационной нейрореабилитации</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Place favicon.ico in the root directory -->
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="/images/logo_small_ico.svg"
    />

    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/animate.css"/>
    <link rel="stylesheet" href="/assets/css/swiper-bundle.css"/>
    <link rel="stylesheet" href="/assets/css/slick.css"/>
    <link rel="stylesheet" href="/assets/css/magnific-popup.css"/>
    <link rel="stylesheet" href="/assets/css/font-awesome-pro.css"/>
    <link rel="stylesheet" href="/assets/css/meanmenu.css"/>
    <link rel="stylesheet" href="/assets/css/nice-select.css"/>
    <link rel="stylesheet" href="/assets/css/flaticon.css"/>
    <link rel="stylesheet" href="/assets/css/spacing.css"/>
    <link rel="stylesheet" href="/assets/css/style.css"/>
    @stack('styles')
</head>
<body>
<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- preloader -->
<div id="preloadertp">
    <img src="/images/logo_small.svg" alt=""/>
</div>
<!-- preloader end  -->

<!-- header-area -->
<header class="d-none d-xl-block">
    <div class="header-custom" id="header-sticky">
        <div class="header-logo-box">
            <a href="{{route('home')}}"><img src="/images/medulla_logo_hor_left.svg" alt="logo"></a>
        </div>
        <div class="header-menu-box">
            <div class="header-menu-top">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="header-top-mob">
                            <span>Консультация:</span>
                            <a href="tel:{{$settings[2]->value}}"> {{$settings[2]->value}}</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header-time">
                            <span><i
                                    class="fa-light fa-clock-ten"></i> {{$settings[7]->value ?? "ПН"}} - {{$settings[8]->value ?? "ПТ"}}  {{$settings[11]->value ?? "09:00"}} - {{$settings[12]->value ?? "18:00"}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-menu-bottom">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="main-menu main-menu-second">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="{{route('home')}}">Главная</a></li>
                                    <li class="has-dropdown"><a href="{{route('about.index')}}">О клинике</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('about.index')}}">О клинике</a></li>
                                            <li><a href="{{route('diagnostics.index')}}">Диагностика</a></li>
                                            <li><a href="{{route('treatment.index')}}">Подход к лечению</a></li>
                                            <li><a href="##">Центр коррекционных занятий</a></li>
                                            <li><a href="##">Иностранным и приезжим пациентам</a></li>
                                            <li><a href="{{route('team.index')}}">Наши специалисты</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('service.index')}}">Услуги</a></li>
                                    <li><a href="{{route('blog.index')}}">Блог</a></li>
                                    <li><a href="{{route('contacts.index')}}">Контакты</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="header-cart-order d-flex align-items-center justify-content-end">
                            <a class="header-bottom-btn" href="{{ route('appointment.index') }}">Записаться на прием</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

<!-- tp-mobile-header-area start -->
<div id="header-mob-sticky" class="tp-mobile-header-area pt-15 pb-15 d-xl-none">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 col-10">
                <div class="tp-mob-logo">
                    <a href="{{route('home')}}"><img src="/images/medulla_logo_hor_left.svg" alt="logo"></a>
                </div>
            </div>
            <div class="col-md-8 col-2">
                <div class="tp-mobile-bar d-flex align-items-center justify-content-end">
                    <div class="tp-bt-btn-banner d-none d-md-block d-xl-none mr-30">
                        <a class="tp-bt-btn" href="tel:{{$settings[2]->value ?? 0}}">
                            <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="2" cy="2" r="2" fill="#0E63FF"/>
                                <circle cx="7" cy="2" r="2" fill="#0E63FF"/>
                                <circle cx="12" cy="2" r="2" fill="#0E63FF"/>
                                <circle cx="12" cy="7" r="2" fill="#0E63FF"/>
                                <circle cx="12" cy="12" r="2" fill="#0E63FF"/>
                                <circle cx="7" cy="7" r="2" fill="#0E63FF"/>
                                <circle cx="7" cy="12" r="2" fill="#0E63FF"/>
                                <circle cx="7" cy="17" r="2" fill="#0E63FF"/>
                                <circle cx="2" cy="7" r="2" fill="#0E63FF"/>
                                <circle cx="2" cy="12" r="2" fill="#0E63FF"/>
                            </svg>
                            <span>Консультация: </span>{{$settings[2]->value ?? 0}}
                        </a>
                    </div>
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tp-mobile-header-area end -->

<!-- sidebar-info -->
<div class="tpsideinfo tp-side-info-area">
    <button class="tpsideinfo__close"><i class="fal fa-times"></i></button>
    <div class="tpsideinfo__logo mb-40">
        <a href="index.html"
        ><img src="/images/medulla_logo_hor_left_white.svg" alt="logo"
            /></a>
    </div>

    <div class="mobile-menu"></div>

    <div class="tpsideinfo__content mb-60"></div>

    <div class="tpsideinfo__socialicon">
        <a href="#"><i class="fa-brands fa-youtube"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-skype"></i></a>
    </div>
</div>
<!-- sidebar-info-end -->

<div class="body-overlay"></div>

<!-- main-area -->
<main>
    @yield('content')
</main>
<!-- main-area-end -->

<!-- footer-area -->
<footer>
    <div class="footer-area theme-bg pt-100 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div
                        class="footer-widget footer-col-1 mb-50 wow fadeInUp"
                        data-wow-delay=".2s"
                    >
                        <h4 class="footer-widget__title mb-30">
                            <a href="{{route('home')}}">
                                <img src="/images/medulla_logo_hor_left_white.svg" alt="logo"/>
                            </a>
                        </h4>
                        <div class="footer-widget__social">
                            <a class="tp-f-youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a class="tp-f-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a class="tp-f-skype" href="#"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div
                        class="footer-widget footer-col-2 mb-50 wow fadeInUp"
                        data-wow-delay=".4s"
                    >
                        <h4 class="footer-widget__title mb-20">Полезные ссылки</h4>
                        <div class="footer-widget__links">
                            <ul>
                                <li><a href="{{ route('about.index') }}">О клинике</a></li>
                                <li><a href="{{ route('service.index') }}">Услуги</a></li>
                                <li><a href="##">Центр коррекционных занятий</a></li>
                                <li><a href="##">Иностранным и приезжим пациентам</a></li>
                                <li><a href="{{route('contacts.index')}}">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div
                        class="footer-widget footer-col-3 mb-50 wow fadeInUp"
                        data-wow-delay=".6s"
                    >
                        <h4 class="footer-widget__title mb-20">Контактная информация</h4>
                        <div class="footer-widget__info">
                            <ul>
                                <li>{{$settings[1]->value ?? "Adress"}}</li>
                                <li><a href="tel:{{$settings[2]->value ?? 0}}">{{$settings[2]->value ?? 0}}</a></li>
                                <li>
                                    <a href="mailto:support@rstheme.com">{{$settings[6]->value ?? "email"}}m</a>
                                </li>
                                <li>Время работы: {{$settings[11]->value ?? "09:00"}}
                                    - {{$settings[12]->value ?? "18:00"}}</li>
                                <li>{{$settings[9]->value ?? "Понедельник"}}
                                    - {{$settings[10]->value ?? "Пятница"}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom theme-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                    <div class="footer-widget__copyright">
                        <span>© <a
                                href="{{route('home')}}">medulla.kz</a>.<i> Все права защищены</i></span>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                    <div class="footer-widget__copyright-info info-direction">
                        <ul class="d-flex align-items-center">
                            <li><a href="##">Лицензия</a></li>
                            <li><a href="##">Прейскурант</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->

<!-- JS here -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/waypoints.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/swiper-bundle.js"></script>
<script src="/assets/js/slick.js"></script>
<script src="/assets/js/magnific-popup.js"></script>
<script src="/assets/js/counterup.js"></script>
<script src="/assets/js/wow.js"></script>
<script src="/assets/js/nice-select.js"></script>
<script src="/assets/js/isotope-pkgd.js"></script>
<script src="/assets/js/imagesloaded-pkgd.js"></script>
<script src="/assets/js/meanmenu.js"></script>
<script src="/assets/js/ajax-form.js"></script>
<script src="/assets/js/main.js"></script>
@stack('scripts')
</body>
</html>
