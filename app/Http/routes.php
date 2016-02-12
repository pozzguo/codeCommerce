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

//Models manipulation:
//In Admin:
Route::group(['prefix' => 'admin'], function() {

//Category:
//List:
    Route::get('category', ['as' => 'adminCategory', 'uses' => 'AdminCategoryController@index']);

//Crud:
    Route::post('category/create', ['as' => 'adminCategoryCreate', 'uses' => 'AdminCategoryController@create']);
    Route::get('category/{id}/read', ['as' => 'adminCategoryRead', 'uses' => 'AdminCategoryController@read']);
    Route::put('category/{id}/update', ['as' => 'adminCategoryUpdate', 'uses' => 'AdminCategoryController@update']);
    Route::delete('category/{id}/delete', ['as' => 'adminCategoryDelete', 'uses' => 'AdminCategoryController@delete']);

//Crud Action:
    //Route::post('category', 'AdminCategoryController@postCreate');
    //Route::put('category', 'AdminCategoryController@putUpdate');
    //Route::delete('category', 'AdminCategoryController@deleteDelete');
//Producty:
//List:
    Route::get('producty', ['as' => 'adminProducty', 'uses' => 'AdminProductyController@index']);

//Crud:
    Route::post('producty/create', ['as' => 'adminProductyCreate', 'uses' => 'AdminProductyController@create']);
    Route::get('producty/{id}/read', ['as' => 'adminProductyRead', 'uses' => 'AdminProductyController@read']);
    Route::put('producty/{id}/update', ['as' => 'adminProductyUpdate', 'uses' => 'AdminProductyController@update']);
    Route::delete('producty/{id}/delete', ['as' => 'adminProductyDelete', 'uses' => 'AdminProductyController@delete']);

//Crud Action:
    //Route::post('producty', 'AdminProductyController@postCreate');
    //Route::put('producty', 'AdminProductyController@putUpdate');
    //Route::delete('producty', 'AdminProductyController@deleteDelete');
});

Route::group(['middleware' => ['web']], function () {

    Route::get('categories',['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
    Route::post('categories',['as' => 'categories.store', 'uses' =>  'CategoriesController@store']);
    Route::put('categories/{id}/update',['as' => 'categories.update', 'uses' =>  'CategoriesController@update']);
    Route::get('categories/create',['as' => 'categories.create', 'uses' =>  'CategoriesController@create']);
    Route::get('categories/{id}/destroy',['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    Route::get('categories/{id}/edit',['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);

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
