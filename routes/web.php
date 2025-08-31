<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConferencePaperController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JournalPaperController;
use App\Http\Controllers\MphilThesisController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\PhdThesisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewPaperController;
use App\Http\Controllers\SurveyReportController;
use App\Http\Controllers\TechnicalReportController;
use App\Http\Controllers\ThesisController;
use App\Models\ConferencePaper;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::view('login', 'login')->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::view('academic-research', 'academic_research.index');
Route::resource('papers', PaperController::class);
Route::resource('journal-papers', JournalPaperController::class);
Route::resource('conference-papers', ConferencePaperController::class);
Route::resource('technical-reports', TechnicalReportController::class);
Route::resource('review-papers', ReviewPaperController::class);
Route::resource('survey-reports', SurveyReportController::class);
Route::resource('thesis', ThesisController::class);
Route::get('mphil/thesis', [ThesisController::class, 'mphil'])->name('mphil.thesis');
Route::get('phd/thesis', [ThesisController::class, 'phd'])->name('phd.thesis');

Route::middleware(['auth'])->group(function () {
    Route::get('signout', [AuthController::class, 'signout'])->name('signout');
});
