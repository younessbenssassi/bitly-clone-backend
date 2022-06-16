<?php

Route::middleware(['admin-auth'])->group(function () {
    Route::apiResource('admin/category', 'App\Http\Controllers\Api\CategoryController');
});

/*
Route::group(['middleware' => ['api','AdminOnly']], function () {
    Route::apiResource('category', 'App\Http\Controllers\Api\CategoryController');

});*/
