@foreach($comments as $comment)
    <div class="single-comment">
        <div class="comment-owner">
            <img src="{{ Storage::disk('public')->url('profile/'.$comment->user->image) }}">
        </div>
        <div class="comment-body">
            <div class="comment-info">
                <a href="javascript:void(0)"><b>{{ $comment->user->name }}</b></a> @if($comment->mentioned_id != 0)<a href="javascript:void(0)"><strong>{{ $comment->mentionedUser->name }}</strong></a>@endif {{ $comment->body }}.
            </div>
            <div class="comment-action">
                <ul>
                    <li><a href="javascript:void(0)">Like</a></li>
                    <li>
                        <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                        <a onclick="showReplyForm(this)" parent_id="{{ $comment->id }}" mention_id="{{ $comment->user->id }}" reply_type="mentionReply" href="javascript:void(0)">Reply</a>
                    </li>
                    <li>
                        <span aria-hidden="true" class="_6cok">&nbsp;·&nbsp;</span>
                        <a href="javascript:void(0)">10h</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @if($comment->replies->count() > 0)
        @include('frontend.comments_replies', ['comments' => $comment->replies])
    @endif

@endforeach

