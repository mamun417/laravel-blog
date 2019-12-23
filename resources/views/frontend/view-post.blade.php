@extends('frontend.layout.app')

@section('title', $post->title)

@push('css')
    <link href="{{ asset('frontend/single-post-1/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/single-post-1/css/responsive.css') }}" rel="stylesheet">

    <style>
        .info-area .tag-area {
            padding: 0 30px 30px!important;
        }
        .slider{
            background-image: url("{{ Storage::disk('public')->url('post/'.$post->image) }}");
        }
        .comment .comment{
            margin-left: 23px;
            border-bottom: 0;
        }
    </style>

@endpush

@section('content')

    <div id="app">
       {{-- <div class="slider">
            <div class="display-table  center-text">
                --}}{{--<h1 class="title display-table-cell"><b>DESIGN</b></h1>--}}{{--
            </div>
        </div><!-- slider -->--}}

        {{--<section class="post-area section">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8 col-md-12 no-right-padding">

                        <div class="main-post">

                            <div class="blog-post-inner">

                                <div class="post-info">

                                    <div class="left-area">
                                        <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a>
                                    </div>

                                    <div class="middle-area">
                                        <a class="name" href="#"><b>{{ $post->user->name }}</b></a>
                                        <h6 class="date">on {{ $post->created_at->diffForHumans() }}</h6>
                                    </div>

                                </div><!-- post-info -->

                                <h3 class="title">
                                    <b>{{ $post->title }}</b>
                                </h3>

                                <p class="para">

                                    --}}{{--{{ dd($post->body) }}--}}{{--

                                    {!! html_entity_decode($post->body) !!}
                                </p>

                            </div><!-- blog-post-inner -->

                            <div class="post-icons-area">
                                <ul class="post-icons">
                                    <li><a href="#"><i class="ion-heart"></i>{{ $post->favorite_users_count }}</a></li>
                                    <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments_count }}</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                </ul>

                                <ul class="icons">
                                    <li>SHARE : </li>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                                </ul>
                            </div>

                        </div><!-- main-post -->
                    </div><!-- col-lg-8 col-md-12 -->

                    <div class="col-lg-4 col-md-12 no-left-padding">

                        <div class="single-post info-area">

                            <div class="sidebar-area about-area">
                                <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                                <p>{{ $post->user->about }}</p>
                            </div>

                            <div class="tag-area sidebar-area">

                                <h4 class="title"><b>CATEGORIES</b></h4>
                                <ul>
                                    --}}{{--@foreach(getCategories() as $category)
                                        <li><a href="{{ route('frontend.category.posts', $category->slug) }}">{{ $category->name }}</a></li>
                                    @endforeach--}}{{--
                                </ul>

                            </div><!-- subscribe-area -->

                            <div class="tag-area">

                                <h4 class="title"><b>TAGS</b></h4>
                                <ul>
                                   --}}{{-- @foreach($tags as $tag)
                                        <li><a href="{{ route('frontend.tag.posts', $tag->slug)  }}">{{ $tag->name }}</a></li>
                                    @endforeach--}}{{--
                                </ul>

                            </div><!-- subscribe-area -->

                        </div><!-- info-area -->

                    </div><!-- col-lg-4 col-md-12 -->

                </div><!-- row -->

            </div><!-- container -->
        </section><!-- post-area -->--}}

        <section class="recomended-area section">
            <div class="container">
                <div class="row">

                    @auth
                        @php($auth_user_favorite_posts = Auth::user()->favoritePosts()->pluck('post_id')->toArray())
                    @elseauth
                        @php($auth_user_favorite_posts = [])
                    @endauth

                    {{--@foreach($random_posts as $random_post)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="{{ Storage::disk('public')->url('post/'.$random_post->image) }}" alt="Blog Image"></div>

                                    <a class="avatar" href="{{ route('frontend.author.posts', $random_post->user->username) }}"><img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a>

                                    <div class="blog-info">

                                        <h4 class="title">
                                            <a href="{{ route('frontend.post.view', $random_post->slug) }}">
                                                <b>{{ $random_post->title }}</b>
                                            </a>
                                        </h4>

                                        <ul class="post-footer">
                                            <li>
                                                @guest
                                                    <a href="javascript:void(0)" onclick="toastr.error('You have to login first!');"><i class="ion-heart"></i>{{ $random_post->favorite_users_count }}</a>
                                                @else
                                                    <a @click="addToFavoritePost" :post_id={{ $random_post->id }} href="javascript:void(0)--}}{{--{{ route('frontend.post.favorite.store', $post->id) }}--}}{{--">
                                                        <i class="ion-heart {{ in_array($random_post->id, (array) $auth_user_favorite_posts ) ? 'active-favorite-post':'' }}"></i>
                                                        <span>{{ $random_post->favorite_users_count }}</span>
                                                    </a>
                                                @endguest
                                            </li>
                                            <li><a href="#"><i class="ion-chatbubble"></i>{{ $random_post->comments_count }}</a></li>
                                            <li><a href="#"><i class="ion-eye"></i>{{ $random_post->view_count }}</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach--}}

                </div><!-- row -->

            </div><!-- container -->
        </section>

        <section class="comment-section">
            <div class="container">
                <h4><b>POST COMMENT</b></h4>
                <div class="row">

                    <div class="col-lg-8 col-md-12">
                        {{--<div class="comment-form">
                            <form action="{{ route('frontend.post.comment.store', $post->id) }}" method="post">
                                @csrf

                                @auth
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <textarea name="comment" rows="2" class="text-area-messge form-control" required
                                                  placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >

                                            @error('comment')
                                            <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-12">
                                            <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                        </div>
                                    </div>
                                @else
                                    <p>For post a new comment, You need to login first.
                                        <a class="text-success" href="{{ route('login') }}">Login</a>
                                    </p>
                                @endauth
                            </form>
                        </div>--}}

                        @if($post->comments->count() > 0)

                            <h4><b>COMMENTS({{ $post->comments_count }})</b></h4>

                            <div class="commnets-area">

                                <div class="single-comment">
                                    <div class="comment-owner">
                                        <img src="http://127.0.0.1:8000/storage/profile/new-admin-name-2019-12-12-5df2c010dc4f0.png">
                                    </div>
                                    <div class="comment-body">
                                        <div class="comment-info">
                                            <a href="javascript:void(0)"><b>Abdullah al mamun</b></a> will by the readable when looking at its layout.
                                        </div>
                                        <div class="comment-action">
                                            <ul>
                                                <li><a href="javascript:void(0)">Like</a></li>
                                                <li>
                                                    <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                    <a reply_type="onlyReply" comment_id="12" @click="showReplyForm" href="javascript:void(0)">Reply</a>
                                                </li>
                                                <li>
                                                    <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                    <a href="javascript:void(0)">10h</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-replies" id="replis-12">
                                    <div class="single-comment">
                                        <div class="comment-owner">
                                            <img src="http://127.0.0.1:8000/storage/profile/new-admin-name-2019-12-12-5df2c010dc4f0.png">
                                        </div>
                                        <div class="comment-body">
                                            <div class="comment-info">
                                                <a href="javascript:void(0)"><b>Nasir Hossain</b></a> will by the  of looking at its layout.
                                            </div>
                                            <div class="comment-action">
                                                <ul>
                                                    <li><a href="javascript:void(0)">Like</a></li>
                                                    <li>
                                                        <span aria-hidden="true" class="">&nbsp;·&nbsp;</span>
                                                        <a reply_type="mentionReply" @click="showReplyForm" href="javascript:void(0)">Reply</a>
                                                    </li>
                                                    <li>
                                                        <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                        <a href="javascript:void(0)">10h</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-comment">
                                        <div class="comment-owner">
                                            <img src="http://127.0.0.1:8000/storage/profile/new-admin-name-2019-12-12-5df2c010dc4f0.png">
                                        </div>
                                        <div class="comment-body">
                                            <div class="comment-info">
                                                <a href="javascript:void(0)"><b>Nasir Hossain</b></a> will by the  of looking at its layout.
                                            </div>
                                            <div class="comment-action">
                                                <ul>
                                                    <li><a href="javascript:void(0)">Like</a></li>
                                                    <li>
                                                        <span aria-hidden="true" class="">&nbsp;·&nbsp;</span>
                                                        <a reply_type="mentionReply" @click="showReplyForm" href="javascript:void(0)">Reply</a>
                                                    </li>
                                                    <li>
                                                        <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                        <a href="javascript:void(0)">10h</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-comment">
                                        <div class="comment-owner">
                                            <img src="http://127.0.0.1:8000/storage/profile/new-admin-name-2019-12-12-5df2c010dc4f0.png">
                                        </div>
                                        <div class="comment-body">
                                            <div class="comment-info">
                                                <a href="javascript:void(0)"><b>Nasir Hossain</b></a> will by the  of looking at its layout.
                                            </div>
                                            <div class="comment-action">
                                                <ul>
                                                    <li><a href="javascript:void(0)">Like</a></li>
                                                    <li>
                                                        <span aria-hidden="true" class="">&nbsp;·&nbsp;</span>
                                                        <a reply_type="mentionReply" @click="showReplyForm" href="javascript:void(0)">Reply</a>
                                                    </li>
                                                    <li>
                                                        <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                        <a href="javascript:void(0)">10h</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-comment">
                                        <div class="comment-owner">
                                            <img src="http://127.0.0.1:8000/storage/profile/new-admin-name-2019-12-12-5df2c010dc4f0.png">
                                        </div>
                                        <div class="comment-body">
                                            <div class="comment-info">
                                                <a href="javascript:void(0)"><b>Abdullah al mamun</b></a> <a href="javascript:void(0)"><strong>Nasir Hossain</strong></a> will b of a page when at its layout.
                                            </div>
                                            <div class="comment-action">
                                                <ul>
                                                    <li><a href="javascript:void(0)">Like</a></li>
                                                    <li>
                                                        <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                        <a href="javascript:void(0)">Reply</a>
                                                    </li>
                                                    <li>
                                                        <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                        <a href="javascript:void(0)">10h</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="single-comment">
                                    <div class="comment-owner">
                                        <img src="http://127.0.0.1:8000/storage/profile/new-admin-name-2019-12-12-5df2c010dc4f0.png">
                                    </div>
                                    <div class="comment-body">
                                        <div class="comment-info">
                                            <a href="javascript:void(0)"><b>Abdullah al mamun</b></a> will by the content of a page when looking at its layout.
                                        </div>
                                        <div class="comment-action">
                                            <ul>
                                                <li><a href="javascript:void(0)">Like</a></li>
                                                <li>
                                                    <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                    <a href="javascript:void(0)">Reply</a>
                                                </li>
                                                <li>
                                                    <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                    <a href="javascript:void(0)">10h</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-comment">
                                    <div class="comment-owner">
                                        <img src="http://127.0.0.1:8000/storage/profile/new-admin-name-2019-12-12-5df2c010dc4f0.png">
                                    </div>
                                    <div class="comment-body">
                                        <div class="comment-info">
                                            <a href="javascript:void(0)"><b>Abdullah al mamun</b></a> will by page when looking at its layout.
                                        </div>
                                        <div class="comment-action">
                                            <ul>
                                                <li><a href="javascript:void(0)">Like</a></li>
                                                <li>
                                                    <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                    <a href="javascript:void(0)">Reply</a>
                                                </li>
                                                <li>
                                                    <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                    <a href="javascript:void(0)">10h</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-comment">
                                    <div class="comment-owner">
                                        <img src="http://127.0.0.1:8000/storage/profile/new-admin-name-2019-12-12-5df2c010dc4f0.png">
                                    </div>
                                    <div class="comment-body">
                                        <div class="comment-info">
                                            <a href="javascript:void(0)"><b>Abdullah al mamun</b></a> will by the when looking at its layout.
                                        </div>
                                        <div class="comment-action">
                                            <ul>
                                                <li><a href="javascript:void(0)">Like</a></li>
                                                <li>
                                                    <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                    <a href="javascript:void(0)">Reply</a>
                                                </li>
                                                <li>
                                                    <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                                                    <a href="javascript:void(0)">10h</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-form-section">
                                    <div class="comment-owner">
                                        <img src="{{ Storage::disk('public')->url('profile/'.Auth::user()->image) }}">
                                    </div>
                                    <div class="comment-box">
                                        <textarea onkeyup="this.style.height = '1px'; this.style.height = (5+this.scrollHeight)+'px'" placeholder="Write a comment" class="form-control"></textarea>
                                    </div>
                                </div>

                                @include('frontend.comments', ['comments' => $post->comments->where('parent_id', 0)])

                            </div>

                            <a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</b></a>
                        @endif

                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection

