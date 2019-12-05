<?php

namespace App\Http\Controllers\Backend\Author;

use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();

        $posts = $user->posts;

        $all_views = $posts->sum('view_count');

        $total_favorite_posts = $user->favoritePosts()->count();

        $total_pending_posts = $posts->where('is_approve', 0)->count();

        $popular_posts = $user->posts()
            ->withCount('comments')
            ->withCount('favoriteUsers')
            ->orderBy('view_count', 'desc')
            ->orderBy('comments_count', 'desc')
            ->orderBy('favorite_users_count', 'desc')
            ->take(5)->get();

        return view('backend.author.dashboard', compact('posts','total_favorite_posts', 'popular_posts', 'total_pending_posts', 'all_views'));
    }
}
