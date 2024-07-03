@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
             data-background="/images/online_appointment_page_single.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Запись на приём</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- pricing-area -->
    <section class="pricing-area pt-120 pb-90">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="tp-section">
                        <h3 class="tp-section__title mb-70">Наши тарифы</h3>
                    </div>
                </div>
            </div>
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="tp-price mb-40" style="min-height: 496px;">
                        <div class="tp-price__heading mb-45">
                            <div class="tp-price__content">
                                <h4 class="tp-price__value mb-25">Медицинский</h4>
                            </div>
                        </div>
                        <div class="tp-price__features mb-55">
                            <ul>
                                <li><strong>Длительность: 3 недели, Включено:</strong></li>
                                <li>20 сеансов - гипокситерапия, под контролем Александры Максимовой</li>
                                <li>3 сеанса - остеопатия под контролем нейроэнергокартирования, онлайн контроль
                                    Александры
                                    Максимовой
                                </li>
                                <li>10 сеансов - различные типы массажа</li>
                                <li>15 процедур - лазеротерапия, фонофорез, электрофорез</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="tp-price mb-40" style="min-height: 496px;">
                        <div class="tp-price__heading mb-45">
                            <div class="tp-price__content">
                                <h4 class="tp-price__value mb-25">Расширенный</h4>
                            </div>
                        </div>
                        <div class="tp-price__features mb-55">
                            <ul>
                                <li><strong>Полностью входит весь комплекс медицинского пакета плюс:</strong></li>
                                <li>20 сеансов - ежедневный АФК (адаптивный спорт)</li>
                                <li>20 сеансов - нейрокоррекция</li>
                                <li>20 сеансов - мозжечковая стимуляция</li>
                                <li>20 сеансов - сенсорная терапия</li>
                                <li>20 сеансов - логопед (комплекс включает форбрейн,
                                    музыкотерапию, логоритмику, логопедический
                                    массаж и занятия)
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing-area-end -->
@endsection
