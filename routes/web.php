<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LeadDevController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\Developer;
use App\Http\Middleware\Manager;
use App\Http\Middleware\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('/projects', ProjectController::class)->middleware(Project::class)->middleware(Manager::class);
     Route::get('/projects/deleted', [ProjectController::class, 'showDeletedProjects'])->name('projects.deleted')->middleware(Project::class)->middleware(Manager::class);   
    Route::get('/projects/{id}/restore', [ProjectController::class, 'restoreProject'])->name('projects.restore')->middleware(Project::class)->middleware(Manager::class);
    Route::post('/projects/{id}/restore', [ProjectController::class, 'restoreProject'])->middleware(Project::class)->middleware(Manager::class);

    Route::resource('/business-units', BusinessController::class)->middleware(Project::class)->middleware(Manager::class);
    Route::resource('/developers', LeadDevController::class)->middleware(Project::class)->middleware(Manager::class);
});