<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManualController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/questions/export/{format}', [QuestionController::class, 'export'])->name('questions.export');

    Route::get('/dashboard-users', [UserController::class, 'index'])->name('dashboard-users');


    Route::delete('/questions/{question_code}', [QuestionController::class, 'destroy'])->name('questions.destroy');
});

Route::get('/{question}/result', [QuestionController::class, 'showResult'])->name('questions.question-result');
Route::post('/submit-response', [QuestionController::class, 'submitResponse'])->name('submitResponse');
//Route::get('/questions/{question_code}', [QuestionController::class, 'showByCode'])->name('questions.show');
//Route::post('/questions/{question_code}', [QuestionController::class, 'submitResponse'])->name('submitResponse');

Route::get('/user-manual', [UserManualController::class, 'show'])->name('user-manual');
Route::get('/user-manual/export-pdf', [UserManualController::class, 'exportPdf'])->name('user-manual.export-pdf');




require __DIR__ . '/auth.php';
