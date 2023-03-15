<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\IndexController::class,'laslesVpn'])->name('home');
Route::get('/quize', function () {
    return view('Quize');
})->name('quize');

Route::prefix('blog')->group(function (){
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('blog');
    Route::get('/post/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

    Route::middleware("auth:web")->group(function () {
        Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
        Route::get('/my_posts', [\App\Http\Controllers\PostController::class, 'my_posts'])->name('my_posts');
        Route::post('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
        Route::post('/delete/posts/{id}', [\App\Http\Controllers\PostController::class, 'deletePost'])->name('post_delete');

    });

    Route::middleware("guest:web")->group(function () {
        Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

        Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');
    });
});
