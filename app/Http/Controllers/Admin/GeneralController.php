<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\Basic;
use Carbon\Carbon;
use Session;
use Image;

class GeneralController extends Controller{
    public function basic(){
        $data = Basic::where('basic_status',1)->where('id',1)->firstOrFail();
        return view('admin.general.basic',compact('data'));
    }

    public function update_basic(Request $request){
        $this->validate($request,[
            'title'=>'required',
        ],[
            'title.required'=>'please enter basic title!',
        ]);

        Basic::where('basic_status',1)->where('id',1)->update([
            'basic_title'=>$request['title'],
            'basic_subtitle'=>$request['subtitle'],
            'basic_details'=>$request['details'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $pic='pic_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/basic/'.$pic);

            Basic::where('id',1)->update([
                'basic_pic'=>$pic,
            ]);
        }

        if($request->hasFile('logo')){
            $image=$request->file('logo');
            $logo='logo_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/basic/'.$logo);

            Basic::where('id',1)->update([
                'basic_logo'=>$logo,
            ]);
        }

        if($request->hasFile('favicon')){
            $image=$request->file('favicon');
            $favicon='favicon_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('uploads/basic/'.$favicon);

            Basic::where('id',1)->update([
                'basic_favicon'=>$favicon,
            ]);
        }

        $notification=array(
            'messege'=>'Basic Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('basic')->with($notification);
    }

    //========================== Social Media Information ==========================

    public function social(){
        $data=SocialMedia::where('sm_status',1)->where('id',1)->firstOrFail();
        return view('admin.general.social',compact('data'));
    }

    public function update_social(Request $request){
        $this->validate($request,[
            'facebook'=>'required',
            'twitter'=>'required',
        ],[
            'facebook.required'=>'please enter facebook link!',
            'twitter.required'=>'please enter twitter!',
        ]);

        SocialMedia::where('sm_status',1)->where('id',1)->update([
            'sm_facebook'=>$request['facebook'],
            'sm_twitter'=>$request['twitter'],
            'sm_linkedin'=>$request['linkedin'],
            'sm_instagram'=>$request['instagram'],
            'sm_pinterest'=>$request['pinterest'],
            'sm_skype'=>$request['skype'],
            'sm_youtube'=>$request['youtube'],
            'sm_google'=>$request['google'],
            'sm_vimeo'=>$request['vimeo'],
            'sm_whatsapp'=>$request['whatsapp'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        $notification=array(
            'messege'=>'Social Media Update Success!',
            'alert-type'=>'success',
        );
        return redirect()->route('social.media')->with($notification);
    }
}
