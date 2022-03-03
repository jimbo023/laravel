<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;

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

Route::get('/index', [IndexController::class, 'index']);


Route::get('/category', [CategoryController::class, 'index'])
->name('category');
Route::get('/{category}/news', [NewsController::class, 'NewsCategory'])
->name('news');
Route::get('/{category}/news/{id}', [NewsController::class, 'NewsShow'])
->where('id','\d+')
->name('news.show');
