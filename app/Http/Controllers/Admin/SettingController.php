<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('backend.admin.setting.setting');
    }

    public function profileUpdate(Request $request){

        dd($request->all());
    }
}
