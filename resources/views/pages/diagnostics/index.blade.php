@extends('layout.master')
@section('content')
    @include('components.breadcrumbs', ['title' => 'Диагностика', 'image' => '/images/clinic_05.png'])
    <!-- project-area -->
    <section class="project-area pt-125 pb-35">
        <div class="container">
            @foreach($services as $item)
                <div class="row" style="margin-bottom: 80px;">
                    <div class="col-lg-7 col-md-7">
                        <div class="tpprosolution wow fadeInUp" data-wow-delay=".2s">
                            <h5 class="tpproject-title">{{$item->name}}</h5>
                        </div>
                        <div class=" wow fadeInUp" data-wow-delay=".2s"
                             style="padding: 0 5px; margin-top: 20px;">
                            {!! $item->description !!}
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="wow fadeInUp" data-wow-delay=".2s">
                            <img src="/{{$item->image}}" alt="projrct-thumb" style="width: 100%; border-radius: 15px">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- project-area-end -->
@endsection
