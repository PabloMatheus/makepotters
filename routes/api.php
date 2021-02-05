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

Route::post('/auth', 'AuthController@auth');
Route::get('/teste', 'CharacterController@teste');

Route::middleware('auth:api')->group(function () {

    Route::prefix('character')->group(function () {
        Route::get('/{id}', 'CharacterController@find');
        Route::post('/', 'CharacterController@create');
        Route::delete('/{id}', 'CharacterController@delete');
        Route::put('/{id}', 'CharacterController@update');
    });

    Route::prefix('characters')->group(function () {
        Route::get('/', 'CharacterController@list');
    });

});
