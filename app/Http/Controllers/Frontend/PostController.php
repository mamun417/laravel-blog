<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function view($slug){

        $post = Post::where('slug', $slug)->first();

        $categories = Category::latest()->get();

        $tags = Tag::latest()->get();

        $random_posts = Post::all()->random(3);

        return view('frontend.view-post', compact('post','categories', 'tags', 'random_posts'));
    }
}
