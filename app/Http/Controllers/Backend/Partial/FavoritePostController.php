<?php

namespace App\Http\Controllers\Backend\Partial;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class FavoritePostController extends Controller
{
    public function index(){

        $posts = Auth::user()->favoritePosts()->withCount('favoriteUsers')->latest()->get();

        return view('backend.partial.favorite-post.index', compact('posts'));
    }
}
