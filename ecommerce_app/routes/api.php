<?php

use App\Http\Controllers\bannercontroller;
use App\Http\Controllers\contactcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/changepass', [JWTController::class, 'changepassword']);
    Route::post('/changeprofile', [JWTController::class, 'changeprofile']);
    Route::get('/userprofile', [JWTController::class, 'userProfile']);
});
Route::post('/contact', [contactcontroller::class, 'contact']);
Route::post('/userdetails', [contactcontroller::class, 'adduserdetails']);
Route::post('/userorder', [contactcontroller::class, 'adduserorder']);
Route::get('/showorder', [contactcontroller::class, 'showuserorder']);
Route::post('/applycoupon', [contactcontroller::class, 'applycoupon']);
Route::get('/banners', [bannercontroller::class, 'banner']);
Route::get('/categories', [bannercontroller::class, 'categorie']);
Route::get('/products', [bannercontroller::class, 'product']);
Route::get('/productdetails/{id}', [bannercontroller::class, 'productdetail']);
Route::get('/categoriebyid/{id}', [bannercontroller::class, 'categoriebyid']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
