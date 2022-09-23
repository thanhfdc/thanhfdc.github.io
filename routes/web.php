<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

  Route::get('/admin', [LoginController::class,'home'])->name('home');
Route::get('/login', [LoginController::class,'login'])->name('get-login');//not
Route::post('/login',[LoginController::class,'postLogin'])->name('post-login');
Route::get('/register',[LoginController::class,'register'])->name('get-register');
Route::post('/register',[LoginController::class,'postRegister'])->name('post-register');
Route::get('/logout',[LoginController::class,'logout'])->name('get-logout');

Route::prefix('admin')->group(function () {
  Route::group(['prefix'=>'category','middleware'=> 'admin'],function () {
    Route::get('/',[CategoryController::class,'index'])->name('categories.indexx');
    Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('/update/{id}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');
  });
  Route::group(['prefix'=>'menu','middleware'=> 'admin'],function () {
      Route::get('/',[MenuController::class,'index'])->name('menus.index');
      Route::get('/create',[MenuController::class,'create'])->name('menus.create');
      Route::post('/store',[MenuController::class,'store'])->name('menus.store');
      Route::get('/edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
      Route::post('/update/{id}',[MenuController::class,'update'])->name('menus.update');
      Route::get('/delete/{id}',[MenuController::class,'delete'])->name('menus.delete');
  });
  Route::group(['prefix'=>'product','middleware'=> 'admin'],function () {
      Route::get('/',[ProductController::class,'index'])->name('products.index');
      Route::get('/create',[ProductController::class,'create'])->name('products.create');
      Route::post('/store',[ProductController::class,'store'])->name('products.store');
      Route::get('/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
      Route::post('/update/{id}',[ProductController::class,'update'])->name('products.update');
      Route::get('/delete/{id}',[ProductController::class,'delete'])->name('products.delete');
  });

  // Slider
  Route::group(['prefix'=>'slider','middleware'=> 'admin'],function () {
      Route::get('/',[SliderAdminController::class,'index'])->name('sliders.index');
      Route::get('/create',[SliderAdminController::class,'create'])->name('sliders.create');
      Route::post('/store',[SliderAdminController::class,'store'])->name('sliders.store');
      Route::get('/edit/{id}',[SliderAdminController::class,'edit'])->name('sliders.edit');
      Route::post('/update/{id}',[SliderAdminController::class,'update'])->name('sliders.update');
      Route::get('/delete/{id}',[SliderAdminController::class,'delete'])->name('sliders.delete');
  });
  Route::group(['prefix'=>'user','middleware'=> 'admin'],function () {
      Route::get('/',[UserController::class,'index'])->name('users.index');
      Route::get('/create',[UserController::class,'create'])->name('users.create');
      Route::post('/store',[UserController::class,'store'])->name('users.store');
      Route::get('/edit/{id}',[UserController::class,'edit'])->name('users.edit');
      Route::post('/update/{id}',[UserController::class,'update'])->name('users.update');
      Route::get('/delete/{id}',[UserController::class,'delete'])->name('users.delete');
  });
  Route::group(['prefix'=>'role','middleware'=> 'admin'],function () {
      Route::get('/',[RoleController::class,'index'])->name('roles.index');
      Route::get('/create',[RoleController::class,'create'])->name('roles.create');
      Route::post('/store',[RoleController::class,'store'])->name('roles.store');
      Route::get('/edit/{id}',[RoleController::class,'edit'])->name('roles.edit');
      Route::post('/update/{id}',[RoleController::class,'update'])->name('roles.update');
      Route::get('/delete/{id}',[RoleController::class,'delete'])->name('roles.delete');
  });
});



Route::get('/', 'HomeController@index');
Route::get('/test', 'HomeController@test');

Route::get('/addToCart/{id}', 'CartController@addToCart');
Route::get('/detail/{id}', 'HomeController@detail');
Route::get('/showcart', 'CartController@showcart');
Route::post('/search', 'HomeController@search');
Route::get('/load_comment', 'ProductController@load_comment');
Route::post('/send_comment', 'ProductController@send_comment');


Route::post('/save_cart', 'CartController@save_cart');
Route::get('/delete/{rowId}', 'CartController@deleteCart');
Route::get('/login_checkout', 'CheckoutController@login_checkout');
Route::get('/logout_checkout', 'CheckoutController@logout_checkout');
Route::post('/login_customer', 'CheckoutController@login_customer');

Route::post('/add_customer', 'CheckoutController@add_customer');
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/payment', 'CheckoutController@payment');
Route::post('/order_place', 'CheckoutController@order_place');

Route::post('/save_checkout_customer', 'CheckoutController@save_checkout_customer');
//order
Route::get('/manage_order','CheckoutController@manage_order');
Route::get('/view_order/{id}','CheckoutController@view_order');


Route::get('/category/{slug}/{id}',[CategoryController::class,'product'])->name('categories.index');