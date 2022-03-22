<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use Carbon\Carbon;
use Auth;

class ProductReviewController extends Controller{
    //create
    public function create($product_id){
        $id = $product_id;
        return view('user.order.review',compact('id'));
    }
    //store review
    public function store(Request $request){
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ],[
            'rating.required' => 'Please reating select!',
            'comment.required' => 'Please comments!'
        ]);


        ProductReview::insert([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Review Done',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
