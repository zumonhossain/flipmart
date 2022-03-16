<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Session;

class TrackingController extends Controller{
    public function orderTrackNow(Request $request){
        $order = Order::with('division','district','state','user')->where('invoice_no',$request->invoice_no)->first();
        
        if($order){
            $orderItems = OrderItem::with('product')->where('order_id',$order->id)->orderBy('id','DESC')->get();
            return view('website.order-track',compact('order','orderItems'));
        }else{
            $notification=array(
                'messege'=>'Order Not Found!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
   }
}
