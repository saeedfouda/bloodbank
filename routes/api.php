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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1','namespace' => 'Api'],function (){
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::get('governorates','MainController@governorates');
    Route::get('cities','MainController@cities');
    Route::get('categories','MainController@categories');
    Route::get('blood-types','MainController@bloodtypes');
    Route::get('settings','MainController@settings');
    Route::post('contacts','MainController@contacts');
    Route::post('orders','MainController@orders');
    Route::post('resetpassword','AuthController@resetpassword');
    Route::post('newpassword','AuthController@newpassword');


    Route::group(['middleware' => 'auth:client'],function (){
        Route::get('all-orders','MainController@allOrders');
        Route::get('get-posts','MainController@getePosts');
        Route::post('create-post','MainController@createPost');
        Route::post('profile','AuthController@profile');
        Route::post('register-token','AuthController@registerToken');
        Route::post('remove-token','AuthController@removeToken');

        Route::post('createSettings','MainController@createSettings');
        Route::get('getNotifications','MainController@getNotifications');

        Route::post('favoritePost','MainController@favoritePost');
        Route::get('getFavoritePost','MainController@getFavoritePost');



    });
});


