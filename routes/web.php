<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

Route::get( '/' , IndexController::class)->name('home');



Route::get('/contacts', ContactController::class)->name('contact');

Route::get('/jobs', [JobController::class, 'index'])->name('job.index');

Route::resource('/tags', TagController::class);

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::resource('posts', PostController::class)->only(['index', 'show']);
Route::middleware('auth')->group(function () {

    // Admin
    Route::middleware('role:admin')->group(function() {
        Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });

    // Editor, Admin
    Route::middleware('role:editor,admin')->group(function() {
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->can('update', 'post');
        Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update')->can('update', 'post');
    });

    // User, Editor, Admin
    Route::middleware('role:user,editor,admin')->group(function() {
        Route::get('posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    });

    Route::resource('/comments', CommentController::class);
});

// Route::middleware('OnlyMe')->group(function () {
    Route::get('/about', AboutController::class)->name('about');
// });

