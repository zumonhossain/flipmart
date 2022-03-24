<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ShopController extends Controller{
    //shopPage
    public function shopPage(){
        $products = Product::query();
        //category filter
        if (!empty($_GET['category'])) {
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$catIds);
        }
        //Brand filter
        if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brandIds);
        }

        //sortByProduct
        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'priceLowtoHigh') {
                $products = $products->where(['product_status' => 1])->orderBy('selling_price','ASC')->paginate(12);
            }elseif ($_GET['sortBy'] == 'priceHightoLow') {
                $products = $products->where(['product_status' => 1])->orderBy('selling_price','DESC')->paginate(12);
            }elseif ($_GET['sortBy'] == 'nameAtoZ') {
                $products = $products->where(['product_status' => 1])->orderBy('product_name','ASC')->paginate(12);
            }elseif ($_GET['sortBy'] == 'nameZtoA') {
                $products = $products->where(['product_status' => 1])->orderBy('product_name','DESC')->paginate(12);
            }else {
                $products = $products->where('product_status',1)->orderBy('id','DESC')->paginate(12);
            }
        }

        else{
            $products = $products->where('product_status',1)->orderBy('id','DESC')->paginate(3);
        }
        
        $categories = Category::orderBy('category_name','ASC')->get();
        $brands = Brand::orderBy('brand_name','ASC')->get();
        return view('website.shop',compact('products','categories','brands'));
    }

    //shopFilter
    public function shopFilter(Request $request){
        $data = $request->all();

        //filter category
        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category='.$category;
                }else {
                    $catUrl .= ','.$category;
                }
            }
        }

        //filter brand
        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .= '&brand='.$brand;
                }else {
                    $brandUrl .= ','.$brand;
                }
            }
        }

        //filter sortBy
        $sortByUrl = "";
        if (!empty($data['sortBy'])) {
            $sortByUrl .= '&sortBy='.$data['sortBy'];
        }

        return redirect()->route('shop',$catUrl.$brandUrl.$sortByUrl);
    }
}
