<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estado;
use App\Cidade;
use App\Turma;
use App\Deficiencia;
use App\Alunos;


class PonteController extends Controller
{
   public function ponte(){

        $estados = estado::get()->unique();
        $deficiencias = deficiencia::get()->unique();
        $turmas = turma::get()->unique();
        


		return view('alunos.create',compact('estados','deficiencias','turmas','tot_alunos'));

  
        }


public function cidades($id){

	    $cidades = cidade::find($id)->where('estado_id',[$id])->get();

        return response()->json($cidades); // o JSON pega todas as cidades e retorna de onde veio (alunos.create)
        }


public function pesquisar($id){

		$nomes = DB::table('estados')->where('estado', 'LIKE', "{$id}%")->orderBy('estado')->get();

        return response()->json($nomes); // o JSON pega todas as cidades e retorna de onde veio (alunos.create)
        }

public function lista(){

          $deficiencias = deficiencia::get()->unique();
          $turmas = turma::get()->unique();
          $tot_alunos = alunos::count();

          $bancos = DB::table('alunos')->orderBy('nome_aluno', 'desc')->paginate(5);

      return view('alunos.listar',compact('deficiencias','turmas','bancos'));
}

public function pesquisa_turma($id){

        $deficiencias = deficiencia::get()->unique();
        $turmas = turma::get()->unique();
        
        $bancos = DB::table('alunos')->where('turma','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);
        $tot_turma = $bancos->count();


return view('alunos.listar',compact('deficiencias','turmas','bancos','tot_turma'));

}

public function pesquisa_def($id){

        $deficiencias = deficiencia::get()->unique();
        $turmas = turma::get()->unique();
        
        $bancos = DB::table('alunos')->where('deficiencia','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);
        $tot_def = $bancos->count();


return view('alunos.listar',compact('deficiencias','turmas','bancos','tot_def'));

}


public function pesquisa_todos($id){

        $deficiencias = deficiencia::get()->unique();
        $turmas = turma::get()->unique();
        $tot_alunos = alunos::count();

        if($id != 0)
        {
        $bancos = DB::table('alunos')->where('contrato','=',[$id])->orderBy('nome_aluno', 'desc')->paginate(5);
        }
        else
        {
        $bancos = DB::table('alunos')->orderBy('nome_aluno', 'desc')->paginate(5);    
        }
return view('alunos.listar',compact('deficiencias','turmas','bancos'));

}

public function alunos_pesq($id)
{
        $estados = estado::get()->unique();
        $deficiencias = deficiencia::get()->unique();
        $turmas = turma::get()->unique();
        

$bancos = DB::table('alunos')->where('id','=',[$id])->get()->first();

return view('alunos.update',compact('estados','deficiencias','turmas','bancos','id'));


}


}
