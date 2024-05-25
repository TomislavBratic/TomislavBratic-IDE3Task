<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/users', [UserController::class, 'UserMethod']);
