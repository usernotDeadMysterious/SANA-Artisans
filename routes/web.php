<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index']);
Route::get('/artists', [FrontendController::class, 'artists']);
Route::get('/apply', [FrontendController::class, 'apply']);
Route::post('/apply', [FrontendController::class, 'store']);

Route::get('/artisans', [FrontendController::class, 'artisans'])->name('public.artisans');
Route::get('/artisan/{artist}', [FrontendController::class, 'artisanDetail'])->name('public.artisan.detail');
/*
|--------------------------------------------------------------------------
| Authenticated Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )
        ->name('dashboard');

    Route::resource('artists', ArtistController::class);

    Route::patch(
        '/artists/{artist}/approve',
        [ArtistController::class, 'approve']
    )
        ->name('artists.approve');

    Route::patch(
        '/artists/{artist}/reject',
        [ArtistController::class, 'reject']
    )
        ->name('artists.reject');

    Route::get(
        '/artists/{artist}/cv',
        [ArtistController::class, 'downloadCv']
    )
        ->name('artists.cv');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Frontend Public routes 

});

require __DIR__ . '/auth.php';