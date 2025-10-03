<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonController;

Route::prefix('v1')->group(function () {
    Route::get('/people', [PersonController::class, 'index']);
    Route::post('/people/{id}/like', [PersonController::class, 'like']);
    Route::post('/people/{id}/dislike', [PersonController::class, 'dislike']);
    Route::get('/people/liked', [PersonController::class, 'likedList']);
});
