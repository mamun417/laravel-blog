<?php

namespace App\Http\Controllers\Backend\Partial;

use App\Comment;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;

class CommentController extends Controller
{
    public function index(){

        if (Auth::user()->role->id == 1){

            $comments = Comment::with(['user'])->latest()->get();

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

        if (Auth::user()->role->id == 1) {

            $comment->delete();

            Session::flash('successMsg', 'Comment delete successfully');

        }else{

            if ($comment->post->user_id == Auth::id()){

                $comment->delete();

                Session::flash('successMsg', 'Comment delete successfully');

            }else{
                Session::flash('errorMsg', 'You are not authorize to delete this comment');
            }
        }

        return back();
    }
}
