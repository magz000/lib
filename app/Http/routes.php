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



Route::get('/', 'ClientController@index')->name("public.index");

Route::auth();

Route::get('/stores/search', 'AdminController@queryJSON')->middleware('api')->name('queryJSON') ;

Route::group(["prefix" => "client"], function(){

    Route::get('/', 'ClientController@index')->name("admin.login");

    Route::post('login', 'ClientController@login')->name("client.loginprocess");

    Route::post('register', 'ClientController@register')->name("client.register");

    Route::group(["middleware" => ["client", "auth"]] , function(){
        Route::get('home', 'ClientController@home')->name("client.home");

        Route::get('logout', 'ClientController@logout')->name("client.logout");

        Route::get('profile/{id}/show', 'ClientController@profile')->name("client.profile");

        Route::get('profile/edit', 'ClientController@editProfile')->name("client.profile.edit");

        Route::patch('profile/{id}/edit', 'ClientController@editProfileProcess')->name("client.profile.editprocess");

        Route::get('users', 'ClientController@listUsers')->name("client.users");

        Route::get('stores', 'ClientController@listStores')->name("client.stores");

        Route::get('stores/search', 'ClientController@query')->name('client.stores.search');

        Route::post('stores/join/{id}/{store_id}', 'ClientController@joinGroup')->name('client.stores.join');

        Route::get('stores/{id}/show', 'ClientController@showStore')->name('client.stores.show');

        Route::get('groupchat/{id}/status', 'ClientController@getStatus')->name('client.groupchat.status');

        Route::patch('groupchat/updaterequest/{id}/{status}', 'ClientController@updateRequest')->name("client.updaterequest");


    });
});



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

        Route::get('stores/{id}/changecoverimage', 'AdminController@changeCoverImage')->name('admin.stores.changecoverimage');

        Route::patch('stores/{id}/changecoverimage', 'AdminController@changeCoverImageProcess')->name('admin.stores.changecoverimageprocess');

        Route::get('stores/{id}/addphotos', 'AdminController@addPhotos')->name('admin.stores.addphotos');

        Route::patch('stores/{id}/addphotos', 'AdminController@addPhotosProcess')->name('admin.stores.addphotosprocess');

        Route::delete('stores/{id}/deletephoto', 'AdminController@deletePhoto')->name('admin.stores.deletephoto');

        Route::get('stores/search', 'AdminController@query')->name('admin.stores.search');

        Route::get('stores/{id}/addemployee', 'AdminController@addEmployee')->name('admin.stores.addemployee');

        Route::post('stores/{id}/addemployee', 'AdminController@addEmployeeProcess')->name('admin.stores.addemployeeprocess');

        Route::delete('stores/{id}/deleteemployee/', 'AdminController@deleteEmployeeProcess')->name('admin.stores.deleteemployee');

    });
});

Route::group(["prefix" => "store"] , function(){

    Route::get('/', 'GroupController@index')->name("stores.login");

    Route::post('login', 'GroupController@login')->name("stores.loginprocess");

    Route::group(["middleware" => ["store", "auth"]],function(){

        Route::get('home', 'GroupController@home')->name("stores.home");

        Route::get('logout', 'GroupController@logout')->name("stores.logout");

        Route::get('groupchat/getrequest', 'GroupController@getRequest')->name("stores.getrequest");

        Route::get('groupchat/getrequest/pending', 'GroupController@getRequestPending')->name("stores.getrequest.pending");

        Route::get('groupchat/getrequest/accepted', 'GroupController@getRequestAccepted')->name("stores.getrequest.accepted");

        Route::get('groupchat/updaterequest/{id}/{status}', 'GroupController@updateRequest')->name("stores.updaterequest");

    });

});




