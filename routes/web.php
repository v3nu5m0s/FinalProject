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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('/projects', ProjectController::class);
    Route::get('/deletedProjects', [ProjectController::class, 'showDeletedProjects'])->name('projects.deleted');   
    Route::get('/deletedProjects/{id}/restore', [ProjectController::class, 'restoreProject'])->name('projects.restore')->middleware(Project::class)->middleware(Manager::class);
    Route::post('/deletedProjects/{id}/restore', [ProjectController::class, 'restoreProject'])->middleware(Project::class)->middleware(Manager::class);

    Route::resource('/business-units', BusinessController::class);
    Route::resource('/developers', LeadDevController::class);
});
