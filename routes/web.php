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

Route::get('/ts', function () {
    return view('login');
});

Route::get('/chat', 'MessageController@index')->name('chat');
Route::get('/messages', 'MessageController@fetchMessages');
Route::post('/messages', 'MessageController@sendMessages');

Route::get('/', 'BookController@home');
Route::get('/ajax/books/', 'BookController@home');
Auth::routes();
//Forum
Route::get('/Forum', 'ThreadsController@index')->name('Forum');

Route::get('profile', 'UserController@profile')->name('profile')->middleware('auth');
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
Route::get('/listOfBook/{group}/{book}', 'BookController@showBookFromGroup')->name('show-book');
Route::put('/updateBook/{id}', 'BookController@updateBook')->name('update-Book');
Route::delete('/deleteBook/{id}', 'BookController@deleteBook')->name('delete-book');
// Route::get('forum','ForumController@show')->name('forum');

//Route::get('/logout', 'Auth\LoginController@logout ')->name('logout');

Route::get('/book/vote/{id}/{vote}', 'BookController@voted')->name('vote-book');
Route::get('/book/no-vote/{id}/', 'BookController@noVote')->name('no-vote');
Route::get('/comment/vote/{id}/{vote}', 'CommentController@voted')->name('vote-comment');

Route::post('/book/{book}/cm/', 'CommentController@commentBook')->name('cm-book');
Route::get('/cm/{id}', 'CommentController@deleteComment')->name('delete-comment');
Route::get('/cm/like/{id}', 'CommentController@likeComment')->name('like-comment');
Route::get('/cm/unlike/{id}', 'CommentController@unlikeComment')->name('unlike-comment');

