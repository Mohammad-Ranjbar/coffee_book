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
//Forum
Route::get('/Forum', 'ThreadsController@index')->name('Forum');

Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('/threads', 'ThreadsController@index')->name('threads');
Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');
Route::delete('/threads/{channel}/{thread}', 'ThreadsController@destroy')->name('delete_thread');
Route::get('/threads/create', 'ThreadsController@create');
Route::get('/threads/{channel}', 'ThreadsController@index');
Route::post('/threads', 'ThreadsController@store');
Route::post('/threads/{channel}/{thread}/subscription', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscription', 'ThreadSubscriptionsController@destroy')->middleware('auth');
Route::post('/threads/{channel}/{thread}/addReply', 'RepliesController@store');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');
Route::delete('replies/{reply}', 'RepliesController@destroy');
Route::patch('replies/{reply}', 'RepliesController@update');

// Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');

Route::get('/profiles/{user}/notifications', 'UserNotificationsController@index');
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');

/////////////////////

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list-group', 'GroupController@show')->name('list-group');
Route::post('/list-book', 'GroupController@store')->name('post-list');
Route::get('/listOfBook/{group}', 'GroupController@listOfBook')->name('list-book');
Route::post('/addBook/{group}/{user}', 'BookController@addBookFromGroup')->name('add-book');
Route::get('/listOfBook/{group}/{book}','BookController@showBookFromGroup')->name('show-book');
// Route::get('forum','ForumController@show')->name('forum');

//Route::get('/logout', 'Auth\LoginController@logout ')->name('logout');
