<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\ProductReview;

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

        $cat_id = $product->category_id;
        $relatedProducts = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        //prouct review
        $reviewProducts = ProductReview::with('user')->where('product_id',$id)->where('status','approve')->latest()->get();
        $rating = ProductReview::where('product_id',$id)->where('status','approve')->avg('rating');
        $avgRating = number_format($rating,1);

        return view('website.product-details',compact('product','multiImgs','color','product_color','size','product_size','relatedProducts','reviewProducts','avgRating'));
    }

    //tag wise product
    public function tagWiseProduct($tag){
        $products = Product::where('product_status',1)->where('product_tags',$tag)->orderBy('id','DESC')->paginate(1);
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('website.tag-product',compact('products','categories'));
    }
    //subcategory wise product show
    public function subCatWiseProduct(Request $request,$subcat_id,$slug){
        $products = Product::where('product_status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(10);
        $categories = Category::orderBy('category_name','ASC')->get();

        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }

        if ($subcat_id == null) {
            return view('errors.404');
        }else {
            if ($sort == 'priceLowtoHigh') {
                $products = Product::where(['product_status' => 1,'subcategory_id' => $subcat_id])->orderBy('selling_price','ASC')->paginate(10);
            }elseif ($sort == 'priceHightoLow') {
                $products = Product::where(['product_status' => 1,'subcategory_id' => $subcat_id])->orderBy('selling_price','DESC')->paginate(10);
            }elseif ($sort == 'nameAtoZ') {
                $products = Product::where(['product_status' => 1,'subcategory_id' => $subcat_id])->orderBy('product_name','ASC')->paginate(10);
            }elseif ($sort == 'nameZtoA') {
                $products = Product::where(['product_status' => 1,'subcategory_id' => $subcat_id])->orderBy('product_name','DESC')->paginate(10);
            }else {
                $products = Product::where('product_status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(10);
            }
        }

        $subCatId = $subcat_id;
        $subCatSlug = $slug;
        $route = 'subcategory/product';

        //loadmore product with ajax
        if ($request->ajax()) {
            $grid_view = view('website.includes.grid_view_product',compact('products'))->render();
            $list_view = view('website.includes.list_view_product',compact('products'))->render();
            return response()->json(['grid_view' => $grid_view,'list_view'=>$list_view]);
        }

        return view('website.sub-category-product',compact('products','categories','route','subCatSlug','subCatId','sort'));
    }
    //subsubcatgory wise product show
    public function subSubCatWiseProduct($subsubcat_id,$slug){
        $products = Product::where('product_status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(1);
        $categories = Category::orderBy('category_name','ASC')->get();


        return view('website.sub-sub-category-product',compact('products','categories'));
    }

    // =========================== Product view with ajax================
    public function productViewAjax($product_id){
        $product = Product::with('category','brand')->findOrFail($product_id);

        $color = $product->product_color;
        $product_color = explode(',',$color);
        
        $size = $product->product_size;
        $produt_size = explode(',',$size);
        
        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $produt_size,
        ));
    }
    
}
