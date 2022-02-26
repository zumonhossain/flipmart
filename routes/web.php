<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Website\WebsiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ================= Admin Routes ======================
Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'Admin'], function(){
    route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    
    // All Users
    route::get('all-users',[AdminController::class,'allUsers'])->name('all-users');
    Route::get('user-banned/{user_id}',[AdminController::class,'banned'])->name('banned');
    Route::get('user-unbanned/{user_id}',[AdminController::class,'unBanned'])->name('unBanned');

    //Banner routes
    route::get('banner',[BannerController::class,'index'])->name('banner');
    route::post('banner/submit',[BannerController::class,'insert'])->name('banner.insert');
    route::get('banner/view/{slug}',[BannerController::class,'view'])->name('banner.view');
    route::get('banner/edit/{slug}',[BannerController::class,'edit'])->name('banner.edit');
    route::post('banner/update',[BannerController::class,'update'])->name('banner.update');
    route::post('banner/softdelete',[BannerController::class,'softdelete'])->name('banner.softdelete');

    //Brand Routes
    route::get('brand',[BrandController::class,'index'])->name('brand');
    route::get('brand/edit/{slug}',[BrandController::class,'edit'])->name('brand.edit');
    route::get('brand/view/{slug}',[BrandController::class,'view'])->name('brand.view');
    route::post('brand/submit',[BrandController::class,'insert'])->name('brand.insert');
    route::post('brand/update',[BrandController::class,'update'])->name('brand.update');
    route::post('brand/softdelete',[BrandController::class,'softdelete'])->name('brand.softdelete');
    Route::get('admin/brand-delete/{brand_id}',[BrandController::class,'delete']);
    
    //Category Routes
    route::get('category',[CategoryController::class,'index'])->name('category');
    route::get('category/edit/{slug}',[CategoryController::class,'edit'])->name('category.edit');
    route::get('category/view/{slug}',[CategoryController::class,'view'])->name('category.view');
    route::post('category/submit',[CategoryController::class,'insert'])->name('category.insert');
    route::post('category/update',[CategoryController::class,'update'])->name('category.update');
    route::post('category/softdelete',[CategoryController::class,'softdelete'])->name('category.softdelete');
    Route::get('admin/category-delete/{category_id}',[CategoryController::class,'delete']);
    
    //SubCategory Routes
    route::get('sub-category',[SubCategoryController::class,'index'])->name('sub-category');
    Route::get('/subcategory/ajax/{cat_id}',[SubSubCategoryController::class,'getSubCat']);
    route::get('sub-category/edit/{slug}',[SubCategoryController::class,'edit'])->name('sub-category.edit');
    route::get('sub-category/view/{slug}',[SubCategoryController::class,'view'])->name('sub-category.view');
    route::post('sub-category/submit',[SubCategoryController::class,'insert'])->name('sub-category.insert');
    route::post('sub-category/update',[SubCategoryController::class,'update'])->name('sub-category.update');
    route::post('sub-category/softdelete',[SubCategoryController::class,'softdelete'])->name('sub-category.softdelete');
    Route::get('admin/sub-category-delete/{category_id}',[SubCategoryController::class,'delete']);

    //Sub Sub Category routes
    route::get('sub-sub-category',[SubSubCategoryController::class,'index'])->name('sub-sub-category');
    Route::get('/subcategory/ajax/{cat_id}',[SubSubCategoryController::class,'getSubCat']);
    route::post('sub-sub-category/submit',[SubSubCategoryController::class,'insert'])->name('sub-sub-category.insert');
    route::get('sub-sub-category/edit/{slug}',[SubSubCategoryController::class,'edit'])->name('sub-sub-category.edit');
    route::get('sub-sub-category/view/{slug}',[SubSubCategoryController::class,'view'])->name('sub-sub-category-view');
    route::post('sub-sub-category/update',[SubSubCategoryController::class,'update'])->name('sub-sub-category.update');
    route::post('sub-sub-category/softdelete',[SubSubCategoryController::class,'softdelete'])->name('sub-sub-category.softdelete');

    //Product routes
    route::get('product',[ProductController::class,'manage'])->name('product.manage');
    route::get('product/add',[ProductController::class,'addProduct'])->name('product.add');
    Route::get('/subsubcategory/ajax/{subcat_id}',[ProductController::class,'getsubsubCat']);
    route::post('product/submit',[ProductController::class,'insert'])->name('product.insert');
    route::get('product/edit/{slug}',[ProductController::class,'edit'])->name('product.edit');
    route::get('product/view/{slug}',[ProductController::class,'view'])->name('product.view');
    route::post('product/update',[ProductController::class,'update'])->name('product.update');
    Route::get('product-inactive/{slug}',[ProductController::class,'inactive']);
    Route::get('product-active/{slug}',[ProductController::class,'active']);
    route::post('product/softdelete',[ProductController::class,'softdelete'])->name('product.softdelete');

    //Shipping Area routes

    // division
    route::get('division',[ShippingAreaController::class,'division'])->name('division');
    route::post('division/submit',[ShippingAreaController::class,'divisionInsert'])->name('division.insert');
    route::get('division/edit/{slug}',[ShippingAreaController::class,'divisionEdit'])->name('division.edit');
    route::get('division/view/{slug}',[ShippingAreaController::class,'divisionView'])->name('division.view');
    route::post('division/update',[ShippingAreaController::class,'divisionUpdate'])->name('division.update');
    route::post('division/softdelete',[ShippingAreaController::class,'divisionSoftdelete'])->name('division.softdelete');


});

// ================= User Routes ======================
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'], function(){
    route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update/data',[UserController::class,'updateData'])->name('update-profile');
    Route::get('image',[UserController::class,'imagePage'])->name('user.image');
    Route::post('update/image',[UserController::class,'updateImage'])->name('update.image');
    Route::get('update/password',[UserController::class,'updatePassPage'])->name('update-password');
    Route::post('store/password',[UserController::class,'storePassword'])->name('password-store');
});

// ================= Fontend Routes ======================
// Website Route Start
Route::get('/',[WebsiteController::class, 'index']);