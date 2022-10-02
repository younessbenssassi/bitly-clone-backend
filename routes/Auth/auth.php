<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
    Route::post('logout','App\Http\Controllers\Api\AuthController@logout');
    Route::get('get-auth-state','App\Http\Controllers\Api\AuthController@getAuthState');
});
