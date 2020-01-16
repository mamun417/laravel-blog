<?php

namespace App\Http\Controllers\Frontend;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post)
    {
        $request->validate([
            'comment' => 'required|max:555',
        ]);

        $user_id = Auth::user()->id;
        $mention_id = $request->mention_id;

        $comment = new Comment;
        $comment->user_id = $user_id;
        $comment->parent_id = $request->parent_id;
        $comment->mentioned_id = $mention_id == $user_id ? 0 : $mention_id;
        $comment->body = $request->comment;

        $post = Post::find($post);

        $post->comments()->save($comment);

        return response()->json(['status' => 'success']);
    }
}
