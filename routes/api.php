<?php

##use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TodoController;
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

Route::get('/users', [UserController::class, 'index']);
Route::get('/admins', [AdminController::class, 'index']);

##Todos APIs
Route::get('/todos', [TodoController::class, 'index']);
Route::put('/todo/{id}', [TodoController::class, 'edit']);
Route::put('/markAsDone/{id}', [TodoController::class, 'markAsDone']);
Route::put('/markAsNotDone/{id}', [TodoController::class, 'markAsNotDone']);
Route::post('/todo', [TodoController::class, 'create']);
Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
