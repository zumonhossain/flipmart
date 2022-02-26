<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Auth;

class CouponController extends Controller{
    public function index(){
        $coupons = Coupon::where('coupon_status',1)->orderBy('id','DESC')->get();
        return view('admin.coupon.index',compact('coupons'));
    }

    public function view($slug){
        $data = Coupon::where('coupon_status',1)->where('coupon_slug',$slug)->firstOrFail();
        return view('admin.coupon.view',compact('data'));
    }

    public function edit($slug){
        $data = Coupon::where('coupon_status',1)->where('coupon_slug',$slug)->firstOrFail();
        return view('admin.coupon.edit',compact('data'));
    }

    public function insert(Request $request){
        $request->validate([
            'coupon_name'=>'required',
            'coupon_discount'=>'required',
            'coupon_validity'=>'required',
        ],[
            'coupon_name.required'=>'Please Enter Coupon Name!',
            'coupon_discount.required'=>'Please Enter Discount!',
            'coupon_validity.required'=>'Please Enter Coupon Time Limite!',
        ]);

        $slug = uniqid('coupon-15');
        $creator = Auth::user()->id;

        Coupon::insertGetId([
            'coupon_name'=>$request['coupon_name'],
            'coupon_discount'=>$request['coupon_discount'],
            'coupon_validity'=>$request['coupon_validity'],
            'coupon_slug'=>$slug,
            'coupon_creator'=>$creator,
            'created_at'=> Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Category Upload Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request){
        $id = $request['id'];

        $request->validate([
            'coupon_name'=>'required',
            'coupon_discount'=>'required',
            'coupon_validity'=>'required',
        ],[
            'coupon_name'=>'Please Enter Coupon Name!',
            'coupon_discount'=>'Please Enter Discount!',
            'coupon_validity'=>'Please Enter Coupon Time Limite!',
        ]);

        $slug = uniqid('coupon-15');
        $creator = Auth::user()->id;
        
        Coupon::where('coupon_status',1)->where('id',$id)->update([
            'coupon_name'=>$request['coupon_name'],
            'coupon_discount'=>$request['coupon_discount'],
            'coupon_validity'=>$request['coupon_validity'],
            'coupon_slug'=>$slug,
            'coupon_creator'=>$creator,
            'updated_at'=> Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Coupon update Success!',
            'alert-type'=>'success'
        );
        return Redirect()->route('coupon')->with($notification);
    }

    public function softdelete(Request $request){
        $id = $request['modal_id'];

        Coupon::where('coupon_status',1)->where('id',$id)->update([
            'coupon_status'=>0
        ]);

        $notification=array(
            'messege'=>'Coupon softdelete Success!',
            'alert-type'=>'success'
        );
        return Redirect()->route('coupon')->with($notification);
    }
}
