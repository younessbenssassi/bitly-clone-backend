<?php

Route::middleware(['api'])->group(function () {
    Route::get('categories', 'App\Http\Controllers\Api\CategoryController@index');
    Route::get('channels', 'App\Http\Controllers\Api\ChannelController@index');
});
