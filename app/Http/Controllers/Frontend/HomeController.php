<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //60745

    public function index()
    {
        $categories = Category::latest()->get();

        $posts = Post::publishedAndActive()->with('user')
                ->withCount(['favoriteUsers', 'comments'])
                ->latest()->get();

        return view('frontend.welcome', compact('categories', 'posts'));
    }
}
