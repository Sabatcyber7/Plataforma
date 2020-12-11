<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index');

	Auth::routes();
        // Route named "admin::dashboard"
Route::get('/home', 'HomeController@index')->name('home');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/ponte','PonteController@ponte')->name('ponte'); 
Route::any('/cidades/{id}','PonteController@cidades'); 
Route::any('/consulta/{id}','PonteController@pesquisar'); 
Route::any('/pesquisa_turma/{id}','PonteController@pesquisa_turma')->name('pesquisa_turma');
Route::any('/pesquisa_todos/{id}','PonteController@pesquisa_todos')->name('pesquisa_todos');
Route::any('/pesquisa_def/{id}','PonteController@pesquisa_def')->name('pesquisa_def');
Route::any('/lista','PonteController@lista')->name('lista'); 
Route::any('/alunos_pesq/{id}','PonteController@alunos_pesq')->name('alunos_pesq');


Route::any('/alunos/novo','AlunosController@create');
Route::any('/alunos','AlunosController@store')->name('registrar_alunos');
Route::any('/alunos_destroy/{id}','AlunosController@destroy')->name('alunos_destroy');
Route::any('/alunos_update/{id}','AlunosController@update')->name('alunos_update');


