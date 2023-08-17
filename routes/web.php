<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
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
//Get routes
Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/qna', [CategoryController::class, 'index'])->name('index_qna');
Route::get('/users/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

//update routes
Route::put('/', [ArticleController::class, 'index'])->name('article_update');
Route::put('/qna', [CategoryController::class, 'index'])->name('category_update');
Route::put('/users/{id}', [UserController::class, 'update'])->name('profile_update');

Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
Route::resource('questions', QuestionController::class);
Route::resource('users', UserController::class);
Route::resource('contact', ContactController::class);

Auth::routes();


