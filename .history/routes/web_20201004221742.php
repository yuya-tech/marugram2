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

// ==========ここから編集する==========
// コメントアウトする
// Route::get('/home', 'HomeController@index')->name('home');

// このコードを追加する
Route::get('/home', 'PostsController@index');
// ==========ここまで編集する==========

// ユーザ編集画面
Route::get('/users/edit', 'UsersController@edit');

// ユーザ詳細画面
Route::get('/users/{user_id}', 'UsersController@show');

// ==========ここから追加する==========
// 投稿新規画面
Route::get('/posts/new', 'PostsController@new')->name('new');

// 投稿新規処理
Route::post('/posts', 'PostsController@store');
// ==========ここまで追加する==========
