<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Estado;
use App\Cidade;
use App\Alunos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function cad_alunos(){

        $estados = DB::table('estados')->get(['id','estado'])->unique();

        return view('alunos', ['estados'=> $estados]);

        }



    public function cidades($id){

        $produto = cidade::find($id)->where('estado_id',[$id])->get();

        return response()->json($produto);
        }


    public function responsaveis(){
       
        
        $turma = DB::table('alunos')->get(['turma'])->unique();
        $def = DB::table('alunos')->get(['deficiencia'])->unique();
        
        $bancos = DB::table('alunos')->paginate(4);

        return view('responsaveis',compact('bancos','turma','def'));
       
        }

        public function pesquisa_aluno($id){

        $turma = DB::table('alunos')->get(['turma'])->unique();
        $def = DB::table('alunos')->get(['deficiencia'])->unique();

        $bancos = DB::table('alunos')->where('cpf',[$id])->paginate(4);


        return view('responsaveis',compact('bancos','turma','def'));
       
        }


        public function turma($id){
       
        $turma = DB::table('alunos')->get(['turma'])->unique();
        $def = DB::table('alunos')->get(['deficiencia'])->unique();

        $bancos = DB::table('alunos')->where('turma',[$id])->paginate(4);

        return view('responsaveis',compact('bancos','turma','def'));
       
        }
    
    public function deficiencia($id){
       
        $turma = DB::table('alunos')->get(['turma'])->unique();
        $def = DB::table('alunos')->get(['deficiencia'])->unique();

        $bancos = DB::table('alunos')->where('deficiencia',[$id])->paginate(4);

        return view('responsaveis',compact('bancos','turma','def'));
       
        }
    
    
    public function insert_alunos(Request $request, alunos $banco)
    {


$localiza = DB::table('alunos')->where('cpf', '=', $request->cpf)->get()->first();

if(!$localiza)
{
            
            $banco->nome_aluno = $request->nome_aluno;
            $banco->cpf = $request->cpf;
            $banco->sexo = $request->sexo;
            $banco->dt_nascimento = $request->dt_nascimento;
            $banco->endereco = $request->endereco;
            $banco->nome_mae = $request->nome_mae;
            $banco->nome_pai = $request->nome_pai;
            $banco->estado = $request->estado;
            $banco->cidade = $request->cidade;
            $banco->turma = $request->turma;
            $banco->deficiencia = $request->deficiencia;
            $banco->obs = $request->obs;
            $banco->save();

            $retorno["message"] = "Registro incluído com sucesso";
            echo json_encode($retorno);

        }
        else
        {

            $retorno["message"] = "CPF já existe";
            echo json_encode($retorno);
        }
}


}
