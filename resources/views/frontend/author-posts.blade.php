@extends('frontend.layout.app')

@section('title', $author->name)

@push('css')
    <link href="{{ asset('frontend/single-post-1/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/single-post-1/css/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/blog-sidebar/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/blog-sidebar/css/responsive.css') }}" rel="stylesheet">

    <style>
        .info-area .tag-area {
            padding: 0 30px 30px!important;
        }
    </style>
@endpush

@section('content')

    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>BONA</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="images/marion-michele-330691.jpg" alt="Blog Image"></div>

                                    <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

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
                        </div><!-- col-md-6 col-sm-12 -->

                        <div class="col-md-6 col-sm-12">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="images/audrey-jackson-260657.jpg" alt="Blog Image"></div>

                                    <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

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
                        </div><!-- col-md-6 col-sm-12 -->

                        <div class="col-md-6 col-sm-12">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="images/marion-michele-330691.jpg" alt="Blog Image"></div>

                                    <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

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
                        </div><!-- col-md-6 col-sm-12 -->

                        <div class="col-md-6 col-sm-12">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="images/audrey-jackson-260657.jpg" alt="Blog Image"></div>

                                    <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

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
                        </div><!-- col-md-6 col-sm-12 -->

                        <div class="col-md-6 col-sm-12">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="images/marion-michele-330691.jpg" alt="Blog Image"></div>

                                    <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

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
                        </div><!-- col-md-6 col-sm-12 -->

                        <div class="col-md-6 col-sm-12">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="images/audrey-jackson-260657.jpg" alt="Blog Image"></div>

                                    <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

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
                        </div><!-- col-md-6 col-sm-12 -->

                    </div><!-- row -->

                    <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 ">

                    <div class="single-post info-area">

                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                            {{--<p>{{ $post->user->about }}</p>--}}
                        </div>

                        <div class="tag-area sidebar-area">

                            <h4 class="title"><b>CATEGORIES</b></h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{ route('frontend.category.posts', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>

                        </div><!-- subscribe-area -->

                        <div class="tag-area">

                            <h4 class="title"><b>TAGS</b></h4>
                            <ul>
                                @foreach($tags as $tag)
                                    <li><a href="{{ route('frontend.tag.posts', $tag->slug)  }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>

                        </div><!-- subscribe-area -->
                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->

@endsection
