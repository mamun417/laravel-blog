<ul>
    @foreach($posts as $post)
        <li>
            <a href="{{ route('frontend.post.view', $post->slug) }}">
                <div>
                    <img class="" src="{{ Storage::disk('public')->url('post/'.$post->image) }}">
                    <span>{{ $post->title }}</span><br>
                    <span><small>Created on by <b>{{ $post->user->name }}</b></small></span>
                </div>
            </a>
        </li>
    @endforeach
</ul>
