<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');
Route::inertia('/registroinquilinos', 'RegistroInquilinos')->name('RegistroInquilinos');
Route::inertia('/controlpagos', 'ControlPagos')->name('ControlPagos');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
