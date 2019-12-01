@extends('frontend.layout.app')

@section('title', 'Welcome to our laravel blog site')

@push('css')
    <link href="{{ asset('frontend/front-page-category/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/front-page-category/css/responsive.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="main-slider">
        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
             data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
             data-swiper-breakpoints="true" data-swiper-loop="true" >
            <div class="swiper-wrapper">

                @foreach($categories as $category)
                    <div class="swiper-slide">
                        <a class="slider-category" href="{{ route('frontend.category.posts', $category->slug) }}">
                            <div class="blog-image">
                                <img src="{{ Storage::disk('public')->url('category/slider/'.$category->image) }}" alt="Blog Image">
                            </div>

                            <div class="category">
                                <div class="display-table center-text">
                                    <div class="display-table-cell">
                                        <h3><b>{{ $category->name }}</b></h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">
            <div class="row">

                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="Blog Image"></div>

                                <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title">
                                        <a href="{{ route('frontend.post.view', $post->slug) }}">
                                            <b>{{ $post->title }}</b>
                                        </a>
                                    </h4>

                                    <ul class="post-footer">
                                        <li>
                                            @guest
                                                <a href="javascript:void(0)" onclick="toastr.error('You have to login first!');"><i class="ion-heart"></i>{{ $post->favorite_users_count }}</a>
                                            @else
                                                <a href="{{ route('frontend.post.favorite.store', $post->id) }}">
                                                    <i class="ion-heart {{ Auth::user()->favoritePosts()->where('post_id', $post->id)->count() != 0 ? 'active-favorite-post':'' }}"></i>
                                                    {{ $post->favorite_users_count }}
                                                </a>
                                            @endguest
                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

        </div>
    </section>

@endsection
