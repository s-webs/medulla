@extends('layout.master')
@section('content')
    @include('components.breadcrumbs', ['title' => 'Контакты', 'image' => '/images/clinic_05.png'])

    <!-- contact-area -->
    <section class="contact-area pt-130 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12 wow fadeInLeft" data-wow-delay=".4s">
                    <div class="tpcontact mr-60 mb-60 wow fadeInUp" data-wow-delay=".2s">
                        <div class="tpcontact__item text-center">
                            <div class="tpcontact__icon mb-20">
                                <img src="assets/img/icon/contact-01.svg" alt="">
                            </div>
                            <div class="tpcontact__address">
                                <h4 class="tpcontact__title mb-15">Адрес</h4>
                                <span>{{$settings[1]->value ?? "Adress"}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="tpcontact mr-60 mb-60 wow fadeInUp" data-wow-delay=".4s">
                        <div class="tpcontact__item text-center">
                            <div class="tpcontact__icon mb-20">
                                <img src="assets/img/icon/contact-02.svg" alt="">
                            </div>
                            <div class="tpcontact__address">
                                <h4 class="tpcontact__title mb-15">Контактные номера</h4>
                                <span><a href="tel:{{$settings[2]->value ?? 0}}">{{$settings[2]->value ?? 0}}</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="tpcontact mr-60 mb-60 wow fadeInUp" data-wow-delay=".6s">
                        <div class="tpcontact__item text-center">
                            <div class="tpcontact__icon mb-20">
                                <img src="assets/img/icon/contact-03.svg" alt="">
                            </div>
                            <div class="tpcontact__address">
                                <h4 class="tpcontact__title mb-15">Время работы</h4>
                                <span>{{$settings[9]->value ?? "Понедельник"}} - {{$settings[10]->value ?? "Пятница"}} <br>{{$settings[11]->value ?? "09:00"}} - {{$settings[12]->value ?? "18:00"}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="contactform wow fadeInRight" data-wow-delay=".4s">
                        <h4 class="appoinment-title mb-25">
                            <i class="fa-light fa-map-location"></i>Мы на карте
                        </h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tpcontactmap">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d56215.718841453985!2d-0.19959027821222705!3d51.48739183082915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slondon%20eye!5e0!3m2!1sen!2sbd!4v1656749326947!5m2!1sen!2sbd"
                                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
@endsection
