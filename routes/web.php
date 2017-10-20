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

Route::get('/', 'TicketController@index');
Route::resource(
    'ticket',
    'TicketController',
    ['except' => ['index']]
);
Route::resource(
    'category',
    'CategoryController',
    ['only' => ['show']]
);

Route::resource(
    'user',
    'UserController',
    ['only' => ['show']]
);

Auth::routes();