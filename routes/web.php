<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TrandPostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    //admin
    Route::get('dashboard',[ProfileController::class,'index'])->name('dashboard');

    //adminList
    Route::get('admin/list',[ListController::class,'index'])->name('admin#list');
    // category
    Route::get('category',[CategoryController::class,'index'])->name('admin#category');
    // post
    Route::get('post',[PostController::class,'index'])->name('admin#post');
    // trend_post
    Route::get('trandPost',[TrandPostController::class,'index'])->name('admin#trendPost');
});
