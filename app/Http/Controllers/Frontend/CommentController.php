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

        $comment = new Comment;
        $comment->parent_id = $request->parent_id ?? 0;
        $comment->user()->associate($request->user());
        $comment->body = $request->comment;
        $post = Post::find($post);
        $post->comments()->save($comment);

        return back()->with('successMsg', 'Your comment post successfully');
    }
}
