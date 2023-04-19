<?php

use App\Http\Controllers\AmendmentController;
use App\Http\Controllers\ParliamentaryController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ViabilityController;
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

Route::controller(AmendmentController::class)
    ->middleware('auth')
    ->group(function () {
    Route::get('/amendments', 'index')->name('amendments.index');
    Route::post('/amendments', 'store')->name('amendments.store');
    Route::get('/amendments/create', 'create')->name('amendments.create');
    Route::get('/amendments/{id}', 'show')->name('amendments.show');
    Route::put('/amendments/{id}', 'update')->name('amendments.update');
    Route::delete('/amendments/{id}', 'destroy')->name('amendments.destroy');
    Route::get('/amendments/{id}/edit', 'edit')->name('amendments.edit');
});

Route::controller(ParliamentaryController::class)
    ->middleware('auth')
    ->group(function () {
    Route::get('/parliamentarians', 'index')->name('parliamentarians.index');
    Route::post('/parliamentarians', 'store')->name('parliamentarians.store');
    Route::get('/parliamentarians/create', 'create')->name('parliamentarians.create');
    Route::get('/parliamentarians/{id}', 'show')->name('parliamentarians.show');
    Route::put('/parliamentarians/{id}', 'update')->name('parliamentarians.update');
    Route::delete('/parliamentarians/{id}', 'destroy')->name('parliamentarians.destroy');
    Route::get('/parliamentarians/{id}/edit', 'edit')->name('parliamentarians.edit');
});

Route::controller(ProgressController::class)
    ->middleware('auth')
    ->group(function () {
    Route::get('/progress', 'index')->name('progress.index');
    Route::post('/progress', 'store')->name('progress.store');
    Route::get('/progress/create', 'create')->name('progress.create');
    Route::get('/progress/{id}', 'show')->name('progress.show');
    Route::put('/progress/{id}', 'update')->name('progress.update');
    Route::delete('/progress/{id}', 'destroy')->name('progress.destroy');
    Route::get('/progress/{id}/edit', 'edit')->name('progress.edit');
});

Route::controller(ViabilityController::class)
    ->middleware('auth')
    ->group(function () {
    Route::get('/viability', 'index')->name('viability.index');
    Route::post('/viability', 'store')->name('viability.store');
    Route::get('/viability/create', 'create')->name('viability.create');
    Route::get('/viability/{id}', 'show')->name('viability.show');
    Route::put('/viability/{id}', 'update')->name('viability.update');
    Route::delete('/viability/{id}', 'destroy')->name('viability.destroy');
    Route::get('/viability/{id}/edit', 'edit')->name('viability.edit');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
