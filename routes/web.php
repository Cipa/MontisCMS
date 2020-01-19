<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/' . config('admin.path'), function () {
//     return 'admin';
// });
// dd(config('admin.path'));
Route::get('/' . config('admin.path'), 'AdminController@index')->name('admin');
Route::get('/' . config('admin.path') . '/{any}', 'AdminController@index')->name('admin')->where('any', '.*');

// Route::any('/', function () {
//     //
// });


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
