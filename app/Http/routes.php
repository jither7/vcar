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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
	Route::pattern('id','[0-9]+');

	# Dashboard
	Route::get('dashboard', 'DashboardController@index');

	# Categories
	Route::get('categories', 'CategoriesController@index');
	Route::post('categories/postCreate', 'CategoriesController@postCreate');
	Route::get('categories/edit/{id}', 'CategoriesController@getEdit');
	Route::post('categories/edit/{id}', 'CategoriesController@postEdit');
	Route::get('categories/delete/{id}', 'CategoriesController@getDelete');
	Route::get('categories/data', 'CategoriesController@data');

	# news
	Route::get('news', 'NewsController@index');
	Route::get('news/new', 'NewsController@getCreate');
});