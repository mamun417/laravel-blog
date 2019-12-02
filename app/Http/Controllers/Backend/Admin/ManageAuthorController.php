<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ManageAuthorController extends Controller
{
    public function index(){

        $authors = User::author()
            ->withCount('posts')
            ->withCount('favoritePosts')
            ->withCount('comments')
            ->get();

        return view('backend.admin.author.index', compact('authors'));
    }

    public function destroy($id){

        $author = User::findOrFail($id);

        $author->delete();

        return back()->with('successMsg', 'Author remove successfully');
    }
}
