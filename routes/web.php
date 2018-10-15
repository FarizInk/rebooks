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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/search', 'IndexController@search')->name('search');
Route::get('/genre/{genre}', 'IndexController@genre')->name('genre');

Auth::routes();

Route::get('/verifyemail/{token}', 'VerifyController@verify');
Route::group([
	'namespace' => 'Dashboard',
	'as' => 'dashboard.',
	'prefix' => 'dashboard'
], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@update')->name('profile.update');
    Route::post('/profile/img', 'ProfileController@updatePhoto')->name('profile.update.photo');
    Route::post('/profile/email', 'ProfileController@updateEmail')->name('profile.update.email');
    Route::post('/profile/password', 'ProfileController@updatePassword')->name('profile.update.password');
    Route::post('/profile/verify', 'ProfileController@verify')->name('profile.verify');
    Route::get('/book', 'BookController@index')->name('book');
    Route::get('/book/sell', 'BookController@create')->name('book.create');
    Route::post('/book/sell', 'BookController@store')->name('book.store');
    Route::post('/book/delete', 'BookController@destroy')->name('book.delete');
    Route::get('/book/history', 'BookController@history')->name('book.history');
    Route::get('/book/{slug}', 'BookController@show')->name('book.show');
    Route::get('/book/{slug}/edit', 'BookController@edit')->name('book.edit');
    Route::post('/book/{slug}/edit', 'BookController@update')->name('book.update');
    Route::post('/book/{slug}/editcover', 'BookController@updateCover')->name('book.update.cover');
    Route::post('/book/{slug}/sold', 'BookController@sold')->name('book.sold');
});
Route::get('/{slug}', 'IndexController@book')->name('index.book');