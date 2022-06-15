<?php
Route::middleware(['api'])->group(function () {
    Route::apiResource('category', 'App\Http\Controllers\Api\CategoryController');
});
