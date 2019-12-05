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

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/login','PagesController@login')->name('login');
Route::get('/register','PagesController@signup');
Route::get('/logout','PagesController@logout')->name('logout');

Route::get('/user','UserController@index')->name('userHome');

Route::get('/read-post/{id}','PostController@readPost')->name('readPost');
Route::get('/delete-post/{id}/{url}','PostController@deletePost')->name('deletePost');

Route::post('/create-user','UserController@create')->name('createUser');
Route::post('/update-user','UserController@update')->name('updateUser');
Route::post('/check-user','UserController@check')->name('checkUser');

Route::post('/create-post','PostController@create')->name('createPost');
