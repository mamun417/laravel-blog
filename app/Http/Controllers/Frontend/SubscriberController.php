<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        $subscriber = New Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return redirect()->back()->with('successMsg', 'You successfully added to our subscriber list');
    }
}
