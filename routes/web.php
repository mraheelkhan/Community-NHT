<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{Api\CommentController, Api\LikeController, PostController, FeedController, HomeController};
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('feed', [FeedController::class, 'index'])->name('feed.index');
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::prefix('user')->group(function(){
        Route::resource('comments', CommentController::class);
        Route::resource('likes', LikeController::class);
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
