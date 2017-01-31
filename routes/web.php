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

Auth::routes();
Route::get('/', 'PostController@index')->name('accueil');
Route::get('/home', 'HomeController@index');
Route::get('/showBillet/{id}', 'PostController@show');
Route::post('/sendComment/{id}', 'CommentController@send')->name('billet.comment');

Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth'
], function($router) {

	$router->get('/', function() {
		echo 'admin';
	});

});