<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contrato');
            $table->string('nome_aluno');
            $table->string('sexo');
            $table->string('dt_nascimento');
            $table->string('mes');
            $table->string('endereco');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('email');
            $table->string('telefone');
            $table->string('turma');
            $table->string('perfil');
            $table->string('status');
            $table->longText('obs');
            $table->longText('historico');
            $table->string('dt_cadastro');
            $table->string('usuario');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
