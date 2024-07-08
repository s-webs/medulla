@extends('layout.master')
@section('content')
    @include('components.breadcrumbs', ['title' => $doctor->name, 'image' => '/images/clinic_05.png'])

    <section class="team-details-area mt-30 mb-30">
        <div class="container">
            <div class="row"
                 style="box-shadow: 3px 3px 10px 0px rgba(0,0,0,0.3);; padding: 20px; border-radius: 15px;">
                <div class="col-lg-5 col-md-6">
                    <div class="tp-team-dtls__thumb">
                        <img src="/{{$doctor->image}}" alt="{{$doctor->name}}" style="width: 100%;">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tp-team-dtls__content">
                        <h4 class="tp-team-dtls__title mb-10">{{$doctor->name}}</h4>
                        <span class="mb-35">{{$doctor->speciality}}</span>
                        <div class="tp-team-dtls__info">
                            <ul>
                                <li>{{$doctor->country}}, {{$doctor->city}}</li>
                                <li>{!! $doctor->description !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-team-dtls-text mt-40">
                        {!! $doctor->biography !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
