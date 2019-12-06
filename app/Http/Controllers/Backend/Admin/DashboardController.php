<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\User;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){

        $posts = Post::all();

        $total_views = $posts->sum('view_count');

        $total_favorite_posts = Auth::user()->favoritePosts()->count();

        $total_pending_posts = $posts->where('is_approved', false)->count();

        $total_authors = User::where('role_id', 2)->count();

        $today_authors = User::whereDate('created_at', Carbon::now())->count();

        $total_categories = Category::all()->count();

        $total_tags = Tag::all()->count();

        $popular_posts = Post::withCount('comments')
            ->withCount('favoriteUsers')
            ->orderBy('view_count', 'desc')
            ->orderBy('comments_count', 'desc')
            ->orderBy('favorite_users_count', 'desc')
            ->take(6)->get();

        return view('backend.admin.dashboard', compact('posts', 'total_views',
            'total_favorite_posts', 'total_pending_posts', 'total_authors', 'today_authors', 'total_categories',
            'total_tags', 'popular_posts'));
    }
}
