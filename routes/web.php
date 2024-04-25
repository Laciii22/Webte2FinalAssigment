<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
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

    
    Route::delete('/questions/{question_code}', [QuestionController::class, 'destroy'])->name('questions.destroy');

});

Route::get('/{question}/result', [QuestionController::class, 'showResult'])->name('questions.question-result');
Route::get('/questions/{question_code}', [QuestionController::class, 'showByCode'])->name('questions.show');
Route::post('/questions/{question_code}', [QuestionController::class, 'submitResponse'])->name('submitResponse');




require __DIR__ . '/auth.php';