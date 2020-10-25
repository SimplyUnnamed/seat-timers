<?php

Route::group([
    'namespace'  => 'SimplyUnnamed\Seat\Timers\Http\Controllers',
    'middleware' => 'web',   // Web middleware for state etc since L5.3
    'prefix' => 'timers'
], function () {

    Route::group([
        'middleware' => ['web', 'auth'],
    ], function(){

        Route::get('/', [
            'as'   => 'timers.view',
            'uses' => 'TimersController@index'
            //'middleware' => 'can:fitting.view'
        ]);

        Route::put('/saveTimer', [
            'as' => 'timers.saveTimer',
            'uses' => 'TimersController@store',
            //'middleware' => ''
        ]);

    });

});