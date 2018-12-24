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

// Test
Route::get('/test', 'playController@playTrack');
Route::get('/test2', 'playController@test')->name('test');
Route::get('/ajax', 'ajaxController@test')->name('ajax');

// Login
Route::get('/login', 'loginController@login')->name('login');
Route::get('/callback', 'loginController@callback');


// Playlists
Route::get('/getTracks/{playlistId}', 'playlistsController@getTracks')->name('getTracks')->middleware('checkLogin');
Route::get('/backToPlaylists', 'playlistsController@backToPlaylists')->name('backToPlaylists')->middleware('checkLogin');
Route::get('/playlists', 'playlistsController@getplaylists')->name('getPlaylists')->middleware('checkLogin');


// Search
Route::get('/search/', 'searchController@getSearch')->name('getSearch')->middleware('checkLogin');


// Songs
Route::get('/putTrack/{playlistId}/{trackId}', 'songsController@putTrack')->name('putTrack')->middleware('checkLogin');
Route::get('/deleteTrack/{playlistId}/{trackId}', 'songsController@deleteTrack')->name('deleteTrack')->middleware('checkLogin');


// Index
Route::get('/', 'indexController@getIndex')->name('index')->middleware('checkLogin');

