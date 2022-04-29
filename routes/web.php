<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\SourcesController as AdminSourcesController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;


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




Route::group(['middleware' => "auth"], function () {
    // Admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.check'], function () {
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::get('/', AdminIndexController::class)->name('index');
        Route::resource('sources', AdminSourcesController::class);
        Route::resource('orders', AdminOrderController::class);
        Route::resource('users', AdminUserController::class);
        Route::get('parser', ParserController::class)
                    ->name('parser');
    });

    // Other routes
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/category', [CategoryController::class, 'index'])
        ->name('category');
    Route::get('/{category}/news', [NewsController::class, 'NewsCategory'])
        ->name('news');
    Route::get('/{category}/news/{id}', [NewsController::class, 'NewsShow'])
        ->where('id', '\d+')
        ->name('news.show');
    Route::resource('feedback', FeedbackController::class);
    Route::resource('order', OrderController::class);
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/auth/{network}/redirect', [SocialController::class, 'index'])
    ->name('auth.redirect');
    Route::get('/auth/{network}/callback', [SocialController::class, 'callback'])
    ->name('auth.callback');
});

Route::get('/account', AccountIndexController::class)->name('account');
Auth::routes();
