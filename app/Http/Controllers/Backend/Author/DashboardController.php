<?php

namespace App\Http\Controllers\Backend\Author;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $posts = Post::with('user')->latest()->get();

        return view('backend.author.dashboard', compact('posts'));
    }
}
