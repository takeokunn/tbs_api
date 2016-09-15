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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/api/v1'], function ()
{
    Route::post('auth/register', 'V1\UserController@register');
    Route::post('auth/login'   , 'V1\UserController@login');

    Route::group(['middleware' => 'jwt.auth.user'], function ()
    {
        Route::get ('auth/self'  , 'V1\UserController@self');
        Route::post('auth/update', 'V1\UserController@update');
        Route::get ('auth/logout', 'V1\UserController@logout');

        Route::get ('profiles', 'V1\ProfileController@index');
        Route::post('profiles', 'V1\ProfileController@update');
        Route::get ('profiles/{userId}', 'V1\ProfileController@show');

        // for develop
        Route::get('jwt_test', function () {});
    });
});
