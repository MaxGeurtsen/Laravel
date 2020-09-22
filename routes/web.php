<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/detail', 'QuestionsController@showAll')->name('detail');
route::get('user/create', function () {return view('register');})->name('register');

Route::get('/post/create', 'PostsController@index')->name('create.post');
Route::post('post/store','PostsController@store')->name('store.post');

Route::get('/category/create','CategoriesController@index')->name('create.category');
Route::post('/category/store', 'CategoriesController@store')->name('store.category');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
