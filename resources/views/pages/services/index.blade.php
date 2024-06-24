@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
             data-background="/images/clinic_05.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Услуги</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- services-area -->
    <section class="services-area pt-120 pb-105 grey-bg" data-background="assets/img/shape/shape-bg-01.png">
        <div class="container">
            <div class="row align-items-end  mb-45">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-20">наши услуги</span>
                        <h3 class="tp-section__title mb-30">Список услуг</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="services-thumb-box pink-round mb-30 wow fadeInUp" data-wow-delay=".4s">
                            <div class="services-thumb-box__thumb fix">
                                <img src="{{ $service->image }}" alt="{{ $service->name  }}" width="410">
                            </div>
                            <div class="services-thumb-box__text-area d-flex align-items-center">
                                <div class="services-thumb-box__icon mr-20">
                                    <i class="flaticon-blood-test"></i>
                                </div>
                                <div class="services-thumb-box__content">
                                    <h5 class="services-thumb-box__title"><a href="{{route('service.show', $service->slug)}}">{{ $service->name  }}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- services-area-end -->

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
