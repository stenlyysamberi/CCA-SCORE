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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::GET('updated/{id}', 'MainController@getSoal');

Route::POST('ubah', 'MainController@updated');

Route::POST('add', 'MainController@added');

Route::POST('del', 'MainController@delete');

Route::POST('addtim', 'MainController@addtim');

