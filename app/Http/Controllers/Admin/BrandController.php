<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
use Image;
use Auth;

class BrandController extends Controller{
    public function index(){
        $brands = Brand::where('brand_status',1)->orderBy('id','DESC')->get();
        return view('admin.brand.index',compact('brands'));
    }

    public function edit($slug){
        $data = Brand::where('brand_status',1)->where('brand_slug',$slug)->firstOrFail();
        return view('admin.brand.edit',compact('data'));
    }

    public function view($slug){
        $data = Brand::where('brand_status',1)->where('brand_slug',$slug)->firstOrFail();
        return view('admin.brand.view',compact('data'));
    }

    public function insert(Request $request){
        $request->validate([
            'brand_name'=>'required',
            'brand_image'=>'required',
        ],[
            'brand_name.required'=>'Please enter brand name!',
            'brand_image.required'=>'Please enter brand image!',
        ]);

        $slug = Str::slug($request['brand_name'], '-');

        $image = $request->file('brand_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('uploads/admin/brand/'.$name_gen);
        $save_url = 'uploads/admin/brand/'.$name_gen;

        Brand::insertGetId([
            'brand_name'=>$request['brand_name'],
            'brand_image'=>$save_url,
            'brand_slug'=>$slug,
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Brand Successfully Upload!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function update(Request $request){
        $id = $request->id;
        $old_img = $request->old_image;

        $request->validate([
            'brand_name'=>'required',
            'brand_image'=>'required',
        ],[
            'brand_name.required'=>'Please enter brand name!',
            'brand_image.required'=>'Please enter brand image!',
        ]);

        $slug = Str::slug($request['brand_name'], '-');

        if ($request->file('brand_image')){
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/admin/brand/'.$name_gen);
            $save_url = 'uploads/admin/brand/'.$name_gen;
    
            Brand::where('brand_status',1)->where('id',$id)->update([
                'brand_name'=>$request['brand_name'],
                'brand_image'=>$save_url,
                'brand_slug'=>$slug,
                'updated_at' => Carbon::now(),
            ]);
    
            $notification=array(
                'messege'=>'Brand Update Success!',
                'alert-type'=>'success'
            );
            return Redirect()->route('brand')->with($notification);
        }else{
            Brand::where('brand_status',1)->where('id',$id)->update([
                'brand_name'=>$request['brand_name'],
                'brand_image'=>$save_url,
                'brand_slug'=>$slug,
                'updated_at' => Carbon::now(),
            ]);
            
            $notification=array(
                'messege'=>'Brand Update Success!',
                'alert-type'=>'success'
            );
            return Redirect()->route('brand')->with($notification);
        }
    }
    
    public function softdelete(Request $request){
        $id=$request['modal_id'];
        Brand::where('brand_status',1)->where('id',$id)->update([
            'brand_status'=>0,
        ]);

        $notification=array(
            'messege'=>'Brand Softdelete Success!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
