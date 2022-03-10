<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller{
    //create
    public function wishlist(){
        return view('user.wishlist-page');
    }

    //all product
    public function readAllProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }
    
    //wishlist destroy
    public function destory($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Sucessfully Product Remove']);
    }
}
