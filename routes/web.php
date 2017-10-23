<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|   Configuration des routes
*/
/*
* Le Controller gérant Les utilisateurs non connectés  ou visiteurs
* est Appellé  vue_client
 */
//  Route pour la vue Utilisateur Connecté

// route pour la vue utilisateur non connecté (& aussi connecté)
Route::get('/',[
    'as' => 'infos_acceuil',
    'uses'=> 'vue_client@home',
]);
Route::get('/actualites',[
    'as' => 'infos_news',
    'uses'=> 'vue_client@actualites',
]);
Route::get('/concours',[
    'as' => 'infos_concours',
    'uses'=> 'vue_client@annonces_concours',
]);
Route::get('/connection',[
    'as' => 'infos_connection',
    'uses'=> 'vue_client@annonces_connection',
]);
Route::get('/ecole',[
    'as' => 'infos_ecole',
    'uses'=> 'vue_client@annonces_ecole',
]);
Route::get('/emplois',[
    'as' => 'infos_emplois',
    'uses'=> 'vue_client@annonces_emplois',
]);
Route::get('/emplois',[
    'as' => 'infos_emplois',
    'uses'=> 'vue_client@annonces_emplois',
]);
Route::get('/filieres',[
    'as' => 'infos_filieres',
    'uses'=> 'vue_client@annonces_filieres',
]);
Route::get('/forum',[
    'as' => 'infos_forum',
    'uses'=> 'vue_client@annonces_forum',
]);
Route::get('/inscription',[
    'as' => 'infos_inscription',
    'uses'=> 'vue_client@annonces_inscription',
]);
Route::get('/stage',[
    'as' => 'infos_stage',
    'uses'=> 'vue_client@annonces_stage',
]);

/*
* Le Controller gérant Les utilisateurs connectés
* est Appellé  HomeController
 */
//  Route pour la vue Utilisateur Connecté

Route::get('/profil',[
    'as' => 'infos_profil',
    'uses'=> 'HomeController@annonces_profil',
]);
//  Route permettant l'upload de l'image du profil
Route::post('/profil',[
    'as' => 'infos_profil',
    'uses'=> 'HomeController@mise_a_jour_avatar',
]);
//  Route permettant l'upload de l'image du profil


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
