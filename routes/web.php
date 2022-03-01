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

Route::get('/hello', 'HelloController@hello');

Route::get('/bbs', 'BbsController@index');
Route::post('/bbs', 'BbsController@create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addthumb', 'AddthumbController@index');
Route::post('/addthumb', 'AddthumbController@thumbUpdate');

Route::name('post.')->group(function(){
    Route::get('/posts/new','PostController@postaddPage')->name('new');
    Route::post('/posts', 'PostController@postAdd')->name('add');
    Route::delete('/posts/{post_id}','PostController@postDelete')->name('delete');    
});

Route::name('like.')->group(function(){
    Route::post('/likeadd','LikeController@likeAdd')->name('add');
    Route::delete('/likecancel','LikeController@likeCancel')->name('cancel');
    Route::get('/likes/{post_id}','LikeController@index')->name('index');    
});


Route::get('/profile/{user_id}','UserController@index')->name('profile');