<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Auth;

class StockController extends Controller{
    //index
    public function index(){
        $products = Product::latest()->get();
        return view('admin.stock.index',compact('products'));
    }

    //stock edit
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.stock.edit',compact('product'));
    }

    //update
    public function update(Request $request){
        $id = $request['id'];

        $request->validate([
            'product_name'=>'required',
            'product_code'=>'required',
            'product_qty'=>'required',
        ],[
            'product_name.required'=>'Please enter product name!',
            'product_code.required'=>'Please enter product code!',
            'product_qty.required'=>'Please enter product quantity!',
        ]); 

        $creator = Auth::user()->id;

        Product::where('product_status',1)->where('id',$id)->update([
            'product_name'=>$request['product_name'],
            'product_code'=>$request['product_code'],
            'product_qty'=>$request['product_qty'],
            'product_creator'=>$creator,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'messege'=>'Product Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('product.stock')->with($notification);
    }
}
