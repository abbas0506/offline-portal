<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::view('login', 'login')->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::view('academic-research', 'academic_research.index');
Route::resource('papers', PaperController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('signout', [AuthController::class, 'signout'])->name('signout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [DashboardController::class, 'index']);
    });
});
