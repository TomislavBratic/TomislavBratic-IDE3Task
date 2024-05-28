<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\RecipeController;
use  App\Http\Controllers\GroceryController;
use  App\Http\Controllers\RatingController;
use  App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');

//users
Route::get('/users', [UserController::class, 'getAll']);
Route::get('/users/{user_id}', [UserController::class, 'getOne']);
Route::delete('/users/{user_id}', [UserController::class, 'delete']);
Route::post('/users}', [UserController::class, 'create']);
Route::put('/users/{user_id}', [UserController::class, 'update']);
//recipes
Route::get('/recipes', [RecipeController::class, 'getAll']);
Route::get('/recipes/{recipe_id}', [RecipeController::class, 'getOne']);
Route::delete('/recipes/{recipe_id}', [RecipeController::class, 'delete']);
Route::post('/recipes', [RecipeController::class, 'create']);
Route::put('/recipes/{recipe_id}', [RecipeController::class, 'update']);
//groceries
Route::get('/groceries', [GroceryController::class, 'getAll']);
Route::get('/groceries/{grocery_id}', [GroceryController::class, 'getOne']);
Route::delete('/groceries/{grocery_id}', [GroceryController::class, 'delete']);
Route::post('/groceries', [GroceryController::class, 'create']);
Route::put('/groceries/{grocery_id}', [GroceryController::class, 'update']);
//rating
Route::post('/ratings', [RatingController::class, 'create']);
//comment
Route::post('/comments', [CommentController::class, 'create']);