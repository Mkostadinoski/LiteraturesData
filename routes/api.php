<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiteratureController;

Route::apiResource('literatures', LiteratureController::class);
