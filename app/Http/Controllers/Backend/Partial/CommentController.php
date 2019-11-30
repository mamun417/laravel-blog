<?php

namespace App\Http\Controllers\Backend\Partial;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){

        $comments = Comment::latest()->get();

        return view('backend.partial.comment.index', compact('comments'));
    }

    public function delete(Comment $comment){

       $comment->delete();

       return back()->with('successMsg', 'Comment delete successfully');
    }
}
