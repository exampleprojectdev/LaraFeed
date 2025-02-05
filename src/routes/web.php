<?php

use Illuminate\Support\Facades\Route;
use ExampleProject\LaraFeed\Http\Controllers\FeedbackController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/larafeed_dashboard', [FeedbackController::class, 'dashboard'])
        ->name('feedback.dashboard');
        
    Route::post('/feedback', [FeedbackController::class, 'store'])
        ->name('feedback.store');
});
