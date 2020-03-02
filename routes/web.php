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

Route::resource('/pposts', 'PublicPostsController');

Route::get('/post/{id}','AdminPostsController@post')->name('post');








Route::group(['middleware'=>'admin'], function (){

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/categories', 'AdminCategoriesController');

    Route::resource('admin/medias', 'AdminMediasController');

    Route::resource('admin/comments', 'PostCommentsController');

    Route::resource('admin/comment/replies', 'CommentRepliesController');

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');



    Route::post('comment/reply', 'CommentRepliesController@createReply');

    Route::get('/admin', function (){

        return view('admin.index');


    });

});







//Route::get('admin/medias/upload', ['as'=>'medias.upload', 'uses' => 'AdminMediasController@store']);