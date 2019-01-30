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
    Route::post('/register','AuthController@register');
    Route::post('/login','AuthController@login');

    Route::post('/reset_password','AuthController@reset');
    Route::post('/new_password','AuthController@password');

    Route::get('/bloodtype','MainController@bloodtype');




    // Routes need Authentication
    Route::group(['middleware' => 'auth:api'] , function(){
        Route::get('/profile/{id}','AuthController@getprofile');
        Route::get('/governorates','MainController@governorates');
        Route::get('/cities','MainController@cities');
        Route::get('/posts','MainController@posts');
        Route::post('/post_details/{id}','MainController@post_details');
        Route::get('/posts_filter/{keyword?}','Api\MainController@posts_with_filter');
        Route::get('/categories','MainController@categories');
        Route::get('/list_orders','MainController@list_orders');
        Route::post('/order_details/{id}','MainController@order_details');
        Route::post('/create_order','MainController@create_order');
        Route::get('/listOfNotificatios','MainController@listOfNotificatios');

        Route::post('/post_favourite','MainController@postFavourite');
        Route::post('/myFavourites_posts','MainController@myFavourites');



        Route::get('/siteSetting','MainController@siteSetting');

    });


});
//Route::get('v1/cities','Api\MainController@cities');

