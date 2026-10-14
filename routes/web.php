<?php

use App\Http\Controllers\ComisionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ComisionController::class, 'index'])->name('comisiones.index');
Route::post('/comisiones', [ComisionController::class, 'calcular'])->name('comisiones.calcular');
