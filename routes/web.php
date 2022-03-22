<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::get('/', [IndexController::class, 'index']);

// Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::get('/category', [CategoryController::class, 'index'])
->name('category');
Route::get('/{category}/news', [NewsController::class, 'NewsCategory'])
->name('news');
Route::get('/{category}/news/{id}', [NewsController::class, 'NewsShow'])
->where('id','\d+')
->name('news.show');

