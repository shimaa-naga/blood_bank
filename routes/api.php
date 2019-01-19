<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/clients', function (Request $request) {
    return $request->user();
});


// api/v1/
Route::group(['prefix' => 'v1' , 'namespace' => 'Api'] , function(){
    Route::get('/governorates','MainController@governorates');
    Route::get('/cities','MainController@cities');
    Route::post('/register','AuthController@register');
    Route::post('/login','AuthController@login');


    // Routes need Authentication
    Route::group(['middleware' => 'auth:api'] , function(){
        Route::get('/profile/{id}','AuthController@profile');
        Route::get('/posts','MainController@posts');
        Route::post('/post_details/{id}','MainController@post_details');
        Route::get('/posts_filter/{keyword?}','Api\MainController@posts_with_filter');
        Route::get('/siteSetting','MainController@siteSetting');
    });


});
//Route::get('v1/cities','Api\MainController@cities');

