<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    public function allPost(){

        $posts = Post::latest()->paginate(12);

        return view('frontend.posts', compact('posts'));
    }

    public function view($slug){

        $post = Post::where('slug', $slug)->first();

        $categories = Category::latest()->get();

        $tags = Tag::latest()->get();

        $random_posts = Post::all()->random(3);


        //view count
        $post_key = 'view_count_'.$post->id;

        if (!Session::has($post_key)){
            $post->increment('view_count');
            Session::put($post_key, 1);
        }

        return view('frontend.view-post', compact('post','categories', 'tags', 'random_posts'));
    }
}
