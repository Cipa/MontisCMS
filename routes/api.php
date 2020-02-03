<?php

use App\Resource;
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
// });

Route::get('/resources', 'ResourcesController@index');
Route::post('/resources', 'ContactsController@store');
Route::get('/resources/{resource}', 'ResourcesController@show')->where('resource', '[0-9]+');
Route::patch('/resources/{resource}', 'ResourcesController@update')->where('resource', '[0-9]+');
Route::delete('/resources/{resource}', 'ResourcesController@destroy')->where('resource', '[0-9]+');

Route::get('/types', 'TypesController@index');
Route::get('/templates', 'TemplatesController@index');
Route::get('/tvs', 'TvController@index');


// Route::get('/parse', function () {
//     $data = Resource::where('id', 1)->first();
//     return view('parse')->with(['test' => $data]);
// });
