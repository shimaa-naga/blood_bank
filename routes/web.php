<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gov','Api\MainController@governorates');
Route::get('/city','Api\MainController@cities');



Route::group(['middleware' => ['web','admin'], 'namespace' => 'Admin'] , function(){

    Route::get('/adminpanel','AdminController@index');

    // user as Admin
    Route::get('/adminpanel/users','UsersController@index');
    Route::get('/adminpanel/users/create','UsersController@create');
    Route::post('/adminpanel/users/create','UsersController@store');
    Route::get('/adminpanel/users/{id}/edit','UsersController@edit');
    Route::post('/adminpanel/users/{id}','UsersController@update');
    Route::get('/adminpanel/users/{id}/delete','UsersController@delete');

    Route::get('/adminpanel/logout','UsersController@logout');

    // Clients
    Route::get('/adminpanel/clients','ClientsController@index');
    Route::get('/adminpanel/client/create','ClientsController@create');
    Route::post('/adminpanel/client/create','ClientsController@store');
    Route::get('/adminpanel/client/{id}/edit','ClientsController@edit');
    Route::post('/adminpanel/client/{id}','ClientsController@update');
    Route::get('/adminpanel/client/{id}/pan','ClientsController@pan');

    // Orders
    Route::get('/adminpanel/orders','OrdersController@index');
    Route::get('/adminpanel/order/{id}/details','OrdersController@order_details');
    Route::get('/adminpanel/order/{id}/delete','OrdersController@delete');


    // Contacts
    Route::get('/adminpanel/contacts','ContactsController@index');
    Route::get('/adminpanel/contact/{id}/details','ContactsController@contact_details');


    //setting site
    Route::get('/adminpanel/sitesetting','SiteSettingController@index');
    Route::post('/adminpanel/sitesetting','SiteSettingController@updateSettings');
    //Route::post('/updateSettings/{id}','MainController@updateSettings');

});

Route::group(['middleware' => 'web'], function(){

    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });


    Route::get('/home', 'HomeController@index')->name('home');
});
//Route::get('/siteSetting', 'Api\MainController@siteSetting');
Route::get('/posts_filter/{keyword?}','Api\MainController@posts_with_filter');