<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Carbon\Carbon;
use Auth;

class SubCategoryController extends Controller{
    public function index(){
        $subCategories = SubCategory::where('subcategory_status',1)->orderBy('id','DESC')->get();
        $categories = Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        return view('admin.sub-category.index',compact('subCategories','categories'));
    }

    public function view($slug){
        $data = SubCategory::where('subcategory_status',1)->where('subcategory_slug',$slug)->firstOrFail();
        return view('admin.sub-category.view',compact('data'));
    }

    public function edit($slug){
        $category = Category::where('category_status',1)->orderBy('id','ASC')->get();
        $subcategory = SubCategory::where('subcategory_status',1)->where('subcategory_slug',$slug)->firstOrFail();
        return view('admin.sub-category.edit',compact('subcategory','category'));
    }

    public function insert(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ],[
            'category_id.required'=>'Please enter category name!',
            'subcategory_name.required'=>'Please enter subcategory name!',
        ]);

        $slug = Str::slug($request['subcategory_name'], '-');
        $creator = Auth::user()->id;

        SubCategory::insertGetId([
            'category_id'=>$request['category_id'],
            'subcategory_name'=>$request['subcategory_name'],
            'subcategory_slug'=>$slug,
            'subcategory_creator'=>$creator,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'messege' =>'SubCategory Upload Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('sub-category')->with($notification);
    }

    public function update(Request $request){
        $id = $request->id;
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ],[
            'category_id.required'=>'Please enter category name!',
            'subcategory_name.required'=>'Please enter sub category name!',
        ]);

        $slug = Str::slug($request['subcategory_name'], '-');
        $creator = Auth::user()->id;

        SubCategory::where('subcategory_status',1)->where('id',$id)->update([
            'category_id'=>$request['category_id'],
            'subcategory_name'=>$request['subcategory_name'],
            'subcategory_slug'=>$slug,
            'subcategory_creator'=>$creator,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Sub-Catetory Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('sub-category')->with($notification);
    }

    public function softdelete(Request $request){
        $id=$request['modal_id'];
        SubCategory::where('subcategory_status',1)->where('id',$id)->update([
            'subcategory_status'=>0,
        ]);

        $notification = array(
            'messege' =>'SubCategory Softdelete Success!',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
    }
}
