<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectControl;
use App\Http\Controllers\BusinessControl;
use App\Http\Controllers\ITMSManagerControl;
use App\Http\Controllers\LeadDevControl;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);


Auth::routes();

// Routes that require authentication
Route::middleware(['auth'])->group(function () { 

// Business Unit Routes
Route::get('/businessunit', [BusinessControl::class, 'index'])->name('ibusinessunit.index');
Route::get('/businessunit/create', [BusinessControl::class, 'create'])->name('ibusinessunit.create');
Route::post('/businessunit', [BusinessControl::class, 'store'])->name('ibusinessunit.store');
Route::get('/businessunit/{id}', [BusinessControl::class, 'show'])->name('ibusinessunit.show');
Route::get('/businessunit/{id}/edit', [BusinessControl::class, 'edit'])->name('ibusinessunit.edit');
Route::put('/businessunit/{id}', [BusinessControl::class, 'update'])->name('ibusinessunit.update');
Route::delete('/businessunit/{id}', [BusinessControl::class, 'destroy'])->name('ibusinessunit.destroy');

// Additional Custom Routes (if needed)
Route::get('/businessunit/{id}/custom-action', [BusinessControl::class, 'customAction'])->name('businessunits.custom-action');
// Add more custom routes as needed

// Developer Routes
Route::get('/developers', [LeadDevControl::class, 'index'])->name('ideveloper.index');
Route::get('/developers/create', [LeadDevControl::class, 'create'])->name('ideveloper.create');
Route::post('/developers', [LeadDevControl::class, 'store'])->name('ideveloper.store');
Route::get('/developers/{id}', [LeadDevControl::class, 'show'])->name('ideveloper.show');
Route::get('/developers/{id}/edit', [LeadDevControl::class, 'edit'])->name('ideveloper.edit');
Route::put('/developers/{id}', [LeadDevControl::class, 'update'])->name('ideveloper.update');
Route::delete('/developers/{id}', [LeadDevControl::class, 'destroy'])->name('ideveloper.destroy');
Route::get('/developers/{id}/progress', [LeadDevControl::class, 'progress'])->name('ideveloper.progress');

// Manager Routes
Route::get('/managers', [ITMSManagerControl::class, 'index'])->name('imanager.index');
Route::get('/managers/create', [ITMSManagerControl::class, 'create'])->name('imanager.create');
Route::post('/managers', [ITMSManagerControl::class, 'store'])->name('imanager.store');
Route::get('/managers/{id}', [ITMSManagerControl::class, 'show'])->name('imanager.show');
Route::get('/managers/{id}/edit', [ITMSManagerControl::class, 'edit'])->name('imanager.edit');
Route::put('/managers/{id}', [ITMSManagerControl::class, 'update'])->name('imanager.update');
Route::delete('/managers/{id}', [ITMSManagerControl::class, 'destroy'])->name('imanager.destroy');

// Project Routes
Route::get('/project', [ProjectControl::class, 'index'])->name('iproject.index');
Route::get('/project/create', [ProjectControl::class, 'create'])->name('iproject.create');
Route::post('/project', [ProjectControl::class, 'store'])->name('iproject.store');
Route::get('/project/{id}', [ProjectControl::class, 'show'])->name('iproject.show');
Route::get('/project/{id}/edit', [ProjectControl::class, 'edit'])->name('iproject.edit');
Route::put('/project/{id}', [ProjectControl::class, 'update'])->name('iproject.update');
Route::delete('/project/{id}', [ProjectControl::class, 'destroy'])->name('iproject.destroy');
Route::get('/project/{id}/progress-reports', [ProjectControl::class, 'progressReports'])->name('iproject.progress-reports');

});

