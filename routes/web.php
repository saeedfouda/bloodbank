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

Auth::routes();




    Route::get('/home', 'HomeController@index');
    Route::resource('governorate', 'GovernorateController');

    Route::resource('clients','ClientController');
    Route::post('clients/search', 'ClientController@search');

    Route::resource('Category', 'CategoryController');

    Route::resource('posts', 'PostsController');
    Route::post('posts/search', 'PostsController@search');


    Route::resource('cities', 'CitiesController');




    Route::resource('settings','SettingController');
    Route::resource('donations','DonationController');
    Route::resource('contacts','ContactController');

    Route::resource('users','UserController');
    Route::post('users/search', 'UserController@search');

             // User reset password
        Route::get('user/change-password','UserController@changePassword');
        Route::post('user/change-password','UserController@changePasswordSave');



        //Admin panel

    Route::group(['middleware'=>'auth' , 'prefix'=>'users'],function() {

        Route::get('/home', 'HomeController@index');
        Route::resource('governorate', 'GovernorateController');
        Route::resource('clients','ClientController');
        Route::resource('Category', 'CategoryController');
        Route::resource('posts', 'PostsController');
        Route::resource('cities', 'CitiesController');
        Route::resource('settings','SettingController');
        Route::resource('donations','DonationController');
        Route::resource('contacts','ContactController');



             // User reset password
             Route::get('user/change-password','UserController@changePassword');
             Route::post('user/change-password','UserController@changePasswordSave');


    });

