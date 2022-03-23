<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller{
    //shopPage
    public function shopPage(){
        $products = Product::where('product_status',1)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('website.shop',compact('products','categories'));
    }
}
