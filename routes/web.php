<?php

use App\Http\Controllers\LiteratureController;

Route::prefix('api')->group(function () {
    Route::apiResource('literatures', LiteratureController::class);
});