<?php


use Illuminate\Support\Facades\Route;

Route::get('/citati', [App\Http\Controllers\CitatiController::class, 'index']);
Route::post('/citati', [App\Http\Controllers\CitatiController::class, 'store']);
Route::get('/citati/{citat}', [App\Http\Controllers\CitatiController::class, 'show']);
Route::put('/citati/{citat}', [App\Http\Controllers\CitatiController::class, 'update']);
Route::delete('/citati/{citat}', [App\Http\Controllers\CitatiController::class, 'destroy']);