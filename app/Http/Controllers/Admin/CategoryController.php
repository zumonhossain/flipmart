<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Auth;


class CategoryController extends Controller{
    public function index(){
        $categories = Category::where('category_status',1)->orderBy('id','DESC')->get();
        return view('admin.category.index',compact('categories'));
    }
    public function edit($slug){
        $data = Category::where('category_status',1)->where('category_slug', $slug)->firstOrFail();
        return view('admin.category.edit',compact('data'));
    }

    public function view($slug){
        $data = Category::where('category_status',1)->where('category_slug', $slug)->firstOrFail();
        return view('admin.category.view',compact('data'));
    }

    public function insert(Request $request){
        $request->validate([
            'category_name'=>'required',
            'category_icon'=>'required',
        ],[
            'category_name.required'=>'Please enter category name!',
            'category_icon.required'=>'Please enter category icon!',
        ]);

        $creator = Auth::user()->id;
        $slug = uniqid('category-15');

        Category::insertGetId([
            'category_name'=>$request['category_name'],
            'category_icon'=>$request['category_icon'],
            'category_slug'=>$slug,
            'category_creator'=>$creator,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'messege'=>'Category Upload Success!',
            'alert-type'=>'success',
        );
        
        return redirect()->back()->with($notification);
    }

    public function update(Request $request){

        $id= $request->id;

        $request->validate([
            'category_name'=>'required',
            'category_icon'=>'required',
        ],[
            'category_name.required'=>'Please enter category name!',
            'category_icon.required'=>'Please enter category icon!',
        ]);

        $creator = Auth::user()->id;
        $slug = uniqid('category-15');

        Category::where('category_status',1)->where('id',$id)->update([
            'category_name'=>$request['category_name'],
            'category_icon'=>$request['category_icon'],
            'category_slug'=>$slug,
            'category_creator'=>$creator,
            'updated_at'=>Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Category Update Success!',
            'alert-type'=>'success',
        );
        return Redirect()->route('category')->with($notification);
    }

    public function softdelete(Request $request){
        $id = $request['modal_id'];
        Category::where('category_status',1)->where('id',$id)->update([
            'category_status'=>0,
        ]);

        $notification=array(
            'messege'=>'Category Softdelete Success!',
            'alert-type'=>'succes'
        );
        return Redirect()->back()->with($notification);
    }
}
