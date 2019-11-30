@extends('frontend.layout.app')

@section('title', 'All Post')

@push('css')
    <link href="{{ asset('frontend/category/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/category/css/responsive.css') }}" rel="stylesheet">

    <style>
        .slider{
            background-image: url("{{ asset('frontend/images/slider-1.jpg') }}");
        }
    </style>
@endpush

@section('content')

    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>Category name</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">

                            <div class="blog-image"><img src="{{ asset('frontend/images/alex-lambley-205711.jpg') }}" alt="Blog Image"></div>

                            <a class="avatar" href="#"><img src=" {{ asset('frontend/images/icons8-team-355979.jpg') }}" alt="Profile Image"></a>

                            <div class="blog-info">

                                <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                            Concepts in Physics?</b></a></h4>

                                <ul class="post-footer">
                                    <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                    <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                </ul>

                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">

                            <div class="blog-image"><img src="{{ asset('frontend/images/alex-lambley-205711.jpg') }}" alt="Blog Image"></div>

                            <a class="avatar" href="#"><img src=" {{ asset('frontend/images/icons8-team-355979.jpg') }}" alt="Profile Image"></a>

                            <div class="blog-info">

                                <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                            Concepts in Physics?</b></a></h4>

                                <ul class="post-footer">
                                    <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                    <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                </ul>

                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">

                            <div class="blog-image"><img src="{{ asset('frontend/images/alex-lambley-205711.jpg') }}" alt="Blog Image"></div>

                            <a class="avatar" href="#"><img src=" {{ asset('frontend/images/icons8-team-355979.jpg') }}" alt="Profile Image"></a>

                            <div class="blog-info">

                                <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                            Concepts in Physics?</b></a></h4>

                                <ul class="post-footer">
                                    <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                    <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                </ul>

                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->


            </div><!-- row -->

            <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

        </div><!-- container -->
    </section><!-- section -->

@endsection

