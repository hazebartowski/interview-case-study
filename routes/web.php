<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\AuthController;

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
require 'api.php';

//Route::get('/{any}', [SiteController::class, 'index'])->where('any', '.*');

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('site.login');
Route::post('login', [AuthController::class, 'login'])->name('site.login.post');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('site.register');
Route::post('register', [AuthController::class, 'register'])->name('site.register.post');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('site.logout');
});



