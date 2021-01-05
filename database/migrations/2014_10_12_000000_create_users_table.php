<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cadastrar')->default('NAO');
            $table->string('ciclo')->default('NAO');
            $table->string('detalhes')->default('NAO');
            $table->string('editar')->default('NAO');
            $table->string('env_email')->default('NAO');
            $table->string('excluir')->default('NAO');
            $table->string('historico')->default('NAO');
            $table->string('imprimir')->default('NAO');
            $table->string('master')->default('NAO');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
