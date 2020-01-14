<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });s

Route::get('/resources', 'ResourcesController@index');
Route::post('/resources', 'ContactsController@store');
Route::get('/resources/{resource}', 'ResourcesController@show');
Route::patch('/resources/{resource}', 'ResourcesController@update');
Route::delete('/resources/{resource}', 'ResourcesController@destroy');
