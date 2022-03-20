<?php

namespace App\Traits;

Trait AdminPermission{

    public function checkRequestPermission(){
        if (
            empty(auth()->user()->role->permission['permission']['banner']['list'])  && \Route::is('banner') ||
            empty(auth()->user()->role->permission['permission']['brand']['list'])  && \Route::is('brand') ||
            empty(auth()->user()->role->permission['permission']['cat']['list'])  && \Route::is('category') ||
            empty(auth()->user()->role->permission['permission']['subcat']['list'])  && \Route::is('sub-category') ||
            empty(auth()->user()->role->permission['permission']['subsubcat']['list'])  && \Route::is('sub-category') ||

            empty(auth()->user()->role->permission['permission']['product']['list'])  && \Route::is('product.manage') ||
            empty(auth()->user()->role->permission['permission']['product']['add'])  && \Route::is('product.add')
        ) {
           return response()->view('admin.home');
        }
    }
}
