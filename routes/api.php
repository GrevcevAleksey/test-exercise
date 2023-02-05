<?php

//use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/public', [App\Http\Controllers\PublicController::class, 'public']);
Route::get('/feed-import', [App\Http\Controllers\FeedImportController::class, 'import']);

Route::controller('App\Http\Controllers\AuthController')->prefix('auth')->middleware('api')->group(function () {
    Route::get('/user-profile', 'userProfile');
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
    Route::put('/refresh', 'refresh');
    Route::put('/refresh-password', 'refreshPassword');
});
