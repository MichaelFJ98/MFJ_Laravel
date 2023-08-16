<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;

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
Route::get('/qna', [CategoryController::class, 'index'])->name('index_qna');

//update routes
Route::put('/', [ArticleController::class, 'index'])->name('article_update');
Route::put('/qna', [CategoryController::class, 'index'])->name('category_update');

Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
Route::resource('questions', QuestionController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
