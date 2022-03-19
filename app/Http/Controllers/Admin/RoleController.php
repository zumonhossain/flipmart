<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Carbon\Carbon;

class RoleController extends Controller{
    public function index(){
        $roles = Role::where('id','!=',2)->get();
        return view('admin.role.index',compact('roles'));
    }

    public function add(){
        return view('admin.role.add');
    }

    public function edit($id){
        $role = Role::find($id);
        return view('admin.role.edit',compact('role'));
    }

    public function insert(Request $request){
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Please enter role name!',
        ]);

        Role::insertGetId([
            'name'=>$request['name'],
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Role Successfully Upload!',
            'alert-type'=>'success'
        );
        return Redirect()->route('role')->with($notification);
    }

    public function update(Request $request){
        $id = $request['id'];

        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'Please enter role name!',
        ]); 

        Role::where('id',$id)->update([
            'name'=>$request['name'],
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Role Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('role')->with($notification);
    }

    public function delete($id){
        Role::findOrFail($id)->delete();
        
        $notification=array(
            'message'=>'Role Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
