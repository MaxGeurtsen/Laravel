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
route::get('/', 'HomeController@index')->name('home');
Route::get('/profiel','UsersController@index')->name('profile')->middleware('auth');
route::get('user/create', function () {return view('register');})->name('register');

Route::get('/post/create', 'PostsController@create')->name('create.post')->middleware('auth');
Route::post('/post/store','PostsController@store')->name('store.post')->middleware('auth');
Route::post('/post/edit', 'PostsController@index')->name('edit.post')->middleware('auth');
Route::post('/post/active', 'PostsController@active')->name('active.post')->middleware('auth');

Route::get('/category/create','CategoriesController@index')->name('create.category')->middleware('auth');
Route::post('/category/store', 'CategoriesController@store')->name('store.category')->middleware('auth');
Route::post('/category/active','CategoriesController@active')->name('active.category')->middleware('auth');

Route::post('vote', 'QuestionsController@vote')->name('vote')->middleware('auth');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
