@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
             data-background="/images/medulla_online_appointment_01.png">
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
                @foreach($plans as $plan)
                    @if($plan->highlight)
                        <div class="col-lg-4 col-md-6">
                            <div class="tp-price tp-white-price active mb-40" style="min-height: 740px;">
                                <div class="tp-price__heading mb-45">
                                    <div class="tp-price__content">
                                        <h4 class="tp-price__value mb-25">{{$plan->name}}</h4>
                                    </div>
                                </div>
                                <div class="tp-price__features tp-price-secondary mb-55">
                                    {!! $plan->description !!}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-4">
                            <div class="tp-price mb-40" style="min-height: 600px;">
                                <div class="tp-price__heading mb-45">
                                    <div class="tp-price__content">
                                        <h4 class="tp-price__value mb-25">{{ $plan->name }}</h4>
                                    </div>
                                </div>
                                <div class="tp-price__features mb-55">
                                    {!! $plan->description !!}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div style="text-align: center">
            <a href="{{ route('appointment.single') }}" class="tp-btn">Перейти к записи <i
                    class="fa fa-arrow-right"></i></a>
        </div>
    </section>
    <!-- pricing-area-end -->
@endsection
