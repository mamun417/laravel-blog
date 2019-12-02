<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ManageAuthorController extends Controller
{
    public function index(){

        $authors = User::all();

        return view('backend.admin.author.index', compact('authors'));
    }

    public function destroy(User $user){

        dd($user->toArray());
    }
}
