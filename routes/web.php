<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectControl;
use App\Http\Controllers\BusinessControl;
use App\Http\Controllers\ITMSManagerControl;
use App\Http\Controllers\LeadDevControl;

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

Auth::routes();

// Business Unit Routes
Route::get('/businessunit', [BusinessControl::class, 'index'])->name('businessunits.index');
Route::get('/businessunit/create', [BusinessControl::class, 'create'])->name('businessunits.create');
Route::post('/businessunit', [BusinessControl::class, 'store'])->name('businessunits.store');
Route::get('/businessunit/{id}', [BusinessControl::class, 'show'])->name('businessunits.show');
Route::get('/businessunit/{id}/edit', [BusinessControl::class, 'edit'])->name('businessunits.edit');
Route::put('/businessunit/{id}', [BusinessControl::class, 'update'])->name('businessunits.update');
Route::delete('/businessunit/{id}', [BusinessControl::class, 'destroy'])->name('businessunits.destroy');

// Additional Custom Routes (if needed)
Route::get('/businessunit/{id}/custom-action', [BusinessControl::class, 'customAction'])->name('businessunits.custom-action');
// Add more custom routes as needed