<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth', 'is.active']], function(){
    Route::group(['namespace'=>'Admin'], function(){
        Route::resource('moneys','MoneyController');
        Route::resource('users', 'UserController');
        Route::resource('boxes', 'BoxController');
        Route::get('boxes/table/{id}', 'BoxController@table')->name('table');
    });


    Route::get('incoming/{id}', 'BoxController@getIncomingForm')->name('incoming');
    Route::put('incoming/{id}', 'BoxController@incoming')->name('incoming');

    Route::get('outgoing/{id}', 'BoxController@getOutgoingForm')->name('outgoing');
    Route::put('outgoing/{id}', 'BoxController@outgoing')->name('outgoing');

    Route::get('reports', 'ReportController@get')->name('reports');
    Route::get('reports/{id}', 'ReportController@view')->name('report.view');

});

