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

    Route::get('/adminpanel','admin\AdminController@index');
    // user as Admin
    Route::get('/adminpanel/users','UsersController@index');
    Route::get('/adminpanel/create','UsersController@create');
    Route::post('/adminpanel/create','UsersController@store');
    Route::get('/adminpanel/users/{id}/edit','UsersController@edit');
    Route::post('/adminpanel/users/{id}','UsersController@update');
    Route::get('/adminpanel/users/{id}/delete','UsersController@delete');

    // Clients
    Route::get('/adminpanel/clients','Admin\ClientsController@index');



    //setting site
    Route::get('/adminpanel/sitesetting','Admin\SiteSettingController@index');
    Route::post('/adminpanel/sitesetting','Admin\SiteSettingController@store');

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