<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\WithAdmin;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'login'])->name('/');
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');


// // Dashboard with middleware
// Route::group(['middleware' => ['auth', WithAdmin::class]], function () {
//     Route::prefix('dashboard')->group(__DIR__ . '/web/admin.php');
// });


Route::prefix('dashboard')->middleware([WithAdmin::class])->group(__DIR__ . '/web/admin.php');


require __DIR__ . '/auth.php';



// Route::get('/currencies', [DashboardController::class, 'currencies']);
// Route::get('/languages', [DashboardController::class, 'langauges']);


// Route::prefix('admin')->group(function () {
//     Route::get('/business-setup', [DashboardController::class, 'businessSetup']);
//     Route::get('/branch-setup', [DashboardController::class, 'branchSetup']);
//     Route::put("/branch-setup/{id}", [BranchController::class, 'update']);
//     // Route::get('/currencies', [DashboardController::class, 'currencies']);
//     // Route::get('/languages', [DashboardController::class, 'langauges']);
//     Route::get('/', [DashboardController::class, 'index']);
// });





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
