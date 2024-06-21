@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
             data-background="/{{$service->image}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">{{$service->name}}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                    <div class="tp-breadcrumb__link serv-md d-flex">
                        <span>Medulla : <a href="services-details.html"> Все услуги</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- services-details-area -->
    <section class="services-details pt-130 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="services-thumb-img mb-50 wow fadeInLeft" data-wow-delay=".4s">
                        <img src="/assets/img/services/services-thumb-07.jpg" alt="services-thumb">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="services-thumb-img mb-50 wow fadeInRight" data-wow-delay=".4s">
                        <img src="/assets/img/services/services-thumb-08.jpg" alt="services-thumb">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-srv-process mb-50">
                        <h4 class="tp-srv-process__title mb-30">{{ $service->name }}</h4>
                        {!! $service->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-details-area-end -->

    <!-- support-area -->
    <section class="support-area grey-bg pt-125 pb-130">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line right-line mb-20">запись на прием</span>
                        <h3 class="tp-section__title mb-70">Запишитесь на данную услугу</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class=" col-xl-10 col-lg-12 col-md-12 col-12">
                    <div class="tp-support-form text-center">
                        <form action="#">
                            <input type="text" placeholder="Введите ваше имя">
                            <input type="text" placeholder="Введите ваш email">
                        </form>
                        <div class="tp-support-form__btn">
                            <button class="tp-btn">Записаться на прием</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- support-area-end -->
@endsection
