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
    Route::resource('users', 'Users')->except(['show']);
    Route::resource('categories', 'Categories')->except(['show']);
    Route::resource('skills', 'Skills')->except(['show']);
    Route::resource('tags', 'Tags')->except(['show']);
    Route::resource('pages', 'Pages')->except(['show']);
    Route::resource('videos', 'Videos')->except(['show']);
    Route::resource('posts', 'Posts')->except(['show']);
    Route::resource('posts', 'Posts')->except(['show']);
    Route::resource('messages', 'Messages')->only(['index' , 'destroy' , 'edit']);

    Route::post('videocomments', 'Comments@store')->name('videoscomment.store');
    Route::get('videocomments/{id}', 'Comments@delete')->name('videoscomment.delete');
    Route::post('videocomments/{id}', 'Comments@update')->name('videoscomment.update');

    Route::post('postcomments', 'Comments@poststore')->name('postscomment.store');
    Route::get('postcomments/{id}', 'Comments@postdelete')->name('postscomment.delete');
    Route::post('postcomments/{id}', 'Comments@postupdate')->name('postscomment.update');


    Route::post('messages/replay/{id}', 'Messages@replay')->name('message.replay');


    Route::get('/trashedvideos', 'Videos@trashed')->name('trashedvideos.index');
    Route::get('/trashedvideos/{id}', 'Videos@destroyvideo')->name('trashedvideos.destroy');
    Route::get('/restoredvideo/{id}', 'Videos@restorevideo')->name('trashedvideos.restore');

    Route::get('/trashedposts', 'Posts@trashed')->name('trashedposts.index');
    Route::get('/trashedposts/{id}', 'Posts@destroypost')->name('trashedposts.destroy');
    Route::get('/restoredposts/{id}', 'Posts@restorepost')->name('trashedposts.restore');


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






