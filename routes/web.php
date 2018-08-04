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


Route::group(['namespace' => 'Auth'], function () {
   Route::get('register', 'RegistersController@create')->name('register');
   Route::post('register', 'RegistersController@store');
   Route::get('login', 'LoginsController@create')->name('login');
   Route::post('login', 'LoginsController@store');
   Route::post('signin', 'LoginsController@signin');
Route::get('logout', 'LoginsController@destroy')->name('logout');
Route::get('validation/{user}/{token}', 'LoginsController@validation');

Route::get('forget', 'ForgetController@create')->name('forget');
Route::post('forget', 'ForgetController@store');
Route::get('forget/{user}/{reset}', 'ForgetController@edit');
Route::put('forget/{user}/{reset}', 'ForgetController@update');

Route::get('confirmation', 'ConfirmationController@create')->name('confirmation');
Route::post('confirmation', 'ConfirmationController@store');
});


Route::group(['namespace' => 'Users'], function () {
   Route::get('users', 'UsersController@index')->name('users');
});

;Route::group(['namespace' => 'Tutorials'], function () {
   Route::get('tutorials', 'TutorialsController@index')->name('tutorials');
});

Route::group(['namespace' => 'Posts', 'prefix' => 'blog'], function () {
   Route::get('', 'PostsController@index')->name('blog');
   Route::get('create', 'PostsController@create')->name('post.create');
   Route::post('store', 'PostsController@store')->name('post.store');
   Route::get('{category}', 'PostsController@index');
   Route::get('{category}/{post}', 'PostsController@show')->name('post');
   Route::get('{category}/{post}/edit', 'PostsController@edit');
   Route::patch('{category}/{post}', 'PostsController@update');
   Route::delete('{category}/{post}', 'PostsController@destroy');

   // Comments
   Route::get('{category}/{post}/comments', 'CommentsController@index');
   Route::put('{category}/{post}/{comment}', 'CommentsController@update');
   Route::delete('{category}/{post}/{comment}', 'CommentsController@destroy');


});

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
