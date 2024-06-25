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
    Route::post('inventory/product/update/{id}', [ProductController::class,'update']);
    Route::get('inventory/product/show/{id}', [ProductController::class,'show']);
    Route::get('inventory/product/destroy', [ProductController::class,'destroy']);
    
    Route::get('/logout',[AuthController::class,'logout']);
});


