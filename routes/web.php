<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;

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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');

Auth::routes();

//Banner Route
Route::name('backend.')->group(function(){
    Route::get('/dashboard', [BackendController::class, 'index'])->name('home');
    Route::resource('/banner',BannerController::class)->except(['show']);
    Route::get('/banner/status/{banner}',[BannerController::class,'status'])->name('banner.status');
    Route::get('/banner/restore/{id}',[BannerController::class,'restore'])->name('banner.restore');
    Route::get('/banner/hard/delete/{id}',[BannerController::class,'harddelete'])->name('banner.harddelete');

    //Prodect Route
    Route::resource('/category', CategoryController::class);
    Route::resource('/size', SizeController::class)->except(['show','create']);
    Route::resource('/color', ColorController::class)->except(['show','create']);
    Route::resource('/product', ProductController::class);
});