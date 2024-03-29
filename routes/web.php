<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{Api\CommentController,
    LikeController,
    Api\PostController as ApiPostController,
    PostController,
    FeedController,
    HomeController,
    ProfileController};

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
    return redirect()->route("feed.index");
});
Route::get('feed', [FeedController::class, 'index'])->name('feed.index');
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('profile/{username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/{username}', [ProfileController::class, 'update'])->name('profile.update');
    Route::prefix('user')->group(function(){
        Route::resource('comments', CommentController::class);
        Route::resource('likes', LikeController::class);
    });
});
Auth::routes();
Auth::routes(['verify' => true]);

Route::prefix('public')->group(function(){
    Route::resource('posts', ApiPostController::class);
    Route::get('profile/{username}', [ProfileController::class, 'index'])->name('public.profile');
    Route::get('profile/user/{username}', [ProfileController::class, 'show'])->name('public.profile.user');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('feed.index');
})->middleware(['auth', 'signed'])->name('verification.verify');

use Illuminate\Support\Facades\DB;
Route::get("db", function(){
    // Test database connection
    try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }
});