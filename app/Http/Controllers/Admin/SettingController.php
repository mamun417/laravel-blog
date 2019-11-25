<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use Str;

class SettingController extends Controller
{
    public function index(){
        return view('backend.admin.setting.setting');
    }

    public function profileUpdate(Request $request){

        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|unique:users,email,'.Auth::id(),
            'img' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ]);

        $user = User::findOrFail(Auth::id());

        $slug = Str::slug($request->name);

        if ($request->hasFile('img')) {

            $image = $request->file('img');

            $currentDate = Carbon::now()->toDateString();

            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // check is exits directory
            if (!Storage::disk('public')->exists('profile')){

                Storage::disk('public')->makeDirectory('profile');
            }

            // resize image for category and upload
            $image = Image::make($image)->resize(500, 500)->stream();
            Storage::disk('public')->put('profile/'.$image_name, $image);

            // delete old image
            if (Storage::disk('public')->exists('profile/'.$user->image)){

                Storage::disk('public')->delete('profile/'.$user->image);
            }

            $user->image = $image_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->about = $request->about;

        $user->save();

        return back()->with('successMsg', 'Profile updated successfully');
    }
}
