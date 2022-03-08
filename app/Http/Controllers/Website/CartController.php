<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;

class CartController extends Controller{
    //store cart
    public function addToCart(Request $request,$id){

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1, 
                'options' => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'image' => $product->product_thambnail,
                ],
            ]);

            return response()->json('success');
            
        }else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1, 
                'options' => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'image' => $product->product_thambnail,
                ],
            ]);

            return response()->json('success');
        }
    }
}
