<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;
use Image;
use Auth;

class BannerController extends Controller{
    public function index(){
        $banner = Banner::where('ban_status',1)->orderBy('id','ASC')->get();
        return view('admin.banner.index',compact('banner'));
    }

    public function view($slug){
        $data = Banner::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.banner.view',compact('data'));
    }
    public function edit($slug){
        $data = Banner::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.banner.edit',compact('data'));
    }

    public function insert(Request $request){
        $request->validate([
            'ban_title'=>'required',
            'ban_subtitle'=>'required',
            'ban_description'=>'required',
            'ban_button'=>'required',
            'ban_url'=>'required',
            'ban_image'=>'required',
        ],[
            'ban_title.required'=>'please enter title!',
            'ban_subtitle.required'=>'please enter Subtitle!',
            'ban_description.required'=>'please enter Description!',
            'ban_button.required'=>'please enter Button!',
            'ban_url.required'=>'please enter Url!',
            'ban_image.required'=>'please enter image!',
        ]);

        $slug = uniqid('banner-15');
        $creator = Auth::user()->id;

        $image = $request->file('ban_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('uploads/admin/banner/'.$name_gen);
        $save_url = 'uploads/admin/banner/'.$name_gen;

        Banner::insertGetId([
            'ban_title'=>$request['ban_title'],
            'ban_subtitle'=>$request['ban_subtitle'],
            'ban_description'=>$request['ban_description'],
            'ban_button'=>$request['ban_button'],
            'ban_url'=>$request['ban_url'],
            'ban_image'=>$save_url,
            'ban_slug'=>$slug,
            'ban_creator'=>$creator,
            'created_at'=>carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Banner Upload Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request){
        $id = $request['id'];
        $oldImage = $request['old_image'];

        $request->validate([
            'ban_title'=>'required',
            'ban_subtitle'=>'required',
            'ban_description'=>'required',
            'ban_button'=>'required',
            'ban_url'=>'required',
            'ban_image'=>'required',
        ],[
            'ban_title.required'=>'please enter title!',
            'ban_subtitle.required'=>'please enter Subtitle!',
            'ban_description.required'=>'please enter Description!',
            'ban_button.required'=>'please enter Button!',
            'ban_url.required'=>'please enter Url!',
            'ban_image.required'=>'please enter image!',
        ]);

        $slug = uniqid('banner-15');
        $creator = Auth::user()->id;

        unlink($oldImage);
        $image = $request->file('ban_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('uploads/admin/banner/'.$name_gen);
        $save_url = 'uploads/admin/banner/'.$name_gen;

        Banner::where('ban_status',1)->where('id',$id)->update([
            'ban_title'=>$request['ban_title'],
            'ban_subtitle'=>$request['ban_subtitle'],
            'ban_description'=>$request['ban_description'],
            'ban_button'=>$request['ban_button'],
            'ban_url'=>$request['ban_url'],
            'ban_image'=>$save_url,
            'ban_slug'=>$slug,
            'ban_creator'=>$creator,
            'updated_at'=>carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Banner Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('banner')->with($notification);
    }

    public function softdelete(Request $request){
        $id = $request['modal_id'];

        Banner::where('ban_status',1)->where('id',$id)->update([
            'ban_status'=>0
        ]);

        $notification=array(
            'messege'=>'Banner Softdelete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
