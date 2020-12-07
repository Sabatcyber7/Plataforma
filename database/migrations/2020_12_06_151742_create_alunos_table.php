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
            
            $table->string('nome_aluno');
            $table->string('cpf');
            $table->string('sexo');
            $table->string('dt_nascimento');
            $table->string('endereco');
            $table->string('nome_mae');
            $table->string('nome_pai');
            $table->string('estado');
            $table->string('cidade');
            $table->string('email');
            $table->string('telefone');
            $table->string('turma');
            $table->string('deficiencia');
            $table->string('obs');

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
