<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\PostController;
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
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/post/{id}', [BlogController::class, 'show'])->name('posts.show');

    Route::middleware("auth:web")->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        // Route::get('/my_posts', [BlogController::class, 'my_posts'])->name('my_posts');
        Route::post('/post/comment/{id}', [BlogController::class, 'comment'])->name('comment');

        Route::get('/create', [BlogController::class, 'create'])->name('posts.create');
        Route::post('/store', [BlogController::class, 'store'])->name('posts.store');
        Route::get('/edit={post}', [BlogController::class, 'edit'])->name('posts.edit');
        Route::put('/update={post}', [BlogController::class, 'update'])->name('posts.update');
        Route::post('/delete={post}', [BlogController::class, 'delete'])->name('posts.delete');

    });

    Route::middleware("guest:web")->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');

        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');
    });
});
