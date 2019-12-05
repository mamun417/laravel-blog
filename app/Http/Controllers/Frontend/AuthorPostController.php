<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class AuthorPostController extends Controller
{
    public function index($username){

        $author = User::withCount(['posts' => function($query){
                    $query->publishedAndActive();
                }])->where('username', $username)->first();

        $posts = $author->posts()->publishedAndActive()->paginate(4);

        $categories = Category::latest()->get();

        $tags = Tag::latest()->get();

        return view('frontend.author-posts', compact('author', 'posts', 'categories', 'tags'));
    }
}
