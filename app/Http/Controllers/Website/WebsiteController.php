<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;

class WebsiteController extends Controller{
    public function index(){
        $special_offers = Product::where('special_offer',1)->where('product_status',1)->orderBy('id','DESC')->limit(5)->get();
        $featureds = Product::where('featured',1)->where('product_status',1)->orderBy('id','DESC')->get();
        $products = Product::where('product_status',1)->orderBy('id','DESC')->get();
        return view('website.home.home',compact('products','featureds','special_offers'));
    }

    public function productDetails($id,$slug){
        $product = Product::findOrFail($id);
        $multiImgs = MultiImg::where('product_id',$id)->get();

        $color = $product->product_color;
        $product_color = explode(',',$color);

        $size = $product->product_size;
        $product_size = explode(',',$size);

        return view('website.product-details',compact('product','multiImgs','color','product_color','size','product_size'));
    }
    
}
