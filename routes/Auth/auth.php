<?php
use Illuminate\Support\Facades\Route;

//Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
//Route::post('logout','App\Http\Controllers\Api\AuthController@logout');

Route::middleware(['api'])->group(function () {
    Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
    Route::post('logout','App\Http\Controllers\Api\AuthController@logout');
    Route::post('refresh','App\Http\Controllers\Api\AuthController@refresh');
    Route::post('me','App\Http\Controllers\Api\AuthController@me');
});
