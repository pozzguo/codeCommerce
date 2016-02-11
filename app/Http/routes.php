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
    Route::get('category', ['as' => 'adminCategory','uses' => 'AdminCategoryController@index']);

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
    Route::get('producty', ['as' => 'adminProducty','uses' => 'AdminProductyController@index']);

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

    Route::get('categories','CategoriesController@index');
    Route::post('categories','CategoriesController@store');
    Route::get('categories/create','CategoriesController@create');

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
