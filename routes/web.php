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

Route::namespace('BackEnd')->prefix('admin')->group(function () {
    Route::get('home', 'Home@index')->name('admin.home');
    Route::resource('users', 'Users');
    Route::resource('categories', 'Categories');
    Route::resource('skills', 'Skills');
    Route::resource('tags', 'Tags');
    Route::resource('videos', 'Videos');
    Route::resource('posts', 'Posts');
    Route::resource('playlists', 'Playlists');


    Route::post('videocomments', 'Comments@store')->name('videoscomment.store');
    Route::get('videocomments/{id}', 'Comments@delete')->name('videoscomment.delete');
    Route::post('videocomments/{id}', 'Comments@update')->name('videoscomment.update');

    Route::post('postcomments', 'Comments@poststore')->name('postscomment.store');
    Route::get('postcomments/{id}', 'Comments@postdelete')->name('postscomment.delete');
    Route::post('postcomments/{id}', 'Comments@postupdate')->name('postscomment.update');

    Route::post('playlistcomments', 'Comments@playliststore')->name('playlistscomment.store');
    Route::get('playlistcomments/{id}', 'Comments@playlistdelete')->name('playlistscomment.delete');
    Route::post('playlistcomments/{id}', 'Comments@playlistupdate')->name('playlistscomment.update');




    Route::get('/trashedvideos', 'Videos@trashed')->name('trashedvideos.index');
    Route::get('/trashedvideos/{id}', 'Videos@destroyvideo')->name('trashedvideos.destroy');
    Route::get('/restoredvideo/{id}', 'Videos@restorevideo')->name('trashedvideos.restore');

    Route::get('/trashedposts', 'Posts@trashed')->name('trashedposts.index');
    Route::get('/trashedposts/{id}', 'Posts@destroypost')->name('trashedposts.destroy');
    Route::get('/restoredposts/{id}', 'Posts@restorepost')->name('trashedposts.restore');

    Route::get('/trashedplaylists', 'Playlists@trashed')->name('trashedplaylists.index');
    Route::get('/trashedplaylists/{id}', 'Playlists@destroyplaylist')->name('trashedplaylists.destroy');
    Route::get('/restoredplaylists/{id}', 'Playlists@restoreplaylist')->name('trashedplaylists.restore');

    //Route::resource('pages', 'Pages');
    //Route::resource('messages', 'Messages')->only(['index' , 'destroy' , 'edit']);
    //Route::post('messages/replay/{id}', 'Messages@replay')->name('message.replay');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('tag/{id}', 'HomeController@tags')->name('front.tags');
Route::get('video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('contact-us', 'HomeController@messageStore')->name('contact.store');
Route::get('/', 'HomeController@welcome')->name('frontend.landing');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');
