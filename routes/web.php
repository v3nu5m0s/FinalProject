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
    Route::post('/deletedProjects/{id}', [ProjectController::class, 'restoreProject'])->name('projects.restore');

    Route::resource('/developers', LeadDevController::class);
    Route::get('/deletedDevelopers', [LeadDevController::class, 'showDeletedDevelopers'])->name('developers.deleted');
    Route::post('/deletedDevelopers/{id}', [LeadDevController::class, 'restore'])->name('developers.restore');

    Route::resource('/business-units', BusinessController::class);
    Route::resource('/developers', LeadDevController::class);
});
