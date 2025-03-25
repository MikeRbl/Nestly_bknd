<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('user/login',[userController::class, 'login']);
Route::post('user/register', [UserController::class, 'register']);

Route::prefix('usuario')->group(function(){
    Route::get('', [UserController::class, 'index']); //obtener
    Route::post('', [UserController::class, 'create']); //crear
    Route::get('/{id}', [UserController::class, 'show'])->where('id','[0-9]+');
    Route::patch('/{id}', [UserController::class, 'update'])->where('id','[0-9]+');
    Route::delete('/{id}', [UserController::class, 'destroy'])->where('id','[0-9]+');
    
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'me']);
    Route::post('/logout', [UserController::class, 'logout']);
});