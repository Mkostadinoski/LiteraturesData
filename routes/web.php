<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiteratureController;

// Route::apiResource('literatures', LiteratureController::class);
Route::post('/literatures', [LiteratureController::class, 'store'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

// use Illuminate\Support\Facades\Route;

// Route::get('/health', function () {
//     return response()->json([
//         'status' => 'ok',
//         'time' => now()->toDateTimeString()
//     ]);
// });
