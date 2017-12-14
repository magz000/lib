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


Route::get('/stores/search', 'AdminController@queryJSON')->middleware('api')->name('queryJSON') ;




Route::group(["prefix" => "admin"],function(){

    Route::get('/', 'AdminController@index')->name("admin.login");

    Route::post('login', 'AdminController@login')->name("admin.loginprocess");

    Route::group(["middleware" => ["admin", "auth"]],function(){

        Route::get('home', 'AdminController@home')->name("admin.home");

        Route::get('logout', 'AdminController@logout')->name("admin.logout");

        Route::get('stores', 'AdminController@listStores')->name("admin.stores");

        Route::get('stores/add', 'AdminController@addStore')->name("admin.stores.add");

        Route::post('stores/add', 'AdminController@addStoreProcess')->name("admin.stores.addprocess");

        Route::get('stores/{id}/show/', 'AdminController@showStore')->name("admin.stores.show");

        Route::get('stores/{id}/edit/', 'AdminController@editStore')->name("admin.stores.edit");

        Route::patch('stores/{id}/edit', 'AdminController@editStoreProcess')->name("admin.stores.editprocess");

        Route::delete('stores/{id}/delete/', 'AdminController@deleteStore')->name('admin.stores.delete');

        Route::get('stores/search', 'AdminController@query')->name('admin.stores.search');

        Route::get('stores/{id}/addemployee', 'AdminController@addEmployee')->name('admin.stores.addemployee');

        Route::post('stores/{id}/addemployee', 'AdminController@addEmployeeProcess')->name('admin.stores.addemployeeprocess');

        Route::delete('stores/{id}/deleteemployee/', 'AdminController@deleteEmployeeProcess')->name('admin.stores.deleteemployee');

    });
});

Route::group(["prefix" => "store"] , function(){

    Route::get('/', 'StoreController@index')->name("store.login");

    Route::post('login', 'StoreController@login')->name("store.loginprocess");

    Route::group(["middleware" => ["store", "auth"]],function(){

        Route::get('home', 'StoreController@home')->name("store.home");

        Route::get('logout', 'StoreController@logout')->name("store.logout");

    });

});




