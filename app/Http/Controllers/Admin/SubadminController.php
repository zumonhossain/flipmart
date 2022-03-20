<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class SubadminController extends Controller{
    public function index(){
        $users = User::with('role')->where('role_id','!=',2)->get();
        return view('admin.subadmin.index',compact('users'));
    }

    public function add(){
        $roles = Role::where('id','!=',2)->get();
        return view('admin.subadmin.add',compact('roles'));
    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::where('id','!=',2)->get();
        return view('admin.subadmin.edit',compact('user','roles'));
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'role_id' => 'required|numeric',
        ],[
            'name.required' => 'Please enter name!',
            'email.required' => 'Please enter email!',
            'password.required' => 'Please enter password!',
            'role_id.required' => 'Please enter role!',
        ]);

        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        $notification=array(
            'messege'=>'User Created Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('subadmin')->with($notification);
    }

    public function update(Request $request){
        $id = $request['id'];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:4|confirmed',
            'role_id' => 'required|numeric',
        ],[
            'name.required' => 'Please enter name!',
            'email.required' => 'Please enter email!',
            'password.required' => 'Please enter password!',
            'role_id.required' => 'Please enter role!',
        ]);

        if ($request->password === null) {
            $request['password'] = auth()->user()->password;
        }else {
            $request['password'] = Hash::make($request->password);
        }
        
        User::findOrFail($id)->update($request->all());

        $notification=array(
            'messege'=>'user Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('subadmin')->with($notification);
    }

    public function delete($id){
        User::findOrFail($id)->delete();
        
        $notification=array(
            'messege'=>'Role Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
