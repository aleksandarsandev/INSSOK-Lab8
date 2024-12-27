<?php

use App\Http\Controllers\JetController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Jet Routes
Route::get('/jets', [JetController::class, 'index'])->name('jets.index'); // List all jets
Route::get('/jets/create', [JetController::class, 'create'])->name('jets.create'); // Show form to add a new jet
Route::post('/jets', [JetController::class, 'store'])->name('jets.store'); // Store new jet
Route::get('/jets/{jet}', [JetController::class, 'show'])->name('jets.show'); // Show details of a single jet
Route::get('/jets/{jet}/edit', [JetController::class, 'edit'])->name('jets.edit'); // Show form to edit a jet
Route::put('/jets/{jet}', [JetController::class, 'update'])->name('jets.update'); // Update an existing jet
Route::delete('/jets/{jet}', [JetController::class, 'destroy'])->name('jets.destroy'); // Delete a jet

// Review Routes
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store'); // Store a new review
Route::post('/reviews/{review}/status/{status}', [ReviewController::class, 'changeStatus'])->name('reviews.changeStatus'); // Change status of a review
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
