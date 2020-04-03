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

Route::get('/', function () {
    return view('homepage.index');
});
Route::post('/send-name', 'HomeController@send');
Route::get('/u/{encId}/{tokens}', 'HomeController@viewUser')->name('viewUser');
Route::get('/{encId}', 'HomeController@clientside');
Route::post('/{encId}/send-messages', 'HomeController@sendclient');
Route::get('/{encId}/timeline', 'HomeController@timeline');
