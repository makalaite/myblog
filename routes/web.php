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
    return view('allusersposts');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', ['as' => 'app.posts.index', 'uses' => 'MyPostsController@index']);
    Route::get('/create', ['as' => 'app.posts.create', 'uses' => 'MyPostsController@create']);
    Route::post('/create', ['as' => 'app.posts.store', 'uses' => 'MyPostsController@store']);
  Route::group(['prefix' => '{id}'], function () {
        Route::get('/show', ['as' => 'app.posts.show', 'uses' => 'MyPostsController@show']);
        Route::get('/edit', ['as' => 'app.posts.edit', 'uses' => 'MyPostsController@edit']);
        Route::post('/edit', ['uses' => 'MyPostsController@update']);
        Route::delete('/delete', ['as' => 'app.posts.destroy', 'uses' => 'MyPostsController@destroy']);
    });
});

Route::get('/post/{id}/delete', ['as' => 'post.delete', 'uses' => 'MyPostsController@destroy']);

