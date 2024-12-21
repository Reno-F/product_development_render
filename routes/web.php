<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\DietController;

Route::get('/', [HealthController::class, 'index'])->name('home');
Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator');
Route::post('/kalkulator/hitung', [KalkulatorController::class, 'hitung'])->name('kalkulator.hitung');
Route::get('/kalkulator-kalori', [DietController::class, 'showCalculator'])->name('diet.program');
