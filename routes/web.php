<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

require __DIR__.'/auth.php';

   Route::get('/', function () {
       return view('welcome');
   });

   Route::middleware(['auth'])->group(function () {
       Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
       Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
       Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
       Route::get('/cars/{user}', [CarController::class, 'showUserCars'])->name('cars.user');
   });

