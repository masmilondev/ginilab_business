<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/business-setup', [DashboardController::class, 'businessSetup']);
Route::get('/branch-setup', [DashboardController::class, 'branchSetup']);
Route::put("/branch-setup/{id}", [BranchController::class, 'update']);

Route::resource('business', BusinessController::class);