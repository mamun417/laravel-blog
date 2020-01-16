<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    public function allPost(){

        $posts = Post::with('user')->withCount('favoriteUsers')->publishedAndActive()->latest()->paginate(6);

        return view('frontend.posts', compact('posts'));
    }

    public function postByCategory($slug){

        $result = Category::where('slug', $slug)->first();

        $posts = $result->posts()->publishedAndActive()->paginate(3);

        $search_by = 'category';

        return view('frontend.posts', compact('result', 'posts', 'search_by'));
    }

    public function postByTag($slug){

        $result = Tag::with('posts')->where('slug', $slug)->first();

        $posts = $result->posts()->publishedAndActive()->paginate(3);

        return view('frontend.posts', compact('result', 'posts'));
    }

    public function view($slug){

        $post = Post::with(['comments.user', 'comments.replies'])
            ->withCount(['favoriteUsers', 'comments'])
            ->publishedAndActive()
            ->where('slug', $slug)->first();

        $tags = Tag::latest()->take(10)->get();

        $random_posts = Post::with(['user', 'comments'])
            ->withCount(['favoriteUsers', 'comments'])
            ->publishedAndActive()
            ->inRandomOrder()->take(3)->get();

        //view count
        $post_key = 'view_count_'.$post->id;

        if (!Session::has($post_key)){
            $post->increment('view_count');
            Session::put($post_key, 1);
        }

        return view('frontend.view-post', compact('post','tags', 'random_posts'));
    }

    public function search(){

        $query = request('query');

        $posts = Post::with('user')->publishedAndActive()
            ->where('title', 'LIKE', "%$query%")
            ->paginate(3);

        return view('frontend.posts', compact('posts'));
    }

    public function getAutoCompletePosts(){

        $query = request('query');

        $posts = Post::with('user')->publishedAndActive()
            ->where('title', 'LIKE', "%$query%")
            ->take(15)->get();

        return view('frontend.partial.product-suggestion-list', compact('posts'));
    }
}
