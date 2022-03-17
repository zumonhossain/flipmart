<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;

class CustomerReviewController extends Controller{
    public function create(){
        $reviews = ProductReview::with('user','product')->latest()->get();
        return view('admin.review.create',compact('reviews'));
    }

    //destroy
    public function destroy($review_id){
        ProductReview::findOrFail($review_id)->delete();

        $notification=array(
            'messege'=>'Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //approve now
    public function approveNow($review_id){
        ProductReview::findOrFail($review_id)->update([
            'status' => 'approve'
        ]);

        $notification=array(
            'messege'=>'Approve Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
