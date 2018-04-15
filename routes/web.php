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
    return view('homes.home');
});

Route::group(['namespace' => 'Users'], function () {
   Route::get('users', 'UsersController@index')->name('users');
})

;Route::group(['namespace' => 'Tutorials'], function () {
   Route::get('tutorials', 'TutorialsController@index')->name('tutorials');
});

Route::group(['namespace' => 'Posts', 'prefix' => 'blog'], function () {
   Route::get('', 'PostsController@index')->name('blog');
   Route::get('{category}', 'PostsController@index');
   Route::get('{category}/{post}', 'PostsController@show')->name('post');
   Route::get('{category}/{post}/edit', 'PostsController@edit');
   Route::put('{category}/{post}', 'PostsController@update');
   Route::delete('{category}/{post}', 'PostsController@destroy');

   Route::get('{category}/{post}/comment', 'CommentsController@index');
   Route::post('{category}/{post}/comment', 'CommentsController@store');
   Route::patch('{category}/{post}/{comment}/comment', 'CommentsController@update');
   Route::delete('{category}/{post}/{comment}/comment', 'CommentsController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
