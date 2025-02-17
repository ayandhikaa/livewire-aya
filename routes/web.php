<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\post\index;
use App\Livewire\post\edit;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/counter', Counter::class)->name('counter'); //memanggil coounter
    Route::get('/post.index', Index::class)->name('post.index'); //memanggil post index
    Route::get('posts/{postId}/edit', Edit::class)->name('posts.edit'); //memanggil post edit
});
