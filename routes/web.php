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


    Route::prefix('admin')->group(function () {
        //admin Update
        Route::post('/update',[ProfileController::class,'Accupdate'])->name('admin#update');
        //admin direct to Change Password Page
        Route::get('/PwChangePage',[ProfileController::class,'PasswordChangePage'])->name('admin#PwChangePage');
        //admin direct to Change Password Page
        Route::get('/deleteAcc/{id}',[ListController::class,'DeleteAccount'])->name('admin#deleteAcc');
        //admin Change Password
        Route::post('/PwChange',[ProfileController::class,'PasswordChange'])->name('admin#PwChange');
        //adminList
        Route::get('/list',[ListController::class,'index'])->name('admin#list');
    });



    // category
    Route::prefix('category')->group(function () {
        Route::get('/',[CategoryController::class,'index'])->name('admin#category');
        Route::post('/create',[CategoryController::class,'categoryCreate'])->name('category#create');
        Route::post('/update/{id}',[CategoryController::class,'categoryUpdate'])->name('category#update');
        Route::get('/delete/{id}',[CategoryController::class,'categoryDelete'])->name('category#Delete');
    });


    // post

    Route::prefix('post')->group(function () {
        Route::get('/',[PostController::class,'index'])->name('admin#post');
        Route::post('/postCreate',[PostController::class,'postCreate'])->name('postCreate');
        Route::get('/postDelete/{id}',[PostController::class,'postDelete'])->name('postDelete');
        Route::get('/postEdit/{id}',[PostController::class,'postEdit'])->name('postEdit');
        Route::post('/postupdate/{id}',[PostController::class,'postUpdate'])->name('postUpdate');
    });
    // trend_post
    Route::get('trandPost',[TrandPostController::class,'index'])->name('admin#trendPost');
});
