<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customercontroller;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
// use App\Http\Controllers\EmailController;

// Frontend Controller Starts Here

Route::get('/', [FrontendController::class,'index'])->name('index');
Route::get('/about', [FrontendController::class,'about'])->name('about');
Route::get('/account', [FrontendController::class,'account'])->name('account');

// Route::get('contact', [FrontendController::class,'contact']);
// Frontend Controller Ends Here

// Customer Controller

Route::post('/customerreg', [Customercontroller::class,'customerreg'])->name('customerreg');
Route::post('/customerlogin', [Customercontroller::class,'customerlogin'])->name('customerlogin');


// Customer Controller



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// profile controller
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::post('/profile/photo/upload', [App\Http\Controllers\ProfileController::class,'profile_photo_upload']);
Route::post('/profile/cover/upload', [App\Http\Controllers\ProfileController::class,'cover_photo_upload']);
Route::post('/password/change', [App\Http\Controllers\ProfileController::class,'password_change']);
Route::get('/phone/number/varify', [App\Http\Controllers\ProfileController::class,'phone_number_varify'])->name('phoneV');

// Route::post('/submit-email', [EmailController::class, 'submit']);


// category controller
Route::resource('/category', CategoryController::class);

// category controller

// profile controller

Route::get('logout','App\Http\Controllers\Auth\LoginController@Logout')->name('logout');

