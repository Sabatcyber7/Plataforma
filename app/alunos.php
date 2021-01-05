<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alunos extends Model
{
	protected $fillable = ['contrato','nome_aluno','sexo','dt_nascimento','endereco','estado','cidade','email','telefone','turma','obs','timestamps','historico','dt_cadastro','perfil','mes','status','usuario','bairro'];

}
