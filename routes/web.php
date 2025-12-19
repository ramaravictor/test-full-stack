<?php

use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/resep', [ResepController::class, 'index'])->name('resep.index');
