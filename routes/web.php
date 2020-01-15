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

use App\Genre;
use App\Http\Resources\GenreResource;
use App\Http\Resources\SerieResource;
use App\Serie;

Auth::routes();


Route::get('/', 'MainController@index')->name('home');
Route::resource('series', 'ListeSerieController');
Route::any('/', 'MainController@accueil')->name('accueil');
Route::get('/user', 'MainController@profil')->name('user');
Route::resource('comments', 'CommentController');



Route::resource('/profil', 'UserController');

Route::get('episodes/{episode}/seenEpisode','EpisodeController@seenEpisode')->name('episode.seenEpisode');
Route::resource('episodes', 'EpisodeController');