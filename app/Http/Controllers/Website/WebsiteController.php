<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class WebsiteController extends Controller{
    public function index(){
        return view('website.home.home');
    }
}
