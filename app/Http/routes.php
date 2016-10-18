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



Route::group(['middleware' => ['web']], function () {

    Route::get('error/unauthorized', ['as' => 'unauthorized', function () {
            return view('errors.unauthorized');
        }]);

    Route::get('/', 'StoreController@index');

    Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category', 'where' => ['id' => '[0-9]+']]);
    Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product', 'where' => ['id' => '[0-9]+']]);
    Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag', 'where' => ['id' => '[0-9]+']]);
    Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add', 'where' => ['id' => '[0-9]+']]);
    Route::get('cart/remove/{id}', ['as' => 'cart.remove', 'uses' => 'CartController@remove', 'where' => ['id' => '[0-9]+']]);
    Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy', 'where' => ['id' => '[0-9]+']]);


//Models manipulation:
//In Admin:
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkAdmin'], 'where' => ['id' => '[0-9]+']], function() {

        Route::get('', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
        
        Route::group(['prefix' => 'orders'], function() {
            Route::get('', ['as' => 'orders.index', 'uses' => 'OrdersController@index']);
            Route::post('', ['as' => 'orders.store', 'uses' => 'OrdersController@store']);
            Route::put('{id}/update', ['as' => 'orders.update', 'uses' => 'OrdersController@update']);
            Route::get('create', ['as' => 'orders.create', 'uses' => 'OrdersController@create']);
            Route::get('{id}/destroy', ['as' => 'orders.destroy', 'uses' => 'OrdersController@destroy']);
            Route::get('{id}/edit', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit']);
        });
        
        Route::group(['prefix' => 'status'], function() {
            Route::get('', ['as' => 'status.index', 'uses' => 'StatusController@index']);
            Route::post('', ['as' => 'status.store', 'uses' => 'StatusController@store']);
            Route::put('{id}/update', ['as' => 'status.update', 'uses' => 'StatusController@update']);
            Route::get('create', ['as' => 'status.create', 'uses' => 'StatusController@create']);
            Route::get('{id}/destroy', ['as' => 'status.destroy', 'uses' => 'StatusController@destroy']);
            Route::get('{id}/edit', ['as' => 'status.edit', 'uses' => 'StatusController@edit']);
        });

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

            Route::group(['prefix' => '{id}/images', 'where' => ['idImage' => '[0-9]+']], function() {

                Route::get('', ['as' => 'products.images.index', 'uses' => 'ProductsImagesController@index']);
                Route::post('', ['as' => 'products.images.store', 'uses' => 'ProductsImagesController@store']);
                Route::get('create', ['as' => 'products.images.create', 'uses' => 'ProductsImagesController@create']);
                Route::get('{idImage}/destroy', ['as' => 'products.images.destroy', 'uses' => 'ProductsImagesController@destroy']);
            });
        });
    });

    Route::group(['middleware' => ['auth'], 'where' => ['id' => '[0-9]+']], function() {
        Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
        Route::get('checkout/payOrder/{idOrder}', ['as' => 'checkout.payOrder', 'uses' => 'CheckoutController@payOrder']);
        Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
    });
});

Route::get('phpinfo', function () {
    return phpinfo();
}
);


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'StoreController@index');
});
