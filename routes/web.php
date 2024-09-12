<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('notes', 'notes.index')
    ->middleware(['auth', 'verified'])
    ->name('notes');

Route::view('notes/create', 'notes.create')
    ->middleware(['auth', 'verified'])
    ->name('notes.create');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
