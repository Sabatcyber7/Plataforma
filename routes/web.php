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

Route::any('/pesquisa_nasce/{id}','PonteController@pesquisa_nasce')->name('pesquisa_nasce');
Route::any('/pesquisa_cad/{id}','PonteController@pesquisa_cad')->name('pesquisa_cad');

Route::any('/ciclo','PonteController@ciclo')->name('ciclo');
Route::any('/pesquisa_status/{id}','PonteController@pesquisa_status')->name('pesquisa_status');

Route::any('/pesquisa_bairro/{id}','PonteController@pesquisa_bairro')->name('pesquisa_bairro');

Route::any('/pesquisa_todos/{id}','PonteController@pesquisa_todos')->name('pesquisa_todos');
Route::any('/pesquisa_per/{id}','PonteController@pesquisa_per')->name('pesquisa_per');
Route::any('/lista','PonteController@lista')->name('lista'); 
Route::any('/alunos_pesq/{id}','PonteController@alunos_pesq')->name('alunos_pesq');

Route::any('/permissoes/{id}','PonteController@permissoes')->name('permissoes');


Route::any('/alunos_encaminhar/{id}','AlunosController@alunos_encaminhar')->name('alunos_encaminhar');

Route::any('/alunos/novo','AlunosController@create');
Route::any('/alunos','AlunosController@store')->name('registrar_alunos');
Route::any('/alunos_destroy/{id}','AlunosController@destroy')->name('alunos_destroy');
Route::any('/alunos_update/{id}','AlunosController@update')->name('alunos_update');

Route::any('/postar','PostagemController@create')->name('postar'); 
Route::any('/postagem/{nome}','PostagemController@localizar'); 

Route::any('/registrados/{nome}','PostagemController@registrados'); 

Route::any('/achei/{id}','PostagemController@achei'); 
Route::any('/achei_user/{id}','PostagemController@qualuser'); 

Route::any('/enviar_email/{id}', 'PonteController@enviar_email')->name('enviar_email');

Route::any('/visualizar/', 'PonteController@visualizar')->name('visualizar');

