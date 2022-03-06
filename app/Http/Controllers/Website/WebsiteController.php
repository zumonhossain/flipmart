<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WebsiteController extends Controller{
    public function index(){
        $products = Product::where('product_status',1)->orderBy('id','DESC')->get();
        return view('website.home.home',compact('products'));
    }
}
