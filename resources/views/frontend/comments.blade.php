@foreach($comments as $comment)
    <div class="comment">

        <div class="post-info">

            <div class="left-area">
                <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$comment->user->image) }}" alt="Profile Image"></a>
            </div>

            <div class="middle-area">
                <a class="name" href="#"><b>{{ $comment->user->name }}</b></a>
                <h6 class="date">on {{ $comment->created_at->diffForHumans() }}</h6>
            </div>

            {{--<div class="right-area">
                <h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
            </div>--}}

        </div><!-- post-info -->

        <p>{{ $comment->body }}</p>

        <form action="{{ route('frontend.post.comment.store', $post->id) }}" method="post" class="form-inline">
            @csrf
            <input name="parent_id" type="hidden" value="{{ $comment->id }}">
            <input type="text" name="comment" class="form-control">
            <button type="submit" class="btn btn-success ml-3">Reply</button>
        </form>

        @include('frontend.comments', ['comments' => $comment->replies])

    </div>
@endforeach
