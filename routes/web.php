<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/admin-login', 'AdminController@login')->name('admin');
Route::post('/admin-login', 'AdminController@checkLogin')->name('check.admin');
Route::get('/admin-logout', 'AdminController@logout');
//film
//get
Route::get('/', 'FilmController@index');
Route::get('genre/{code}', 'FilmController@genre');
Route::get('film/{id}', 'FilmController@show');
//add
Route::get('film-add', 'FilmController@create')->name('film.add');
Route::post('film-add', 'FilmController@store')->name('film.add');
Route::get('film-edit/{id}', 'FilmController@edit')->name('film.edit');
Route::patch('film-edit/{id}', 'FilmController@update')->name('film.edit');
Route::get('film-delete/{id}', 'FilmController@destroy')->name('film.delete');


//actor
Route::get('actor/{id}', 'ActorController@show');
Route::get('actor-add', 'ActorController@create')->name('actor.add');
Route::post('actor-add', 'ActorController@store')->name('actor.add');


//comment
Route::post('comment-add/{film_id}/{user_id}', 'CommentController@store')->name('comment.new');

//favorite
Route::get('favorite/{film_id}/{user_id}', 'FavoriteController@favoriteAdd');
Route::post('favorite-add/{film_id}/{user_id}', 'FavoriteController@favoritePostAdd');
Route::get('favorites', 'FavoriteController@playlist')->middleware('auth');
Route::get('favorites/{playlist}', 'FavoriteController@favoriteGet')->middleware('auth');
