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


// Login
Route::get('/login', 'loginController@login')->name('login');
Route::get('/callback', 'loginController@callback');


// Playlists
Route::get('/playlist/{playlistId}', 'playlistsController@getPlaylist')->name('getPlaylist')->middleware('checkLogin');
Route::get('/backToPlaylists', 'playlistsController@backToPlaylists')->name('backToPlaylists')->middleware('checkLogin');
Route::get('/playlists', 'playlistsController@getplaylists')->name('getPlaylists')->middleware('checkLogin');


// Search
Route::get('/search/', 'searchController@getSearch')->name('getSearch')->middleware('checkLogin');


// Songs
Route::get('/putSong/{playlistId}/{trackId}', 'songsController@putSong')->name('putSong')->middleware('checkLogin');


// Index
Route::get('/', 'indexController@getIndex')->name('index')->middleware('checkLogin');

