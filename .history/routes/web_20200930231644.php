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

Route::get('/', 'PostsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ==========ここから追加する==========
//ユーザ編集画面
Route::get('/users/edit', 'UsersController@edit');
//ユーザ更新画面
Route::post('/users/update', 'UsersController@update');
// ==========ここまで追加する==========

//ユーザ詳細画面
Route::get('/users/{user_id}', 'UsersController@show');
