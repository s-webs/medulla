@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
             data-background="/{{$service->image}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title"
                            style="word-wrap: break-word; overflow-wrap: break-word; word-break: break-word; white-space: normal;">{{$service->name}}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                    <div class="tp-breadcrumb__link serv-md d-flex">
                        <span>Medulla : <a href="{{ route('service.index') }}"> Все услуги</a></span>
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
                <div class="col-lg-12">
                    <div class="tp-srv-process mb-50">
                        <h4 class="tp-srv-process__title mb-30"
                            style="word-wrap: break-word; overflow-wrap: break-word; word-break: break-word; white-space: normal;">{{ $service->name }}</h4>
                        {!! $service->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-details-area-end -->
@endsection
