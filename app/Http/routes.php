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
    // auth
    Route::post('auth/register', 'V1\UserController@register');
    Route::post('auth/login'   , 'V1\UserController@login');
    Route::get ('auth/twitter', 'V1\OAuthController@loginWithTwitter');

    Route::group(['middleware' => 'jwt.auth.user'], function ()
    {
        // auth
        Route::get ('auth/self'  , 'V1\UserController@self');
        Route::get ('auth/logout', 'V1\UserController@logout');

        // user
        Route::post('user/update', 'V1\UserController@update');
        Route::get ('user/stocks', 'V1\StockController@myStocks');
        Route::post('user/points', 'V1\ProfileController@buyPoint');

        // profiles
        Route::get ('profiles', 'V1\ProfileController@index');
        Route::post('profiles', 'V1\ProfileController@update');
        Route::get ('profiles/{userId}', 'V1\ProfileController@show');

        // programs
        Route::get ('programs', 'V1\ProgramController@index');
        Route::post('programs', 'V1\ProgramController@create');
        Route::get ('programs/{programId}', 'V1\ProgramController@show');
        Route::post('programs/{programId}', 'V1\ProgramController@update');

        // program logs
        Route::get ('programs/{programId}/logs', 'V1\ProgramLogController@index');
        Route::post('programs/{programId}/logs', 'V1\ProgramLogController@create');

        // program/stocks
        Route::get ('programs/{programId}/stocks',            'V1\StockController@index');
        Route::post('programs/{programId}/stocks',            'V1\StockController@deal');
        Route::get ('programs/{programId}/stocks/count/user', 'V1\StockController@countUsers');
        Route::get ('programs/{programId}/stocks/count',      'V1\StockController@countStocks');

        // stock (buy|sell) list
        Route::get ('programs/{programId}/buylist', 'V1\StockListController@getBuyList');
        Route::post('programs/{programId}/buylist', 'V1\StockListController@createBuyList');
        Route::get ('programs/{programId}/salelist', 'V1\StockListController@getSaleList');
        Route::post('programs/{programId}/salelist', 'V1\StockListController@createSaleList');

        // for develop
        Route::get('tweet', 'V1\TestController@tweet');
        Route::get('jwt_test', function () {});
    });
});
