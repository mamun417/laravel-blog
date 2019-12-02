@extends('frontend.layout.app')

@section('title', isset($result) ? $result->name : 'Posts')

@php($slider_image_url = isset($search_by) ? Storage::disk('public')->url($search_by.'/'.$result->image) : asset('frontend/images/slider-1.jpg'))

@push('css')
    <link href="{{ asset('frontend/category/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/category/css/responsive.css') }}" rel="stylesheet">

    <style>
        .slider{
            background-image: url("{{ $slider_image_url }}");
        }
    </style>
@endpush

@section('content')

    <div class="slider display-table center-text">
        <h1 class="title display-table-cell">
            <b>{{ isset($result) ? $result->name : (request('query') ? $posts->total().' results for “'.request('query').'”' : 'ALL POSTS') }}</b>
        </h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            @if($posts->count() > 0)

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
                                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                            <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div><!-- row -->

                {{-- <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>--}}

                <p class="text-left" style="margin: -16px 0px 10px 0px;">Showing 1 to {{ $posts->lastItem() }} of {{ $posts->total() }} entries</p>

            @else
                <h4 style="margin-top: -25px">No post available!</h4>
            @endif



            {{ $posts->appends(['query' => request('query')])->links() }}

        </div><!-- container -->
    </section><!-- section -->

@endsection

