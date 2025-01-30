<?php

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

// Route::middleware('auth:sanctum')->get('/user' , function (Request $request){
//     return $request->user();
// });
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
