<?php

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

use Modules\Post\Http\Controllers\PostController;

define('PAGINATION',50);

Route::middleware('auth')->prefix('post')->group(function() {
    Route::get('/', [PostController::class,'index'])->name('post');
    Route::get('/create', [PostController::class,'create'])->name('create.post');
    Route::post('/store',[PostController::class,'store'])->name('post.post');
    Route::get('/edit/{id}',[PostController::class,'edit'])->name('post.edit');
    Route::get('/show/{id}',[PostController::class,'show'])->name('post.show');
    Route::post('/update/{id}',[PostController::class,'update'])->name('post.update');
    Route::post('/delete/{id}',[PostController::class,'destroy'])->name('post.destroy');
});
