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

Route::get('/home', function () {
    return view('home');
});

Route::get('/post_list', function () {
    return view('posts/post_list');
});

Route::get('/create_post', function () {
    return view('posts/create_post');
});

Route::get('/create_post_confirm', function () {
    return view('posts/create_post_confirm');
});

Route::get('/update_post', function () {
    return view('posts/update_post');
});

Route::get('/update_post_confirm', function () {
    return view('posts/update_post_confirm');
});

Route::get('/upload_csv', function () {
    return view('posts/upload_csv');
});

Route::get('/user_list', function () {
    return view('users/user_list');
});

Route::get('/create_user', function () {
    return view('users/create_user');
});

Route::get('/create_user_confirm', function () {
    return view('users/create_user_confirm');
});

Route::get('/user_profile', function () {
    return view('users/user_profile');
});

Route::get('/update_user', function () {
    return view('users/update_user');
});

Route::get('/update_user_confirm', function () {
    return view('users/update_user_confirm');
});

Route::get('/change_password', function () {
    return view('users/change_password');
});


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('posts','PostController');