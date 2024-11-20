<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TamuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'home'])->name('home');

/** ROUTE FOR COMMENT */

Route::middleware(['throttle:post_comment'])->group(function () {
    Route::post('/comment/post',[CommentController::class, 'store'])->name('comment.store');
});

Route::post('/comment',[CommentController::class, 'list'])->name('comment.list');

/** END ROUTE FOR COMMENT */

// tamu
Route::get('/tamu/2024',[TamuController::class,'index'])->name('tamu.index');
Route::get('/tamu/2024/create',[TamuController::class,'create'])->name('tamu.create');
Route::get('/tamu/{kode}',[TamuController::class,'show'])->name('tamu.show');
Route::post('/tamu/2024/store',[TamuController::class,'store'])->name('tamu.store');
Route::delete('/tamu/2024/{id}/destroy',[TamuController::class,'destroy'])->name('tamu.destroy');


