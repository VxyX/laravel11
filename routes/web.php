<?php

use App\Http\Controllers\SimpleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/insert', function () {
    return view('insert');
});

Route::get('/', [SimpleController::class, 'index']);

// Menampilkan form insert rent
Route::get('/insert', [SimpleController::class, 'insert']);

// Menyimpan data rent
Route::post('/rent', [SimpleController::class, 'store'])->name('rent.store');

Route::get('/addresses/{customerId}', [SimpleController::class, 'getAddresses']);