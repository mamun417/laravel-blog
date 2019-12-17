<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::publishedAndActive()->with('user')
                ->withCount(['favoriteUsers', 'comments'])
                ->latest()->get();

        return view('frontend.welcome', compact('posts'));
    }
}
