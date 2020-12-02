<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OauthController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function() {
        Route::post('register', [OauthController::class, 'register'])->name('site.register.post');
        Route::get('login', [OauthController::class, 'showLoginForm'])->name('site.login');
        Route::post('login', [OauthController::class, 'login'])->name('site.login.post');
});

Route::get('products', [ProductController::class, 'getProducts']);
