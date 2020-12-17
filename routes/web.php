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

// Click service routes
Route::group(['prefix'=>'/','as'=>'click.'], function() {
    Route::get('/', "Click\AdminController@index");

    Route::apiResource('bad_domains', 'Click\BadDomainController');
    Route::apiResource('clicks', 'Click\ClickController')->except('store', 'update', 'destroy');

    Route::get("click", "Click\TrackingController@track");
});
