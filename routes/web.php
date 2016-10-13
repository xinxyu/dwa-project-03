<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PageController@homePage')->name('home');

Route::get('/text-generator', 'PageController@textGenerator')->name('generator.text');

Route::get('/user-generator','PageController@userGenerator')->name('generator.user');
