<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alunos extends Model
{
	protected $fillable = ['contrato','nome_aluno','sexo','dt_nascimento','endereco','nome_mae','nome_pai','estado','cidade','email', 'telefone','turma','deficiencia','obs'];

}
