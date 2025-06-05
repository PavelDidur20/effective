<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/job', function () {
    \App\Jobs\LogMessage::dispatch("Тестовое сообщение в " . now()->toDateTimeString());
}); 