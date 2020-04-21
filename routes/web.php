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
Route::get('terms', function () {
    return view('homepage.terms');
});
Route::get('about', function () {
    return view('homepage.about');
});
Route::get('help', function () {
    return view('homepage.help');
});
Route::get('f.a.q', function () {
    return view('homepage.faq');
});

Route::post('/send-name', 'HomeController@send');
Route::get('/u/{encId}/{tokens}', 'HomeController@viewUser')->name('viewUser');
Route::get('/{encId}', 'HomeController@clientside');
Route::post('/{encId}/send-messages', 'HomeController@sendclient');
Route::get('/{encId}/timeline', 'HomeController@timeline');
