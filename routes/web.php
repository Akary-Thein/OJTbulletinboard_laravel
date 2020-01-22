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
    return view('auth/login');
});

Auth::routes();

Route::resource('users', 'User\UserController');

Route::resource('posts', 'Post\PostController');
Route::post('/confirmpost', 'Post\PostController@confirmPostCreateForm')->name('posts.confirmPostCreateForm');
Route::get('/searchpost', 'Post\PostController@searchPost')->name('posts.searchPost');
Route::post('/downloadpost','Post\PostController@downloadPost')->name('posts.downloadPost');
Route::get('/uploadpostform', 'Post\PostController@uploadPostForm')->name('posts.uploadPostForm');
Route::post('/uploadpost', 'Post\PostController@uploadPost')->name('posts.uploadPost');
