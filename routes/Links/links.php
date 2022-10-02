<?php
Route::middleware(['api'])->group(function () {
    Route::apiResource('/links', 'App\Http\Controllers\Api\LinksController');
});
