<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return redirect()->route('patients.index');
});
Route::get('/dashboard', [PatientController::class, 'dashboard'])
    ->name('patients.dashboard');
Route::resource('patients', PatientController::class);