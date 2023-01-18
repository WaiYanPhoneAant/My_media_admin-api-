<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TrandPostController;
use Illuminate\Routing\RouteGroup;

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



    //admin Update
    Route::post('admin/update',[ProfileController::class,'Accupdate'])->name('admin#update');

    //admin direct to Change Password Page
    Route::get('admin/PwChangePage',[ProfileController::class,'PasswordChangePage'])->name('admin#PwChangePage');

    //admin direct to Change Password Page
    Route::get('admin/deleteAcc/{id}',[ListController::class,'DeleteAccount'])->name('admin#deleteAcc');

    //admin Change Password
    Route::post('admin/PwChange',[ProfileController::class,'PasswordChange'])->name('admin#PwChange');

    //adminList
    Route::get('admin/list',[ListController::class,'index'])->name('admin#list');

    // category
    Route::get('category',[CategoryController::class,'index'])->name('admin#category');
    Route::post('category/create',[CategoryController::class,'categoryCreate'])->name('category#create');
    Route::post('category/update/{id}',[CategoryController::class,'categoryUpdate'])->name('category#update');
    Route::get('category/delete/{id}',[CategoryController::class,'categoryDelete'])->name('category#Delete');

    // post
    Route::get('post',[PostController::class,'index'])->name('admin#post');
    // trend_post
    Route::get('trandPost',[TrandPostController::class,'index'])->name('admin#trendPost');
});
