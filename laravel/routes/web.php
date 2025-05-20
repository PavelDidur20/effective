<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/post', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/table', [\App\Http\Controllers\TableController::class, 'index']);