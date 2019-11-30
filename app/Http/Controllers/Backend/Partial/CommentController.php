<?php

namespace App\Http\Controllers\Backend\Partial;

use App\Comment;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){

        if (Auth::user()->role->id == 1){

            $comments = Comment::latest()->get();

        }else{

            $posts = Auth::user()->posts()->with('comments')->get();

            $comments = [];

            foreach ($posts as $post){

                foreach ($post->comments as $comment){

                    $comments[] = $comment;
                }
            }
        }

        return view('backend.partial.comment.index', compact('comments'));
    }

    public function delete(Comment $comment){

       $comment->delete();

       return back()->with('successMsg', 'Comment delete successfully');
    }
}
