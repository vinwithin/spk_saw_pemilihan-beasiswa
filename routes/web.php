<?php

use App\Http\Controllers\alternatifController;
use App\Http\Controllers\hitungController;
use App\Http\Controllers\kriteriaController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [pageController::class, 'index']);
Route::get('/alternatif', [alternatifController::class, 'index']);
Route::get('/alternatif/create', [alternatifController::class, 'show']);
Route::post('/alternatif/create', [alternatifController::class, 'store']);
Route::get('/alternatif/edit/{id}', [alternatifController::class, 'edit']);
Route::post('/alternatif/update/{id}', [alternatifController::class, 'update']);
Route::get('/alternatif/delete/{id}', [alternatifController::class, 'destroy']);

Route::get('/kriteria', [kriteriaController::class, 'index']);
Route::get('/hitung', [hitungController::class, 'index']);

