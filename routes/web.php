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

Route::get('/addpost','PostController@postaddPage');
Route::post('/addpost', 'PostController@postAdd');

Route::post('like/{post_id}',)