<?php
Route::middleware(['api'])->group(function () {
    Route::apiResource('channel', 'App\Http\Controllers\Api\ChannelController');
});
