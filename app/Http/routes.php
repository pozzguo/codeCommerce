<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
/*
  Route::get('/', function () {
  return view('welcome');
  });
 */

Route::get('/', 'WelcomeController@index');

Route::group(['middleware' => ['web']], function () {

//Models manipulation:
//In Admin:
    Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function() {

        Route::group(['prefix' => 'categories'], function() {
            Route::get('', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
            Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
            Route::put('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
            Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
            Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
            Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        });

        Route::group(['prefix' => 'products'], function() {

            Route::get('', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
            Route::post('', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
            Route::put('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
            Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
            Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
            Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        });
    });


// Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
});

Route::get('phpinfo', function () {
    return phpinfo();
}
);

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
//
});
