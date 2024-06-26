@extends('layout.master')
@section('content')
    <!-- banner-area -->
    <section class="banner-area p-relative pt-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="banner__content pt-145 mb-135">
                        <h2 class="banner__title mb-30">
                            О КЛИНИКЕ И МЕТОДЕ АЛЕКСАНДРЫ МАКСИМОВОЙ
                        </h2>
                        <p>
                            Авторская инновационная и доступная методика внутриклеточной
                            диагностики мозга как начало пути к выздоровлению или
                            улучшению качества жизни
                        </p>
                        <div class="banner__btn">
                            <a class="tp-btn" href="contact.html">Записаться на прием</a>
                            <a class="tp-btn-second ml-25" href="{{ route('about.index') }}">Подробнее</a>
                        </div>
                    </div>
                    <div class="banner__box-item">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div
                                    class="banner__item d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".2s"
                                >
                                    <div class="banner__item-icon">
                                        <i class="flaticon-rating"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>Наше преимущество</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div
                                    class="banner__item pink-border d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".4s"
                                >
                                    <div class="banner__item-icon pink-icon">
                                        <i class="flaticon-target"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>Наше преимущество</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div
                                    class="banner__item green-border d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".6s"
                                >
                                    <div class="banner__item-icon green-icon">
                                        <i class="flaticon-premium-badge"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>Наше преимущество</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner__shape d-none d-lg-block">
            <img src="/images/clinic_01.png" alt="banner-img"/>
        </div>
    </section>
    <!-- banner-area-end -->

    <!-- services-area -->
    <section
        class="services-area pt-95 pb-90 grey-bg mt-60 fix"
        data-background="/assets/img/shape/shape-bg-01.png"
    >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-20">Наши услуги</span>
                        <h3 class="tp-section__title mb-50">Диагностика и лечение</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="tp-services d-flex align-items-center">
                        <div class="services-p">
                            <i class="fa-regular fa-arrow-left"></i>
                        </div>
                        <div class="services-n">
                            <i class="fa-regular fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-slider wow fadeInUp" data-wow-delay=".3s">
                <div class="swiper-container service-active">
                    <div class="swiper-wrapper">
                        @foreach($services as $service)
                            <div class="swiper-slide">
                                <div class="services-item mb-40">
                                    <div class="services-item__icon mb-30">
                                        @if($service->type === 'diagnostic')
                                            <i class="flaticon-blood-test"></i>
                                        @else
                                            <i class="flaticon-biochemistry"></i>
                                        @endif
                                    </div>
                                    <div class="services-item__content">
                                        <h4 class="services-item__tp-title mb-30">
                                            <a href="{{route('service.show', $service->slug)}}">{{ $service->name }}</a>
                                        </h4>
                                        <p>
                                            {{ $service->short_description }}
                                        </p>
                                        <div class="services-item__btn">
                                            <a class="btn-hexa" href="{{route('service.show', $service->slug)}}"><i></i>Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    <!-- counter-area -->
    <section class="counter-area pt-40 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div
                        class="counter__item blue-border mb-30 wow fadeInUp"
                        data-wow-delay=".2s"
                    >
                        <div class="counter__icon mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title">
                                <span class="counter">0</span>
                            </h4>
                            <p>Текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div
                        class="counter__item pink-border mb-30 wow fadeInUp"
                        data-wow-delay=".4s"
                    >
                        <div class="counter__icon pink-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title">
                                <span class="counter">0</span>
                            </h4>
                            <p>Текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div
                        class="counter__item sky-border mb-30 wow fadeInUp"
                        data-wow-delay=".6s"
                    >
                        <div class="counter__icon sky-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title">
                                <span class="counter">0</span>
                            </h4>
                            <p>Текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div
                        class="counter__item green-border mb-30 wow fadeInUp"
                        data-wow-delay=".8s"
                    >
                        <div class="counter__icon green-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title">
                                <span class="counter">0</span>
                            </h4>
                            <p>Текст</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- counter-area-end -->

    <!-- gallery-area -->
    <section
        class="gallery-area grey-bg pt-120 pb-130"
        data-background="/assets/img/shape/shape-bg-01.png"
    >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-section text-center">
								<span class="tp-section__sub-title left-line right-line mb-25"
                                >наша работа</span
                                >
                        <h3 class="tp-section__title mb-70">Галерея</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="tp-gallery ml-15 mr-15 wow fadeInUp" data-wow-delay=".4s">
                <div class="swiper-container gall-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="tp-gallery__item p-relative mb-70">
                                <div class="tp-gallery__img p-relative">
                                    <img
                                        src="/images/clinic_02.png"
                                        alt="gallery-img"
                                    />
                                    <div class="tp-gallery__info">
                                        <a
                                            class="popup-image"
                                            href="/images/clinic_02.png"
                                        ><i class="fa-solid fa-plus"></i
                                            ></a>
                                    </div>
                                </div>
                                <div class="tp-gallery__content">
                                    <h4 class="tp-gallery__title">
                                        <span>Название</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-gallery__item p-relative mb-70">
                                <div class="tp-gallery__img p-relative">
                                    <img
                                        src="/images/clinic_03.png"
                                        alt="gallery-img"
                                    />
                                    <div class="tp-gallery__info">
                                        <a
                                            class="popup-image"
                                            href="/images/clinic_03.png"
                                        ><i class="fa-solid fa-plus"></i
                                            ></a>
                                    </div>
                                </div>
                                <div class="tp-gallery__content">
                                    <h4 class="tp-gallery__title">
                                        <span>Название</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tp-gallery__item p-relative mb-70">
                                <div class="tp-gallery__img p-relative">
                                    <img
                                        src="/images/clinic_04.png"
                                        alt="gallery-img"
                                    />
                                    <div class="tp-gallery__info">
                                        <a
                                            class="popup-image"
                                            href="/images/clinic_04.png"
                                        ><i class="fa-solid fa-plus"></i
                                            ></a>
                                    </div>
                                </div>
                                <div class="tp-gallery__content">
                                    <h4 class="tp-gallery__title">
                                        <span>Название</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery-area-end -->

    <!-- appoinment-area -->
    <section class="appoinment-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-12 col-md-12 p-0">
                    <div class="appoinment-thumb">
                        <img src="/images/online_01.png" alt="appoinment-img"/>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-7 col-lg-12 col-md-12 p-0">
                    <div class="visitor-info">
                        <h4 class="appoinment-title mb-25">
                            <i class="fa-light fa-file-signature"></i>Запишитесь на прием
                        </h4>
                        <div class="visitor-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="visitor-form__input">
                                            <input type="text" placeholder="Ваше ФИО"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="visitor-form__input">
                                            <input type="email" placeholder="Ваша почта"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="visitor-form__input">
                                            <input type="text" placeholder="Ваш номер телефона"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="visitor-form__input">
                                            <input type="text" placeholder="д / м / г"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="visitor-form__input">
													<textarea
                                                        placeholder="Напишите нам сообщение (необязательно)"
                                                        name="message"
                                                    ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="visit-btn mt-20">
                                            <button class="tp-btn">Отправить</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- appoinment-area-end -->

    <!-- team-area -->
    <section
        class="team-area grey-bg pt-120 pb-80"
        data-background="/assets/img/shape/shape-bg-01.png"
    >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-25">Наша команда</span>
                        <h3 class="tp-section__title mb-75">Познакомьтесь с нашими специалистами</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="tp-team-arrow d-flex align-items-center">
                        <div class="team-p">
                            <i class="fa-regular fa-arrow-left"></i>
                        </div>
                        <div class="team-n">
                            <i class="fa-regular fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="swiper-container team-active wow fadeInUp"
                data-wow-delay=".3s"
            >
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tp-team mb-50">
                            <div class="tp-team__thumb fix">
                                <a href="#"><img src="/images/team_01.png" alt="team-thumb"/></a>
                            </div>
                            <div class="tp-team__content">
                                <h4 class="tp-team__title mb-15">
                                    <a href="team-details.html">Имя фамилия</a>
                                </h4>
                                <span class="tp-team__position mb-30">Специальность</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam debitis
                                    distinctio dolores enim eos facere harum, laboriosam perspiciatis qui quibusdam
                                    ratione repellat reprehenderit sint sit temporibus tenetur vitae! Ratione.
                                </p>
                                <div class="tp-team__social">
                                    <a class="tp-youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a class="tp-instagram" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="tp-twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a class="tp-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-team mb-50">
                            <div class="tp-team__thumb fix">
                                <a href="#"><img src="/images/team_02.png" alt="team-thumb"/></a>
                            </div>
                            <div class="tp-team__content">
                                <h4 class="tp-team__title mb-15">
                                    <a href="team-details.html">Имя фамилия</a>
                                </h4>
                                <span class="tp-team__position mb-30">Специальность</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam debitis
                                    distinctio dolores enim eos facere harum, laboriosam perspiciatis qui quibusdam
                                    ratione repellat reprehenderit sint sit temporibus tenetur vitae! Ratione.
                                </p>
                                <div class="tp-team__social">
                                    <a class="tp-youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a class="tp-instagram" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="tp-twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a class="tp-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-team mb-50">
                            <div class="tp-team__thumb fix">
                                <a href="#"><img src="/images/team_03.png" alt="team-thumb"/></a>
                            </div>
                            <div class="tp-team__content">
                                <h4 class="tp-team__title mb-15">
                                    <a href="team-details.html">Имя фамилия</a>
                                </h4>
                                <span class="tp-team__position mb-30">Специальность</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam debitis
                                    distinctio dolores enim eos facere harum, laboriosam perspiciatis qui quibusdam
                                    ratione repellat reprehenderit sint sit temporibus tenetur vitae! Ratione.
                                </p>
                                <div class="tp-team__social">
                                    <a class="tp-youtube" href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a class="tp-instagram" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="tp-twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a class="tp-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-area-end -->

    <!-- testimonial-area -->
    <section
        class="testimonial-area testimonial-bg pt-125 pb-130"
        data-background="/assets/img/shape/shape-bg-02.png"
    >
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-12">
                    <div class="tp-section text-center">
                        <h3 class="tp-section__title title-white mb-70">
                            Отзывы
                        </h3>
                    </div>
                </div>
            </div>
            <div class="swiper-container tp-test-active pt-40">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img
                                    src="/assets/img/icon/testi-ava-01.jpg"
                                    alt="testimonial-avata"
                                />
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur
                                    dicta dolore, itaque nisi unde voluptate! Accusamus ad adipisci commodi dicta,
                                    ducimus et fugiat ipsam, laboriosam maiores maxime nihil quia.
                                </p>
                                <h5 class="tp-testi__avata-title">Имя фамилия</h5>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img
                                    src="/assets/img/icon/testi-ava-01.jpg"
                                    alt="testimonial-avata"
                                />
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur
                                    dicta dolore, itaque nisi unde voluptate! Accusamus ad adipisci commodi dicta,
                                    ducimus et fugiat ipsam, laboriosam maiores maxime nihil quia.
                                </p>
                                <h5 class="tp-testi__avata-title">Имя фамилия</h5>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img
                                    src="/assets/img/icon/testi-ava-01.jpg"
                                    alt="testimonial-avata"
                                />
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur
                                    dicta dolore, itaque nisi unde voluptate! Accusamus ad adipisci commodi dicta,
                                    ducimus et fugiat ipsam, laboriosam maiores maxime nihil quia.
                                </p>
                                <h5 class="tp-testi__avata-title">Имя фамилия</h5>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img
                                    src="/assets/img/icon/testi-ava-01.jpg"
                                    alt="testimonial-avata"
                                />
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur
                                    dicta dolore, itaque nisi unde voluptate! Accusamus ad adipisci commodi dicta,
                                    ducimus et fugiat ipsam, laboriosam maiores maxime nihil quia.
                                </p>
                                <h5 class="tp-testi__avata-title">Имя фамилия</h5>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-testi p-relative mb-70">
                            <div class="tp-testi__avata">
                                <img
                                    src="/assets/img/icon/testi-ava-01.jpg"
                                    alt="testimonial-avata"
                                />
                            </div>
                            <div class="tp-testi__content text-center">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequuntur
                                    dicta dolore, itaque nisi unde voluptate! Accusamus ad adipisci commodi dicta,
                                    ducimus et fugiat ipsam, laboriosam maiores maxime nihil quia.
                                </p>
                                <h5 class="tp-testi__avata-title">Имя фамилия</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12">
                    <div
                        class="tp-test-arrow d-flex align-items-center justify-content-center"
                    >
                        <div class="tp-test-prv">
                            <i class="fa-regular fa-arrow-left"></i>
                        </div>
                        <div class="tp-test-nxt">
                            <i class="fa-regular fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

    <!-- blog-area -->
    <section class="blog-area pt-125 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <div class="tp-section">
								<span class="tp-section__sub-title left-line mb-25"
                                >Что нового</span
                                >
                        <h3 class="tp-section__title mb-65">Наш блог</h3>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="tp-blog-arrow d-flex align-items-center">
                        <div class="tp-blog-p">
                            <i class="fa-regular fa-arrow-left"></i>
                        </div>
                        <div class="tp-blog-n">
                            <i class="fa-regular fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="swiper-container tp-blog-active wow fadeInUp"
                data-wow-delay=".3s"
            >
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img src="/assets/img/blog/blog-thumb-01.jpg" alt="blog-item"/></a>
                            </div>
                            <div class="tp-blog__content">
                                <h5 class="tp-blog__title mb-20">
                                    <a href="blog-details.html">Заголовок</a>
                                </h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi fuga hic illo,
                                    incidunt modi mollitia quasi totam voluptas? Alias, error, itaque? Aperiam at cumque
                                    earum exercitationem, perspiciatis provident repellat sit.
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img src="/assets/img/blog/blog-thumb-01.jpg" alt="blog-item"/></a>
                            </div>
                            <div class="tp-blog__content">
                                <h5 class="tp-blog__title mb-20">
                                    <a href="blog-details.html">Заголовок</a>
                                </h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi fuga hic illo,
                                    incidunt modi mollitia quasi totam voluptas? Alias, error, itaque? Aperiam at cumque
                                    earum exercitationem, perspiciatis provident repellat sit.
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img src="/assets/img/blog/blog-thumb-01.jpg" alt="blog-item"/></a>
                            </div>
                            <div class="tp-blog__content">
                                <h5 class="tp-blog__title mb-20">
                                    <a href="blog-details.html">Заголовок</a>
                                </h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi fuga hic illo,
                                    incidunt modi mollitia quasi totam voluptas? Alias, error, itaque? Aperiam at cumque
                                    earum exercitationem, perspiciatis provident repellat sit.
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img src="/assets/img/blog/blog-thumb-01.jpg" alt="blog-item"/></a>
                            </div>
                            <div class="tp-blog__content">
                                <h5 class="tp-blog__title mb-20">
                                    <a href="blog-details.html">Заголовок</a>
                                </h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi fuga hic illo,
                                    incidunt modi mollitia quasi totam voluptas? Alias, error, itaque? Aperiam at cumque
                                    earum exercitationem, perspiciatis provident repellat sit.
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-blog mb-30">
                            <div class="tp-blog__thumb p-relative fix">
                                <a href="#"><img src="/assets/img/blog/blog-thumb-01.jpg" alt="blog-item"/></a>
                            </div>
                            <div class="tp-blog__content">
                                <h5 class="tp-blog__title mb-20">
                                    <a href="blog-details.html">Заголовок</a>
                                </h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi fuga hic illo,
                                    incidunt modi mollitia quasi totam voluptas? Alias, error, itaque? Aperiam at cumque
                                    earum exercitationem, perspiciatis provident repellat sit.
                                </p>
                                <div class="tp-blog__btn">
                                    <a href="blog.html">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
@endsection
