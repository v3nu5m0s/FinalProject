<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectControl;
use App\Http\Controllers\BusinessControl;
use App\Http\Controllers\LeadDevControl;
use App\Http\Controllers\ProgressControl;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// In your routes/web.php or routes/api.php file

Route::middleware(['auth'])->group(function () {
    Route::resource('/projects', ProjectControl::class);
    Route::resource('/business-units', BusinessControl::class);
    Route::resource('/developers', LeadDevControl::class);
    Route::resource('/progress-reports', ProgressControl::class);
});
