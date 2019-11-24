<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;

class ManageSubscriberController extends Controller
{
    public function index(){

        $subscribers = Subscriber::latest()->get();

        return view('backend.admin.subscriber.index', compact('subscribers'));
    }
}
