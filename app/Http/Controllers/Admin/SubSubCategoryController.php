<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Auth;

class SubSubCategoryController extends Controller{
    public function index(){
        $categories=Category::where('category_status',1)->orderBy('id','ASC')->get();
        $subSubCategory=SubSubCategory::where('subsubcategory_status',1)->orderBy('id','ASC')->get();
        return view('admin.sub-sub-category.index',compact('categories','subSubCategory'));
    }

    public function getSubCat($cat_id){
        $subcat = Subcategory::where('category_id',$cat_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }

    public function view($slug){
        $data = SubSubCategory::where('subsubcategory_status',1)->where('subsubcategory_slug',$slug)->firstOrFail();
        return view('admin.sub-sub-category.view',compact('data'));
    }

    public function edit($slug){
        $category=Category::where('category_status',1)->orderBy('id','DESC')->get();
        $subcategory=Subcategory::where('subcategory_status',1)->orderBy('id','DESC')->get();
        $subsubcategory = SubSubCategory::where('subsubcategory_status',1)->where('subsubcategory_slug',$slug)->firstOrFail();
        return view('admin.sub-sub-category.edit',compact('subsubcategory','category','subcategory'));
    }

    public function insert(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name'=>'required',
        ],[
            'category_id.required'=>'Please enter category name!',
            'subcategory_id.required'=>'Please enter subcategory name!',
            'subsubcategory_name.required'=>'Please enter sub subcategory name!',
        ]);

        $slug = Str::slug($request['subsubcategory_name'], '-');
        $creator = Auth::user()->id;
		
        SubSubCategory::insertGetId([
            'category_id'=>$request['category_id'],
            'subcategory_id'=>$request['subcategory_id'],
            'subsubcategory_name'=>$request['subsubcategory_name'],
            'subsubcategory_slug'=>$slug,
            'subsubcategory_creator'=>$creator,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'messege' =>'Sub-SubCategory Upload Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('sub-sub-category')->with($notification);
    }

    public function update(Request $request){
        $id=$request['id'];
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name'=>'required',
        ],[
            'category_id.required'=>'Please enter category name!',
            'subcategory_id.required'=>'Please enter subcategory name!',
            'subsubcategory_name.required'=>'Please enter sub subcategory name!',
        ]);

        $slug = Str::slug($request['subsubcategory_name'], '-');
        $creator = Auth::user()->id;
        SubSubCategory::where('id',$id)->update([
            'category_id'=>$request['category_id'],
            'subcategory_id'=>$request['subcategory_id'],
            'subsubcategory_name'=>$request['subsubcategory_name'],
            'subsubcategory_slug'=>$slug,
            'subsubcategory_creator'=>$creator,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'messege' =>'Sub-SubCategory Update Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('sub-sub-category')->with($notification);
    }

    public function softdelete(Request $request){
        $id=$request['modal_id'];
        SubSubCategory::where('subsubcategory_status',1)->where('id',$id)->update([
            'subsubcategory_status'=>0,
        ]);

        $notification = array(
            'messege' =>'Sub-SubCategory Softdelete Success!',
            'alert-type' =>'success',
        );
        return redirect()->route('sub-sub-category')->with($notification);
    }
}
