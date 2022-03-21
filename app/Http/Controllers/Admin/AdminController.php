<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Image;
use Auth;

class AdminController extends Controller{
    public function index(){
        return view('admin.home');
    }


    // =============================== profile =============================
    public function profile(){
        return view('admin.profile.index');
    }

    public function profileUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ],[
            'name.required' => 'input your name',
        ]);

        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Your Profile Updated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // image page
    public function ProfileImagePage(){
        return view('admin.profile.image-page');
    }

    //update image
    public function imageUpdate(Request $request){
        $old_image = $request->old_image;
        if (User::findOrFail(Auth::id())->image == 'uploads/admin/user/avatar.png') {
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/admin/user/'.$name_gen);
            $save_url = 'uploads/admin/user/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification=array(
                'messege'=>'Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/admin/user/'.$name_gen);
            $save_url = 'uploads/admin/user/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);

            $notification=array(
                'messege'=>'Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // password page
    public function ProfilePasswordPage(){
        return view('admin.profile.password-page');
    }

    //update password
    public function ProfilePasswordUpdate(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ],[
            'old_password.required' => 'Please enter old password!',
            'new_password.required' => 'Please enter new password!',
            'password_confirmation.required' => 'Please enter confirmation password!',
        ]);

        $db_pass = Auth::user()->password;
        $current_password = $request->old_password;
        $newpass = $request->new_password;
        $confirmpass = $request->password_confirmation;

        if (Hash::check($current_password,$db_pass)) {
            if ($newpass === $confirmpass) {
                User::findOrFail(Auth::id())->update([
                'password' => Hash::make($newpass)
                ]);

                Auth::logout();
                $notification=array(
                'messege'=>'Your Password Change Success. Now Login With New Password',
                'alert-type'=>'success'
            );
            return Redirect()->route('login')->with($notification);

            }else {

            $notification=array(
                'messege'=>'New Password And Confirm Password Not Same',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
            }
        }else {
        $notification=array(
            'messege'=>'Old Password Not Match',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
        }
    }


    public function allUsers(){
        $users = User::where('role_id', '!=', 1)->orderBy('id','desc')->get();
        return view('admin.users.index',compact('users'));
    }

    //banned user
    public function banned($user_id){
        User::findOrFail($user_id)->update(['user_banned' => 1]);
        $notification=array(
            'message'=>'User Banned',
            'alert-type'=>'error'
        );

        return Redirect()->back()->with($notification);
    }

    //unbanned user
    public function unBanned($user_id){
        User::findOrFail($user_id)->update(['user_banned' => 0]);
        $notification=array(
        'message'=>'User UnBanned Success',
        'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }
}
