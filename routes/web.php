<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\LogoutController;


Route::get('/',[HomeController::class , 'home'])->name('home');

Route::get('/basket/list',[HomeController::class , 'basketList'])->name('basket');

Route::get('/basket/add/{product_id}/{restaurant_id}',[BasketController::class , 'add'])->name('basket.add');

Route::get('/checkout/{user_id}',[BasketController::class , 'checkout'])->name('basket.checkout');

Route::get('/delete/basket/{id}',[HomeController::class , 'removeBasket'])->name('delete.basket')->middleware(['auth' , 'auth.role.admin']);

Route::get('/search',[HomeController::class , 'search'])->name('search');

Route::get('/category/{id}',[HomeController::class , 'category'])->name('home.category');

Route::get('/restaurants/{id}',[HomeController::class , 'restaurants'])->name('restaurants');

Route::get('/admin',[AdminController::class , 'admin'])->name('admin')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/category/list',[AdminController::class , 'categoryList'])->name('category-List')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/product/list',[AdminController::class , 'productList'])->name('product-List')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/restaurant/list',[AdminController::class , 'restaurantList'])->name('restaurant-List')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/restaurant/create',[AdminController::class , 'restaurantCreate'])->name('restaurant-create')->middleware(['auth' , 'auth.role.admin']);

Route::post('/admin/restaurant/insert',[AdminController::class , 'restaurantInsert'])->name('restaurant-insert')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/category/create',[AdminController::class , 'categoryCreate'])->name('category-create')->middleware(['auth' , 'auth.role.admin']);

Route::post('/admin/category/insert',[AdminController::class , 'categoryInsert'])->name('category-insert')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/product/create',[AdminController::class , 'productCreate'])->name('product-create')->middleware(['auth' , 'auth.role.admin']);

Route::post('/admin/product/insert',[AdminController::class , 'productInsert'])->name('product-insert')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/restaurant/edit/{id}',[AdminController::class , 'restaurantEdit'])->name('restaurant-edit')->middleware(['auth' , 'auth.role.admin']);

Route::post('/admin/restaurant/update',[AdminController::class , 'restaurantUpdate'])->name('restaurant-update')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/category/edit/{id}',[AdminController::class , 'categoryEdit'])->name('category-edit')->middleware(['auth' , 'auth.role.admin']);

Route::post('/admin/category/update',[AdminController::class , 'categoryUpdate'])->name('category-update')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/product/edit/{id}',[AdminController::class , 'productEdit'])->name('product-edit')->middleware(['auth' , 'auth.role.admin']);

Route::post('/admin/product/update',[AdminController::class , 'productUpdate'])->name('product-update')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/restaurant/delete/{id}',[AdminController::class , 'restaurantDelete'])->name('restaurant-delete')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/category/delete/{id}',[AdminController::class , 'categoryDelete'])->name('category-delete')->middleware(['auth' , 'auth.role.admin']);

Route::get('/admin/product/delete/{id}',[AdminController::class , 'productDelete'])->name('product-delete')->middleware(['auth' , 'auth.role.admin']);

Auth::routes();

Route::get('/logout',[LogoutController::class , 'logout'])->name('logout');
