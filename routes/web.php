<?php

use App\Livewire\Home;
use App\Livewire\Post\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/post/{postSlug}', Show::class)->name('post.show');
