<?php

use App\Http\Controllers\AdminCategoryApiController;
use App\Http\Controllers\AdminRestaurantApiController;
use App\Http\Controllers\carApiController;
use App\Http\Controllers\UserApiController;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/cars' , function(){
//     return [Cars::all()];
// });

Route::get('/cars' , [carApiController::class , 'index'])->middleware('auth:sanctum');

Route::post('/cars/insert' , [carApiController::class , 'insert']);

Route::post('/register', [UserApiController::class , 'register']);

Route::post('/login', [UserApiController::class , 'login']);

Route::post('/logout', [UserApiController::class , 'logout']);

Route::get('/admin/categories', [AdminCategoryApiController::class , 'index']);

Route::get('/admin/categories/{id}', [AdminCategoryApiController::class , 'show']);

Route::post('/admin/categories', [AdminCategoryApiController::class , 'create']);

Route::put('/admin/categories/{id}', [AdminCategoryApiController::class , 'update']);

Route::delete('/admin/categories{id}', [AdminCategoryApiController::class , 'delete']);

//res
Route::get('/admin/restaurants', [AdminRestaurantApiController::class , 'index']);

Route::get('/admin/restaurants/{id}', [AdminRestaurantApiController::class , 'show']);

Route::post('/admin/restaurants', [AdminRestaurantApiController::class , 'create']);

Route::put('/admin/restaurants/{id}', [AdminRestaurantApiController::class , 'update']);

Route::delete('/admin/restaurants{id}', [AdminRestaurantApiController::class , 'delete']);




// Route::middleware('auth:sanctum')->get('/user' , function (Request $request){
//     return $request->user();
// // });
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
