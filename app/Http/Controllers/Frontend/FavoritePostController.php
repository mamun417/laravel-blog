<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use Illuminate\Http\Request;
use Session;

class FavoritePostController extends Controller
{
    public function store($post){

        $user = Auth::user();

        $isFavorite = $user->favoritePosts()->where('post_id', $post)->count();

        if ($isFavorite == 0){

            $user->favoritePosts()->attach($post);

            Session::flash('successMsg', 'Post added to your favorite list');

        }else{
            Session::flash('errorMsg', 'This post already added in your favorite list');
        }

        return back();
    }
}
