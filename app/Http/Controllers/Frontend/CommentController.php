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
        info($request->all());

        info($request->comment);

        /*$request->validate([
            'comment' => 'required|max:555',
        ]);*/

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id ?? 0;
        $comment->mentioned_id = $request->mention_id;
        $comment->body = $request->comment;
        $post = Post::find($post);
        $post->comments()->save($comment);

        return response()->json(['status' => 'success']);

        //return back()->with('successMsg', 'Your comment post successfully');
    }
}
