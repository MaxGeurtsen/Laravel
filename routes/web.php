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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', 'AboutController@show')->name('about');
route::get('/news', 'NewsController@show')->name('news');
Route::get('/add', 'AddController@show')->name('add');
Route::get('/detail', 'DetailController@show')->name('detail');
