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
    Route::get('/', "Tracking\AdminController@index");

    Route::apiResource('bad_domains', 'Tracking\BadDomainController');
    Route::apiResource('clicks', 'Tracking\ClickController')->except('store', 'update', 'destroy');

    Route::get("click", "Tracking\TrackingController@track");
    Route::get('/succes/{id}', "Tracking\TrackingController@success")->name('success');
    Route::get('/error/{id}', "Tracking\TrackingController@success")->name('error');
});
