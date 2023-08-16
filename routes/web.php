<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'index'])->name('index');

//update routes
Route::put('/', [ArticleController::class, 'index'])->name('article_update');

Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
Route::resource('questions', QuestionController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
