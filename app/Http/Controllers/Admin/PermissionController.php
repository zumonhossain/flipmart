<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;

class PermissionController extends Controller{
    public function index(){
        $permissions = Permission::get();
        return view('admin.permission.index',compact('permissions'));
    }

    public function add(){
        $roles = Role::where('id','!=',2)->get();
        return view('admin.permission.add',compact('roles'));
    }

    public function edit($id){
        $permission = Permission::find($id);
        $roles = Role::where('id','!=',2)->get();
        return view('admin.permission.edit',compact('permission','roles'));
    }

    public function insert(Request $request){

        $request->validate([
            'role_id' => 'required|numeric|unique:permissions,role_id'
        ],[
            'role_id.required'=>'Please enter select permission role!',
        ]);

        Permission::create($request->all());

        $notification=array(
            'messege'=>'Permission Successfully Upload!',
            'alert-type'=>'success'
        );
        return Redirect()->route('permission')->with($notification);
    }

    public function update(Request $request){
        $id = $request['id'];
        
        $request->validate([
            'role_id' => 'required|exists:permissions,role_id'
        ],[
            'role_id.required'=>'Please enter select permission role!',
        ]);

        Permission::findOrFail($id)->update($request->all());
        $notification=array(
            'messege'=>'permission Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('permission')->with($notification);
    }

    public function delete($id){
        Permission::findOrFail($id)->delete();
        
        $notification=array(
            'messege'=>'Permission Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
