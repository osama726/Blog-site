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


Route::resource('posts', PostController::class);
Route::middleware('auth')->group(function () {
    Route::resource('/comments', CommentController::class);
});

Route::middleware('OnlyMe')->group(function () {
    Route::get('/about', AboutController::class)->name('about');
});
