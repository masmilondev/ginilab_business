<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/business-setup', [DashboardController::class, 'businessSetup']);
    Route::get('/branch-setup', [DashboardController::class, 'branchSetup']);
    Route::put("/branch-setup/{id}", [BranchController::class, 'update']);
    Route::get('/currencies', [DashboardController::class, 'currencies']);
    Route::get('/languages', [DashboardController::class, 'langauges']);
    Route::get('/', [DashboardController::class, 'index']);
});


Route::resource('business', BusinessController::class);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';