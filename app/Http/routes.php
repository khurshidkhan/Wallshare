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

Route::get('/', array('as' => 'index_page', 'uses' => 'ImageController@getIndex'));

Route::post('/upload', array('as' => 'index_page_post', 'before' => 'csrf', 'uses' => 'ImageController@postIndex'));

Route::get(
    'snatch/{id}',
    array(
        'as' => 'get_image_information',
        'uses' => 'ImageController@getImages'
    )
)->where('id', '[0-9]+');

Route::get('all', array('as' => 'all_images', 'uses' => 'ImageController@getAll' ));