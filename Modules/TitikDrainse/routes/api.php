<?php

use Illuminate\Support\Facades\Route;
use Modules\TitikDrainse\Http\Controllers\TitikDrainseController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('titikdrainses', TitikDrainseController::class)->names('titikdrainse');
});
