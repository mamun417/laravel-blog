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

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $post;
        $comment->comment = $request->comment;

        $comment->save();

        return back()->with('successMsg', 'Your comment post successfully');
    }
}
