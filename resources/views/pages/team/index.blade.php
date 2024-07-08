@extends('layout.master')
@section('content')
    @include('components.breadcrumbs', ['title' => 'Команда', 'image' => '/images/clinic_05.png'])
    <section class="team-area mt-30 mb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-section text-center">
                        <span class="tp-section__sub-title left-line right-line mb-25">наша команда</span>
                        <h3 class="tp-section__title mb-70">Наши специалисты</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($teams as $doctor)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="team-item mb-35 wow fadeInUp" data-wow-delay=".2s">
                            <div class="team-item__thumb mb-40">
                                <img src="/{{$doctor->image}}" alt="team-thumb"
                                     style="width: 208px; height: 240px; object-fit: cover">
                            </div>
                            <div class="team-item__content">
                                <h5 class="team-item__title mb-15">
                                    <a href="{{route('team.show', $doctor->id)}}">{{$doctor->name}}</a>
                                </h5>
                                <span>{{$doctor->speciality}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
