<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('User.homepage');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// ======================================================

Route::get('register', function () {

    return view('User.register');
});

Route::resource('user/login', UserController::class);
Route::get('show',[UserController::class,'showpage']);
Route::get('userlogin',[UserController::class,'userlogin']);
Route::post('login/post',[UserController::class,'postlogin'])->name('login.post');
// Route::get('dashboard1',[UserController::class,'dashboard']);

// Route::resource('banner', BannerController::class);

Route::get('banner',[BannerController::class,'index']);
Route::get('add/banner',[BannerController::class,'create']);
Route::post('store/banner',[BannerController::class,'store']);
Route::get('edit/banner/{id}',[BannerController::class,'edit']);
Route::post('update/banner/{id}',[BannerController::class,'update']);
Route::get('delete/banner/{id}',[BannerController::class,'destroy']);


// Product route
Route::resource('user/product', ProductController::class);

Route::get('product',[ProductController::class,'index'])->name('product');
Route::get('add/product',[ProductController::class,'create']);
Route::post('store/product',[ProductController::class,'store']);
Route::get('edit/product/{id}',[ProductController::class,'edit']);
Route::post('update/product/{id}',[ProductController::class,'update']);
Route::get('delete/product/{id}',[ProductController::class,'destroy']);

// category routes
Route::get('category',[CategoryController::class,'index'])->name('cat_index');
Route::get('add/category',[CategoryController::class,'create']);
Route::post('store/category',[CategoryController::class,'store']);
Route::get('editcategory/{id}',[CategoryController::class,'edit']);
Route::post('update/category/{id}',[CategoryController::class,'update']);
Route::get('deletecategory/{id}',[CategoryController::class,'destroy']);





