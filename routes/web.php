<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact',      [postcontroller::class, 'firstindex'])->name('main.page');

Route::get('post/{post}',   [postcontroller::class, 'show'])->name('view');

Route::get('posts/create',  [postcontroller::class, 'create'])->name('create');

Route::post('posts',        [postcontroller::class, 'store'])->name('store');

Route::get('posts/{post}/edit',     [postcontroller::class, 'edit'])->name('edit');

Route::put('posts/{post}',          [postcontroller::class, 'show_post'])->name('show_post');

Route::delete('posts/{post}',       [postcontroller::class, 'delete'])->name('delete.post');


