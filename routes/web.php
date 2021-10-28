<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberApplicationController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/c/{token}', [MemberController::class, 'verify'])->name('card.verify');
Route::get('/pages/{slug}', [PageController::class, 'show'])->name('page');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('post');
Route::get('/novo-socio', [MemberApplicationController::class, 'create'])->name('member.application');
Route::post('/novo-socio', [MemberApplicationController::class, 'store'])->name('member.application.store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
