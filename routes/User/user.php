<?php

Route::middleware(['api'])->group(function () {
    Route::get('categories', 'App\Http\Controllers\Api\CategoryController@index');
    Route::get('channels', 'App\Http\Controllers\Api\ChannelController@index');
    Route::put('update-account', 'App\Http\Controllers\Api\UserController@update');
    Route::put('user-channel', 'App\Http\Controllers\Api\UserController@updateUserChannelsToggle');
    Route::delete('delete-account', 'App\Http\Controllers\Api\UserController@destroy');

    Route::get('home', 'App\Http\Controllers\Api\HomeController@index');
    Route::get('category/{slug}', 'App\Http\Controllers\Api\HomeController@getCategory');
    Route::get('channel/{slug}', 'App\Http\Controllers\Api\HomeController@getChannel');
    Route::get('my-list', 'App\Http\Controllers\Api\HomeController@myList');
});
