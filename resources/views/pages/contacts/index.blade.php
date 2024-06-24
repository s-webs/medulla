@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
             data-background="/images/clinic_05.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Контакты</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-12">
                    <div class="tp-breadcrumb__link d-flex align-items-center">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

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
                                <span>г.Шымкент пр. Аль-Фараби 1/1</span>
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
                                <span><a href="tel:+77777777777">+7 777 777 77 77</a></span>
                                <span><a href="tel:+77777777777">+7 777 777 77 77</a></span>
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
                                <span>Понедельник - Пятница <br>09:00 - 18:00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="contactform wow fadeInRight" data-wow-delay=".4s">
                        <h4 class="appoinment-title mb-25">
                            <i class="fa-light fa-file-signature"></i>Запишитесь на прием
                        </h4>
                        <div class="contactform__list mb-60">
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tpcontactmap">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d56215.718841453985!2d-0.19959027821222705!3d51.48739183082915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slondon%20eye!5e0!3m2!1sen!2sbd!4v1656749326947!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
