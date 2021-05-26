@extends('frontend.layout.app')

@section('title', 'Profile')

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

    <div id="app">
        <div class="slider display-table center-text">
            <h1 class="title display-table-cell"><b>{{ $author->name }}</b></h1>
        </div><!-- slider -->

        <section class="blog-area section">
            <div class="container">

                @if($posts->count() > 0)

                    @auth
                        @php($auth_user_favorite_posts = Auth::user()->favoritePosts()->pluck('post_id')->toArray())
                    @elseauth
                        @php($auth_user_favorite_posts = [])
                    @endauth

                    <div class="row">

                        <div class="col-lg-8 col-md-12">
                            <div class="row">

                                @foreach($posts as $post)
                                    <div class="col-md-6 col-sm-12">
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
                                                                <a @click="addToFavoritePost" :post_id={{ $post->id }} href="javascript:void(0){{--{{ route('frontend.post.favorite.store', $post->id) }}--}}">
                                                                    <i class="ion-heart {{ in_array($post->id, (array) $auth_user_favorite_posts ) ? 'active-favorite-post':'' }}"></i>
                                                                    <span>{{ $post->favorite_users_count }}</span>
                                                                </a>
                                                            @endguest
                                                        </li>
                                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div><!-- card -->
                                    </div><!-- col-md-6 col-sm-12 -->
                                @endforeach

                            </div><!-- row -->

                        </div><!-- col-lg-8 col-md-12 -->

                        <div class="col-lg-4 col-md-12 ">

                            <div class="single-post info-area">

                                <div class="sidebar-area about-area">
                                    <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                                    <p>{{ $post->user->name }}</p>
                                    <p>{{ $post->user->about }}</p><br>
                                    <strong>Author Since : {{ $author->created_at->toDateString() }}</strong><br>
                                    <strong>Total Post : {{ $author->posts_count }}</strong>
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

                    </div>
                @else
                    <h4 style="margin-top: -25px">No post available!</h4>
                @endif

                {{ $posts->appends(['query' => request('query')])->links() }}

            </div>
        </section><!-- section -->
    </div>

@endsection
