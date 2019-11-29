<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function view($slug){

        $post = '';

        return view('frontend.view-post', compact('post'));
    }
}
