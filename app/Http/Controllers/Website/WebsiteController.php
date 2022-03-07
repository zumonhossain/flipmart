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
        $products = Product::where('product_status',1)->orderBy('id','DESC')->get();
        $featureds = Product::where('featured',1)->where('product_status',1)->orderBy('id','DESC')->get();
        $special_offers = Product::where('special_offer',1)->where('product_status',1)->orderBy('id','DESC')->limit(5)->get();
        $special_deals = Product::where('special_deals',1)->where('product_status',1)->orderBy('id','DESC')->limit(5)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_category_1 = Category::skip(1)->first();
        $skip_category_2 = Category::skip(2)->first();
        $skip_brand_0 = Brand::skip(2)->first();
        $skip_product_0 = Product::where('product_status',1)->where('category_id',$skip_category_0->id)->orderBY('id','DESC')->get();
        $skip_product_1 = Product::where('product_status',1)->where('category_id',$skip_category_1->id)->orderBY('id','DESC')->get();
        $skip_product_2 = Product::where('product_status',1)->where('category_id',$skip_category_2->id)->orderBY('id','DESC')->get();
        $skip_product_brand_0 = Product::where('product_status',1)->where('brand_Id',$skip_brand_0->id)->orderBY('id','DESC')->get();

        return view('website.home.home',compact('products','featureds','special_offers','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_category_2','skip_product_2','skip_product_0','skip_product_brand_0','skip_brand_0'));
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
