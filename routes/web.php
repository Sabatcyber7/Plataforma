<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index');

	Auth::routes();
        // Route named "admin::dashboard"
Route::get('/home', 'HomeController@index')->name('home');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cad_alunos', 'HomeController@cad_alunos')->name('cad_alunos');
Route::get('/cidades/{id}', 'HomeController@cidades');
Route::get('/responsaveis', 'HomeController@responsaveis')->name('responsaveis');

Route::any('/insert_alunos', 'HomeController@insert_alunos')->name('insert_alunos');
Route::get('/pesquisa_aluno/{id}', 'HomeController@pesquisa_aluno')->name('pesquisa_aluno');
Route::get('/turma/{id}', 'HomeController@turma')->name('turma');
Route::get('/deficiencia/{id}', 'HomeController@deficiencia')->name('deficiencia');
