<?php

use App\Http\Controllers\AmendmentController;
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

Route::controller(AmendmentController::class)->group(function () {
    Route::get('/amendments', 'index')->name('amendments.index');
    Route::post('/amendments', 'store')->name('amendments.store');
    Route::get('/amendments/create', 'create')->name('amendments.create');
    Route::get('/amendments/{id}', 'show')->name('amendments.show');
    Route::put('/amendments/{id}', 'update')->name('amendments.update');
    Route::delete('/amendments/{id}', 'destroy')->name('amendments.destroy');
    Route::get('/amendments/{id}/edit', 'edit')->name('amendments.edit');
});
