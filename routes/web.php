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
	'middleware' => 'auth',
	'namespace' => 'Admin'
], function($router) {
	/**
	 * Gestion des Billets
	 */
	$router->get('/','PostController@index')->name('accueil.admin');
	$router->get('/ChangeStatut/Billet/{id}','PostController@ChangeStatut')->name('billet.changeStatut');
	$router->get('/AjouterUnBillet', 'PostController@AjoutBillet')->name('billet.formAjout');
	$router->post('/SendBillet', 'PostController@send')->name('billet.ajout');
	$router->get('/SupressionBillet/{id}', 'PostController@suppression')->name('billet.supprimer');
	$router->get('/ModifierBillet/{id}', 'PostController@edition')->name('billet.edition');
	$router->post('/updateBillet/{id}', 'PostController@update')->name('billet.update');

	/**
	 * Gestion des Commentaires
	 */
	$router->get('/Commentaires','CommentController@index')->name('index.commentaire');
	$router->get('/ChangeStatut/Commentaire/{id}', 'CommentController@changeStatut')->name('commentaire.changeStatut');
	$router->get('/suppressionCommentaire/{id}', 'CommentController@suppression')->name('commentaire.supprimer');
	$router->get('/VoirCommentaire/{id}','CommentController@voirCommentaire')->name('commentaire.voir');

});