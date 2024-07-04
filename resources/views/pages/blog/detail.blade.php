@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
             data-background="/{{$article->image}}" style="background-size: cover;
    background-repeat: no-repeat;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7 col-md-7 col-12"></div>
                <div class="col-xl-6 col-lg-5 col-md-5 col-12">
                    <div class="tp-breadcrumb__link d-flex align-items-center">
                        <span>Medulla: <a href="{{route('blog.index')}}"> Все статьи</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- postbox area start -->
    <div class="container">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="postbox__wrapper">
                    <article class="postbox__item format-image mb-50 transition-3">
                        <div class="postbox__thumb w-img mb-30"></div>
                        <div class="postbox__content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="postbox__content-area pb-20">
                                        <div class="postbox__meta mb-40">
                                            <span><i
                                                    class="fa-regular fa-clock"></i> {{$article->formatted_date}}</span>
                                            <span><i class="fa-light fa-eye"></i> {{$article->views}} Просмотров</span>
                                        </div>
                                        <h3 class="postbox__title mb-35">
                                            <span>{{$article->title}}</span>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {!! $article->text !!}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- postbox area end -->
@endsection
