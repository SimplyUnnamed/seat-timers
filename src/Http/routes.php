<?php



use SimplyUnnamed\Seat\Timers\Models\TimerTypes;

Route::group([
    'namespace'  => 'SimplyUnnamed\Seat\Timers\Http\Controllers',
    'middleware' => 'web',   // Web middleware for state etc since L5.3
    'prefix' => 'timers'
], function () {

    Route::group(['prefix'=>'lookup'], function(){

        Route::get('systems', 'LookupController@systems');

    });

    Route::group([
        'middleware' => ['web', 'auth'],
    ], function(){

        Route::get('/', [
            'as'   => 'timers.view',
            'uses' => 'TimersController@index',
            'middleware' => 'can:timers.view'
        ]);

        Route::get('create', [
            'as' => 'timers.create',
            'uses' => 'TimersController@create',
            'middleware' => 'can:timers.store'
        ]);

        Route::put('/saveTimer', [
            'as' => 'timers.saveTimer',
            'uses' => 'TimersController@store',
            'middleware' => 'can:timers.store'
            //'middleware' => ''
        ]);

    });

});

Route::group([
    'namespace'  => 'SimplyUnnamed\Seat\Timers\Http\Controllers',
    'middleware' => 'web',
    'prefix'    => 'timertypes',
], function(){

    Route::get('/list', [
        'as' => 'timertypes.view',
        'uses' => 'TimerTypesController@index',
        'middleware'=>'can:timertypes.view'
    ]);

    Route::put('store', [
        'as' => 'timertypes.store',
        'uses' => 'TimerTypesController@store',
        'middleware' => 'can:timertypes.store'
    ]);

    Route::get('remove/{id}', [
        'as' => 'timertypes.delete',
        'uses' => 'TimerTypesController@remove',
        'middleware' => 'can:timertypes.delete'
    ]);

});