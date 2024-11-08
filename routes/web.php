<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

    // Landing Pages
    Route::get('/dashboard/landing-pages',
        [LandingPageController::class, 'index']
    )->name('landing-pages.index');

    Route::get('/dashboard/landing-pages/create',
        [LandingPageController::class, 'create']
    )->name('landing-pages.create');

    Route::get('/dashboard/landing-pages/{id}/edit',
        [LandingPageController::class, 'edit']
    )->name('landing-pages.edit');

});

// Route::resource('landing-pages', LandingPageController::class);

require __DIR__.'/auth.php';
