<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller{
    //search product
    public function searchProduct(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $products = Product::where("product_name","LIKE","%".$request->search."%")
            ->orWhere('product_tags',"LIKE","%".$request->search."%")
            ->orWhere('short_description',"LIKE","%".$request->search."%")
            ->get();
        return view('website.search-result',compact('products'));
    }

    //findProducts with ajax
    public function findProducts(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $products = Product::where("product_name","LIKE","%".$request->search."%")
            ->orWhere('product_tags',"LIKE","%".$request->search."%")
            ->orWhere('short_description',"LIKE","%".$request->search."%")
            ->take(5)
            ->get();
        return view('website.search-product',compact('products'));
    }
}
