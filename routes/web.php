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
    Route::resource('roles', 'Roles');
    Route::post('videocomments', 'Comments@store')->name('videoscomment.store');
    Route::get('videocomments/{id}', 'Comments@delete')->name('videoscomment.delete');
    Route::post('videocomments/{id}', 'Comments@update')->name('videoscomment.update');

    Route::post('postcomments', 'Comments@poststore')->name('postscomment.store');
    Route::get('postcomments/{id}', 'Comments@postdelete')->name('postscomment.delete');
    Route::post('postcomments/{id}', 'Comments@postupdate')->name('postscomment.update');

    Route::post('playlistcomments', 'Comments@playliststore')->name('playlistscomment.store');
    Route::get('playlistcomments/{id}', 'Comments@playlistdelete')->name('playlistscomment.delete');
    Route::post('playlistcomments/{id}', 'Comments@playlistupdate')->name('playlistscomment.update');




    Route::get('/trashedvideos', 'Videos@trashedItem')->name('trashedvideos.index');
    Route::get('/trashedvideos/{id}', 'Videos@destroyTrash')->name('trashedvideos.destroy');
    Route::get('/restoredvideo/{id}', 'Videos@restore')->name('trashedvideos.restore');

    Route::get('/trashedposts', 'Posts@trashedItem')->name('trashedposts.index');
    Route::get('/trashedposts/{id}', 'Posts@destroyTrash')->name('trashedposts.destroy');
    Route::get('/restoredposts/{id}', 'Posts@restore')->name('trashedposts.restore');

    Route::get('/trashedplaylists', 'Playlists@trashedItem')->name('trashedplaylists.index');
    Route::get('/trashedplaylists/{id}', 'Playlists@destroyTrash')->name('trashedplaylists.destroy');
    Route::get('/restoredplaylists/{id}', 'Playlists@restore')->name('trashedplaylists.restore');
    Route::get('/trashedItems', function (){
        $plays=App\Models\Playlist::withTrashed()->count();
        $trashpalys=App\Models\Playlist::onlyTrashed()->count();
        $vids=App\Models\Video::withTrashed()->count();
        $trashvids=App\Models\Video::onlyTrashed()->count();
        $posts=App\Models\Post::withTrashed()->count();
        $trashposts=App\Models\Post::onlyTrashed()->count();
        return view('back-end.trashed.index',compact('plays',
            'trashpalys','vids','trashvids','posts','trashposts'));
    })->name('trashedItems.index');

    Route::get('/secitems', function (){
        $tags=App\Models\Tag::all()->count();
        $skills=App\Models\Skill::all()->count();
        $cat=App\Models\Category::all()->count();
        return view('back-end.adminTasks.addOperations',compact('cat','tags','skills'));
    })->name('secitems.index');


    Route::get('/controls', function (){
        $numAdmins=App\Models\User::all()->count();
        $numRoles=App\Models\Role::all()->count();
        return view('back-end.adminTasks.index',compact('numAdmins','numRoles'));
    })->middleware(['role:super_admin'])->name('controls.index');



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');



