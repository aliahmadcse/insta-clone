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

// axios asynchrous request route for following
Route::post('/follow', 'FollowsController@store');

// show profile route
Route::get('/profile/{user}', 'ProfilesController@index')
    ->name('profile.show');

Route::get('profile/{user}/edit', 'ProfilesController@edit')
    ->name('profile.edit');

Route::patch('profile/{user}', 'ProfilesController@update')
    ->name('profile.update');

// post routes

Route::get('/p/create', 'PostsController@create')->name('p.create');

Route::post('/p', 'PostsController@store')->name('p.store');

Route::get('p/{post}', 'PostsController@show')->name('p.show');
