<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
route::get('/home', 'HomeController@index')->name('home');
route::get('/', 'HomeController@index')->name('home');
Route::get('/profiel','UsersController@index')->name('profile')->middleware('auth');
route::get('user/create', function () {return view('register');})->name('register');

Route::get('/post/create', 'PostsController@create')->name('create.post')->middleware('auth');
Route::post('/post/store','PostsController@store')->name('store.post')->middleware('auth');
Route::post('/post/edit', 'PostsController@index')->name('edit.post')->middleware('auth');
Route::post('/post/active', 'PostsController@active')->name('active.post')->middleware('auth');
Route::post('/post/filter','PostsController@filter')->name('filter.posts');

Route::get('/category/create','CategoriesController@index')->name('create.category')->middleware('is_admin');
Route::post('/category/store', 'CategoriesController@store')->name('store.category')->middleware('is_admin');
Route::post('/category/active','CategoriesController@active')->name('active.category')->middleware('is_admin');

Route::get('/users', 'UsersController@indexAll')->name('users')->middleware('is_admin');
Route::post('/users/detail','UsersController@show')->name('users.show')->middleware('is_admin');
Route::post('/users/edit','UsersController@edit')->name('users.edit')->middleware('is_admin');

Route::post('vote', 'QuestionsController@vote')->name('vote')->middleware('auth');

Auth::routes();


