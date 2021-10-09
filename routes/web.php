<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;


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

Route::get('/', [IndexController::class, 'home']);
Route::get('/read-book/{id}', [IndexController::class, 'readbook'])->name('readbook');

Route::get('/danh-muc/{slug}', [IndexController::class, 'findbook']);


Auth::routes();

Route::get('/quantri', [HomeController::class, 'index'])->name('admin.home');

Route::resource('/quantri/danhmuc', CategoryController::class);
Route::resource('/quantri/truyen', BookController::class);
Route::resource('/quantri/chapter', ChapterController::class);
