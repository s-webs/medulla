@extends('layout.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
             data-background="/images/clinic_05.png" style="background-size: cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Блог</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- postbox area start -->
    <div class="postbox-area pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="postbox pr-20 pb-50">
                        @foreach($articles as $article)
                            <article class="postbox__item format-image mb-60 transition-3">
                                <div class="postbox__thumb w-img mb-35">
                                    <a href="blog-details.html">
                                        <img src="/{{$article->image}}" alt="{{$article->title}}">
                                    </a>
                                </div>
                                <div class="postbox__content">
                                    <div class="postbox__meta mb-40">
                                        <span><i class="fa-regular fa-clock"></i> {{$article->formatted_date}}</span>
                                        <span><i class="fa-light fa-eye"></i> {{$article->views}} просмотров</span>
                                    </div>
                                    <h3 class="postbox__title mb-40">
                                        <a href="{{route('blog.show', $article->slug)}}">{{$article->title}}</a>
                                    </h3>
                                    <div class="postbox__read-more">
                                        <a href="{{route('blog.show', $article->slug)}}" class="tp-btn">Читать</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <div class="basic-pagination">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="blog.html">
                                            <i class="fa-light fa-arrow-left-long"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog.html">1</a>
                                    </li>
                                    <li>
                                        <span class="current">2</span>
                                    </li>
                                    <li>
                                        <a href="blog.html">3</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">...</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">
                                            <i class="fa-light fa-arrow-right-long"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- postbox area end -->
@endsection
