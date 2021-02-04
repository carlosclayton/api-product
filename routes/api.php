<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group([
        'as' => 'api',
        'middleware' => ['api.throttle'],
        'limit' => 50,
        'expires' => 1
    ], function ($api) {

        $api->group([
            'prefix' => 'users',
            'as' => 'users.',
        ], function ($api) {
            $api->get('/user', function (Request $request) {
                return response([
                    'data' => $request->user()
                ]);
            })->name('.user');
        });

        $api->group([
            'namespace' => 'App\Http\Controllers',
            'prefix' => 'products',
            'as' => 'products.'
        ], function ($api) {
            $api->get('/', 'ProductsController@index')->name('.index');
            $api->post('/', 'ProductsController@store')->name('.store');
            $api->put('/{product}', 'ProductsController@update')->name('.update');
            $api->get('/{product}', 'ProductsController@show')->name('.show');
            $api->delete('/{product}', 'ProductsController@destroy')->name('.destroy');
        });

        $api->group([
            'namespace' => 'App\Http\Controllers',
            'prefix' => 'categories',
            'as' => 'categories.'
        ], function ($api) {
            $api->get('/', 'CategoriesController@index')->name('.index');
            $api->post('/', 'CategoriesController@store')->name('.store');
            $api->put('/{category}', 'CategoriesController@update')->name('.update');
            $api->get('/{category}', 'CategoriesController@show')->name('.show');
            $api->delete('/{category}', 'CategoriesController@destroy')->name('.destroy');
        });
    });
});

