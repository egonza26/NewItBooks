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

// Allows use blog variable throught the app
View::share('blog', App\Blog::all());

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/blog/bin', 'BlogController@bin');
Route::get('/blog/bin/{id}/restore', 'BlogController@restore');
Route::delete('/blog/bin/{id}/destroyblog', 'BlogController@destroyBlog');

Route::get('/home', 'HomeController@index');
Route::get('/blog', 'BlogController@index');
Route::patch('blog', ['as' => 'blog', 'uses' => 'BlogController@index']);
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/store', 'BlogController@store');
Route::get('/blog/{id}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');
Route::patch('/blog/{id}', 'BlogController@publish');
Route::patch('/blog/{id}', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@destroy');

Route::get('admin', 'AdminController@index');
Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);

Route::resource('categories', 'CategoryController');
Route::resource('media', 'PhotosController');