<?php

namespace App\Http\Controllers\Backend\Author;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;
use Storage;
use Str;

class SettingController extends Controller
{
    public function index(){
        return view('backend.author.setting.setting');
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

    public function changePassword(Request $request){

        //dd($request->all());

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $hashPassword = Auth::user()->password;

        $check_password = Hash::check($request->old_password, $hashPassword);

        if ($check_password){

            $new_password = Hash::make($request->password);

            User::where('id', Auth::id())->update(['password' => $new_password]);

            Session::flash('successMsg', 'Password changed successfully');

            //Auth::logout();

        }else{
            Session::flash('errorMsg', 'Old password does not match with your current password');
        }

        return back();
    }

    public function hideSidebar(){

        if (Session::has('hideSidebar')){

            Session::forget('hideSidebar');

        }else{
            Session::put('hideSidebar', true);
        }
    }
}
