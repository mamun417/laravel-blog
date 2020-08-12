@extends('frontend.layout.app')

@section('title', $post->title)

@push('css')
    <link href="{{ asset('frontend/single-post-1/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/single-post-1/css/responsive.css') }}" rel="stylesheet">

    <style>
        .info-area .tag-area {
            padding: 0 30px 30px !important;
        }

        .slider {
            background-image: url("{{ Storage::disk('public')->url('post/'.$post->image) }}");
        }

        .comment .comment {
            margin-left: 23px;
            border-bottom: 0;
        }
    </style>

@endpush

@section('content')

     <div class="slider">
         <div class="display-table  center-text">
             <h1 class="title display-table-cell"><b>DESIGN</b></h1>
         </div>
     </div><!-- slider -->

    <section class="post-area section">
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
                                @foreach(getCategories(10) as $category)
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

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->

    <section class="recomended-area section">
        <div class="container">
            <div class="row">

                @auth
                    @php($auth_user_favorite_posts = Auth::user()->favoritePosts()->pluck('post_id')->toArray())
                @elseauth
                    @php($auth_user_favorite_posts = [])
                @endauth

                @foreach($random_posts as $random_post)
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
                                                <a @click="addToFavoritePost" :post_id={{ $random_post->id }} href="javascript:void(0){{ route('frontend.post.favorite.store', $post->id) }}">
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
                @endforeach

            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
            <h4><b>POST COMMENT</b></h4>
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        <form action="{{ route('frontend.post.comment.store', $post->id) }}" method="post">
                            @csrf

                            @auth

                               {{-- @if($post->comments_count > 0)--}}

                                    <h4><b>COMMENTS({{ $post->comments_count }})</b></h4>

                                    <div class="commnets-area">
                                        @include('frontend.comments', ['comments' => $post->comments->where('parent_id', 0)])

                                        <div class="comment-form-section">
                                            <div class="comment-owner">

                                                @auth
                                                    @php($image = Auth::user()->image)
                                                @else
                                                    @php($image = '')
                                                @endauth

                                                <img src="{{ Storage::disk('public')->url('profile/'.$image) }}">
                                            </div>

                                            <div class="comment-box">
                                                <form action="{{ route('frontend.post.comment.store', $post->id) }}" method="post">
                                                    @csrf

                                                    <textarea onkeyup="typingComment(this)" name="comment" parent_id="0" mention_id="0" required
                                                              placeholder="Write a comment" class="form-control"></textarea>
                                                    @error('comment')
                                                    <span class="help-block m-b-none text-danger">{{ $message }}</span>
                                                    @enderror
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</b></a>--}}
                               {{-- @endif--}}
                                {{--<div class="row">
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
                                </div>--}}
                            @else
                                <p>For post a new comment, You need to login first.
                                    <a class="text-success" href="{{ route('login') }}">Login</a>
                                </p>
                            @endauth
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection

@section('custom-js')
    <script>

        function showReplyForm(e) {

            if($(e).attr('rep_form') === "1") return;

            $(e).attr('rep_form', 1);

            let reply_type = $(e).attr('reply_type'),
                parent_div = $(e).parents('.single-comment');

            if(reply_type === 'onlyReply'){

                let replyForm = getReplyForm(0, $(e).attr('parent_id'));

                let checkReplies = $(parent_div).next().hasClass('comment-replies');

                if(checkReplies){

                    let last = $(parent_div).next('.comment-replies').find('.single-comment').last();

                    $(last).after(replyForm);

                    $(last).next('.comment-form-section').find('textarea').focus();

                }else{
                    $(parent_div).after('<div class="comment-replies">'+replyForm+'</div>');
                    $(parent_div).next('.comment-replies').find('textarea').focus();
                }

            }else if(reply_type === 'mentionReply'){

                $(e).parents('.comment-body').find('a').first().attr("style", "color: #ED5666!important");

                /*let mentioned_user_name = $(e).parents('.comment-body').find('.comment-info a b').text(),
                    mentioned_name_length = mentioned_user_name.length;*/

                $(parent_div).after(getReplyForm($(e).attr('mention_id'), $(e).attr('parent_id')));

                $($(parent_div).next('.comment-form-section').find('textarea').focus())[0].setSelectionRange(1, 1);
            }
        }

        @auth
            @php($image = Auth::user()->image)
        @else
            @php($image = '')
        @endauth

        function getReplyForm(mention_id = 0, parent_id = 0) {

            return reply_form = '<div class="comment-form-section">' +
                '<div class="comment-owner">' +
                    '<img src="{{ Storage::disk('public')->url('profile/'.$image) }}">' +
                '</div>' +
                '<div class="comment-box">' +
                    '<textarea onkeyup="typingComment(this)" parent_id='+parent_id+' mention_id='+mention_id+' placeholder="Write a reply" class="form-control"></textarea>' +
                '</div>' +
            '</div>';
        }

        function typingComment(e){

            if(event.which === 13){

                let parent_id = $(e).attr('parent_id'),
                    mention_id = $(e).attr('mention_id'),
                    comment = $(e).val();

                storeComment(parent_id, mention_id, comment);
                return;
            }

            e.style.height = '1px';
            e.style.height = (e.scrollHeight) + 'px';
        }

        function storeComment(parent_id, mention_id, comment){

            axios.post('{{ route('frontend.post.comment.store', $post->id) }}', { parent_id:parent_id, comment:comment, mention_id:mention_id })
                .then(function (response) {

                    if(response.data.status === 'success'){
                        location.reload();
                    }else{
                        toastr.error('There is a problem');
                    }
                });
        }
    </script>
@endsection
