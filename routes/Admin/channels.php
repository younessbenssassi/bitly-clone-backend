<?php
Route::middleware(['api'])->group(function () {
    Route::apiResource('admin/channel', 'App\Http\Controllers\Api\ChannelController');
});
