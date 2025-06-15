<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PlanController;

require __DIR__.'/auth.php';

   Route::get('/', function () {
       return view('welcome');
   });

   Route::middleware(['auth'])->group(function () {
       Route::get('/', [CarController::class, 'index'])->name('cars.index');
       Route::get('/dashboard', [CarController::class, 'index'])->name('cars.index');
       Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
       Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
       Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
       Route::get('/cars/{user}', [CarController::class, 'showUserCars'])->name('cars.user');
       Route::get('/cars/{car}/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
       Route::post('/cars/{car}/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
       Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
       Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
       Route::get('cars/{car}/plans', [PlanController::class, 'index'])->name('cars.plans');
       Route::post('cars/{car}/plans', [PlanController::class, 'store'])->name('cars.plans.store');
       Route::post('cars/{car}/plans/{plan}/toggle', [PlanController::class, 'toggle'])->name('cars.plans.toggle');

   });

