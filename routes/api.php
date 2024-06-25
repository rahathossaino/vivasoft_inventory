<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenticate']);
Route::post('/register',[AuthController::class,'register']);

Route::group(['middleware'=>'auth:api'],function(){

    //i had to create routes this way as the Route::apiResourse('inventory/product', [ProductController::class); wasn't working 
    Route::get('inventory/product/index', [ProductController::class,'index']);
    Route::post('inventory/product/store', [ProductController::class,'store']);
    Route::put('inventory/product/update/{productId}', [ProductController::class,'update']);
    Route::get('inventory/product/show/{productId}', [ProductController::class,'show']);
    Route::delete('inventory/product/destroy/{productId}', [ProductController::class,'destroy']);
    
    Route::get('/logout',[AuthController::class,'logout']);
});


