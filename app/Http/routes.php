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

Route::get('/', 'MainController@index');

Route::auth();

Route::get('/home', 'MainController@home');

Route::get('/users', 'MainController@listUsers');




Route::group(["prefix" => "admin"],function(){

    Route::get('/', 'AdminController@index')->name("admin.login");

    Route::post('login', 'AdminController@login')->name("admin.loginprocess");

    Route::group(["middleware" => ["admin", "auth"]],function(){

        Route::get('home', 'AdminController@home')->name("admin.home");

        Route::get('logout', 'AdminController@logout');

        Route::get('stores', 'AdminController@listStores')->name("admin.stores");

        Route::get('stores/add', 'AdminController@addStore')->name("admin.stores.add");

        Route::post('stores/add', 'AdminController@addStoreProcess')->name("admin.stores.addprocess");

        Route::get('stores/show/{id}', 'AdminController@showStore')->name("admin.store.show");

    });
});




