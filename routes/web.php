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



Route::group(['middleware' => ['web','admin']] , function(){

    Route::get('/adminpanel','admin\AdminController@index');
    // user as Admin
    Route::get('/adminpanel/users','admin\UsersController@index');
    Route::get('/adminpanel/create','admin\UsersController@create');
    Route::post('/adminpanel/create','admin\UsersController@store');
    Route::get('/adminpanel/users/{id}/edit','admin\UsersController@edit');
    Route::post('/adminpanel/users/{id}','admin\UsersController@update');
    Route::get('/adminpanel/users/{id}/delete','admin\UsersController@delete');

    // Clients
    Route::get('/adminpanel/clients','admin\ClientsController@index');



    //setting site
    Route::get('/adminpanel/sitesetting','admin\SiteSettingController@index');
    Route::post('/adminpanel/sitesetting','admin\SiteSettingController@store');

});

Route::group(['middleware' => 'web'], function(){

    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });


    Route::get('/home', 'HomeController@index')->name('home');
});