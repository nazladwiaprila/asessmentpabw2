<?php

use Illuminate\Support\Facades\Route;
use Modules\TitikDrainse\Http\Controllers\TitikDrainseController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('titikdrainses', TitikDrainseController::class)->names('titikdrainse');
});
