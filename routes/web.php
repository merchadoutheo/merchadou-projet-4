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
Route::get('/showBillet/{id}', 'PostController@show')->name('billet.voir');
Route::post('/sendComment/{id}', 'CommentController@send')->name('billet.comment');

Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth',
	'namespace' => 'Admin'
], function($router) {
	/**
	 * Gestion des Billets
	 */
	Route::get('/','PostController@index')->name('accueil.admin');
	Route::get('/ChangeStatut/Billet/{id}','PostController@ChangeStatut')->name('billet.changeStatut');
	Route::get('/AjouterUnBillet', 'PostController@AjoutBillet')->name('billet.formAjout');
	Route::post('/SendBillet', 'PostController@send')->name('billet.ajout');
	Route::get('/SupressionBillet/{id}', 'PostController@suppression')->name('billet.supprimer');
	Route::get('/ModifierBillet/{id}', 'PostController@edition')->name('billet.edition');
	Route::post('/updateBillet/{id}', 'PostController@update')->name('billet.update');

	/**
	 * Gestion des Commentaires
	 */
	Route::get('/Commentaires','CommentController@index')->name('index.commentaire');
	Route::get('/ChangeStatut/Commentaire/{id}', 'CommentController@changeStatut')->name('commentaire.changeStatut');
	Route::get('/suppressionCommentaire/{id}', 'CommentController@suppression')->name('commentaire.supprimer');
	Route::get('/VoirCommentaire/{id}','CommentController@voirCommentaire')->name('commentaire.voir');

});