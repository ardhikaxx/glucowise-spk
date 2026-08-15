<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScreeningApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/screening/attributes', [ScreeningApiController::class, 'getAttributes']);
    Route::post('/screening/predict', [ScreeningApiController::class, 'predict']);
});
