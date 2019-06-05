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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list-group', 'GroupController@show')->name('list-group');
Route::post('/list-book', 'GroupController@store')->name('post-list');
Route::get('/listOfBook/{group}','GroupController@listOfBook')->name('list-book');
Route::post('/addBook/{group}','BookController@addBookFromGroup')->name('add-book');
// Route::get('forum','ForumController@show')->name('forum');




//Route::get('/logout', 'Auth\LoginController@logout ')->name('logout');
