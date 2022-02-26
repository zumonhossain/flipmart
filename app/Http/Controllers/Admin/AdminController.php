<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller{
    public function index(){
        return view('admin.home');
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
