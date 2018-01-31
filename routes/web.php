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

Route::get('/', 'Controller@listReviews');

Route::get('/review', 'Controller@newReview')->name('review');

Route::get('/review/{id}', 'Controller@getReview');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
