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

use Modules\Comment\Http\Controllers\CommentController;

Route::prefix('comment')->group(function() {
    Route::get('/', [CommentController::class,'index']);
    Route::post('/store', [CommentController::class,'store'])->name('comment.store');
    Route::post('/update/{id}', [CommentController::class,'update'])->name('comment.update');
    Route::post('/delete/{id}', [CommentController::class,'destroy'])->name('comment.destroy');
});
