<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('backend.admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::latest()->get();

        $tags = Tag::latest()->get();

        return view('backend.admin.post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
