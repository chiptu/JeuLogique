<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

/*Route::get('/rocket/1',  function () {
    return view('rocketLevels');
});


Route::post('/rocket/{id}', 'RocketController@levelJson')->name('levelJson');*/

Route::get('/rocket/{id}', 'RocketController@levelJson')->name('levelJson'); //renvoie json pour api


Route::get('/play', function () {
    return view('rocketLevels');
});


Route::get('/bravo-glados', function () {
    return view('secret');
});

Route::post('/bravo-glados', 'SecretController')->name('secret');


Route::get('/win', function () {
    return view('win');
});

Route::post('/win', 'UserController@feedback')->name('feedback');


Route::get('/mention', function () {
    return view('mentionLegale');
});

Route::get('/documentation', function () {
    return view('documentation');
});