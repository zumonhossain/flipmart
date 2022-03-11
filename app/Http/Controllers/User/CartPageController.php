<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartPageController extends Controller{
    //create
    public function create(){
        return view('user.cart-page');
    }
}
