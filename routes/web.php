<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

// Route::get('/', function () {
//     return view('home/index');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get( '/' , IndexController::class)->name('home');

Route::get('/about', AboutController::class)->name('about');

Route::get('/contacts', ContactController::class)->name('contact');

Route::get('/jobs', [JobController::class, 'index'])->name('job.index');

Route::resource('posts', PostController::class);
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::resource('/comments', CommentController::class);
Route::resource('/tags', TagController::class);
