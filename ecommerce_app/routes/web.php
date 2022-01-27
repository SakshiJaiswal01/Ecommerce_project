<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Main;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
//categorie
Route::get('/addcategorie',[Main::class,'addcategorie']);
Route::post('/categorie_insert',[Main::class,'categorie_insert']);
Route::get('/showcategorie',[Main::class,'showcategorie']);
Route::get('/deletecategorie/{id}',[Main::class,'delete_categorie']);
Route::get('/editcategorie/{id}',[Main::class,'editcategorie']);
Route::post('/update',[Main::class,'update']);
//user
Route::get('/adduser',[Main::class,'adduser']);
Route::post('/user_insert',[Main::class,'user_insert']);
Route::get('/showuser',[Main::class,'showuser']);
Route::get('/deleteuser/{id}',[Main::class,'delete_user']);
Route::get('/edituser/{id}',[Main::class,'edituser']);
Route::post('/update_user',[Main::class,'update_user']);
//coupon
Route::get('/addcoupon',[Main::class,'addcoupon']);
Route::post('/coupon_insert',[Main::class,'coupon_insert']);
Route::get('/showcoupon',[Main::class,'showcoupon']);
Route::get('/deletecoupon/{id}',[Main::class,'delete_coupon']);
//banner
Route::get('/addbanner',[Main::class,'addbanner']);
Route::post('/banner_insert',[Main::class,'banner_insert']);
Route::get('/showbanner',[Main::class,'showbanner']);
Route::get('/deletebanner/{id}',[Main::class,'delete_banner']);
Route::get('/editbanner/{id}',[Main::class,'editbanner']);
Route::post('/update_banner',[Main::class,'update_banner']);
//configgration
Route::get('/showconfig',[Main::class,'showconfig']);
Route::get('/editconfig/{id}',[Main::class,'editconfig']);
Route::post('/update_configemail',[Main::class,'update_configemail']);
//product
Route::get('/addproduct',[Main::class,'addproduct']);
Route::get('/showproduct',[Main::class,'showproduct']);
Route::post('/product_insert',[Main::class,'product_insert']);
Route::get('/deleteproduct/{id}',[Main::class,'delete_product']);
Route::get('/editproduct/{id}',[Main::class,'editproduct']);
Route::post('/update_product',[Main::class,'update_product']);
Route::get('/productview/{id}',[Main::class,'productview']);
//contact us
Route::get('/contactus',[Main::class,'contactus']);
Route::get('/deletecontact/{id}',[Main::class,'delete_contact']);
//userdetails
Route::get('/userdetails',[Main::class,'userdetails']);
Route::get('/deleteuserdetails/{id}',[Main::class,'delete_userdetails']);
//userorderdetails
Route::get('/userorderdetails',[Main::class,'userorderdetails']);
Route::get('/deleteuserorderdetails/{id}',[Main::class,'delete_userorderdetails']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
