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

        $popular_posts = $user->posts()
            ->withCount('comments')
            ->withCount('favoriteUsers')
            ->orderBy('view_count', 'desc')
            ->orderBy('comments_count')
            ->orderBy('favorite_users_count')
            ->take(5)
            ->get();

        $total_pending_posts = $posts->where('is_approve', 0)->count();

        $all_views = $posts->sum('view_count');

        return view('backend.author.dashboard', compact('posts', 'popular_posts', 'total_pending_posts', 'all_views'));
    }
}
