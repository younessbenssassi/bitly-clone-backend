<?php

##use Illuminate\Http\Request;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
/*
Route::get('/users', [UserController::class, 'index']);
Route::get('/admins', [AdminController::class, 'index']);

Route::post('login', 'App\Http\Controllers\Api\AuthController@login');

Route::post('logout','App\Http\Controllers\Api\AuthController@logout') -> middleware(['auth.guard:admin-api']);
*/
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');

Route::post('logout','App\Http\Controllers\Api\AuthController@logout') -> middleware(['auth.guard:admin-api']);
Route::group(['middleware' => ['api'], 'namespace' => 'Api'], function () {


    Route::group(['prefix' => 'user' ,'middleware' => 'auth.guard:user-api'],function (){
        Route::post('profile',function(){
            return  \Auth::user(); // return authenticated user data
        }) ;


    });

});

