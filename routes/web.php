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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@getResults');
Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile.index');
Route::get('/profile/edit', 'ProfileController@getEdit')->name('profile.edit');
Route::post('/profile/edit', 'ProfileController@postEdit');
Route::get('/friends', 'FriendController@getIndex');
Route::get('/friends/add/{username}', 'FriendController@getAdd');
Route::get('/friends/accept/{username}', 'FriendController@getAccept');
