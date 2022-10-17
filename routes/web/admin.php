<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/business-setup', [DashboardController::class, 'businessSetup']);
Route::get('/branch-setup', [DashboardController::class, 'branchSetup']);
Route::put("/branch-setup/{id}", [BranchController::class, 'update']);

Route::resource('business', BusinessController::class);
Route::resource('brand', BrandController::class);
Route::resource('unit', UnitController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
