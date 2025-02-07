<?php

use App\Http\Controllers\AdminCategoryApiController;
use App\Http\Controllers\AdminProductApiController;
use App\Http\Controllers\AdminRestaurantApiController;
use App\Http\Controllers\carApiController;
use App\Http\Controllers\UserApiController;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/cars' , function(){
//     return [Cars::all()];
// });

Route::get('/cars' , [carApiController::class , 'index'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::post('/cars/insert' , [carApiController::class , 'insert'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::post('/register', [UserApiController::class , 'register'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::post('/login', [UserApiController::class , 'login'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::post('/logout', [UserApiController::class , 'logout'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::get('/admin/categories', [AdminCategoryApiController::class , 'index'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::get('/admin/categories/{id}', [AdminCategoryApiController::class , 'show'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::post('/admin/categories', [AdminCategoryApiController::class , 'create'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::put('/admin/categories/{id}', [AdminCategoryApiController::class , 'update'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::delete('/admin/categories{id}', [AdminCategoryApiController::class , 'delete'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

//res
Route::get('/admin/restaurants', [AdminRestaurantApiController::class , 'index'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::get('/admin/restaurants/{id}', [AdminRestaurantApiController::class , 'show'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::post('/admin/restaurants', [AdminRestaurantApiController::class , 'create'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::put('/admin/restaurants/{id}', [AdminRestaurantApiController::class , 'update'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::delete('/admin/restaurants/{id}', [AdminRestaurantApiController::class , 'delete'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);
//product
Route::get('/admin/products', [AdminProductApiController::class , 'index'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::get('/admin/products/{id}', [AdminProductApiController::class , 'show'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::post('/admin/products', [AdminProductApiController::class , 'create'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::put('/admin/products/{id}', [AdminProductApiController::class , 'update'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);

Route::delete('/admin/products/{id}', [AdminProductApiController::class , 'delete'])->middleware(['auth:sanctum' , 'auth.role.admin.json']);



// Route::middleware('auth:sanctum')->get('/user' , function (Request $request){
//     return $request->user();
// // });
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
  