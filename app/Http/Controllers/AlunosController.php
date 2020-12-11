<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estado;
use App\Cidade;
use App\Turma;
use App\Deficiencia;
use App\Alunos;




class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


if($request->contrato != "" && $request->nome_aluno != "" && $request->sexo != ""
    && $request->dt_nascimento != "" && $request->endereco != "" && $request->nome_mae != ""
    && $request->nome_pai != "" && $request->estado != "" && $request->cidade != ""  
    && $request->email != "" && $request->telefone != "" && $request->turma != ""  
    && $request->deficiencia != "" && $request->obs != "")

{


$contra = alunos::where('contrato',$request->contrato)->first();


if(!$contra)
{
        alunos::create([
        'contrato' => $request->contrato,
        'nome_aluno' => $request->nome_aluno,
        'sexo' => $request->sexo,
        'dt_nascimento' => $request->dt_nascimento,
        'endereco' => $request->endereco,
        'nome_mae' => $request->nome_mae,
        'nome_pai' => $request->nome_pai,
        'estado' => $request->estado,
        'cidade' => $request->cidade,
        'email' => $request->email,
        'telefone' => $request->telefone,
        'turma' => $request->turma,
        'deficiencia' => $request->deficiencia,
        'obs' => $request->obs

        ]);

        $retorno["message"] = "Registro incluído com sucesso";
        return response()->json($retorno);
    }
    else
    {
        $retorno["message"] = "Esse contrato já existe no banco de dados";
        return response()->json($retorno);

    }
}
else
{
 $retorno["message"] = "Verifique campos em branco";
 return response()->json($retorno);

}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contra = alunos::where('contrato',$request->contrato)->first();



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
if($request->contrato != "" && $request->nome_aluno != "" && $request->sexo != ""
    && $request->dt_nascimento != "" && $request->endereco != "" && $request->nome_mae != ""
    && $request->nome_pai != "" && $request->estado != "" && $request->cidade != ""  
    && $request->email != "" && $request->telefone != "" && $request->turma != ""  
    && $request->deficiencia != "" && $request->obs != "")

{


$contra = DB::table('alunos')->where('id','=',[$id])->get()->first();


if($contra)
{

    alunos::find($id)->update($request->all());

      $retorno["message"] = "Registro incluído com sucesso";
      return response()->json($retorno);
    }
    else
    {
        $retorno["message"] = "Esse contrato não está no banco de dados";
        return response()->json($retorno);

    }
}
else
{
 $retorno["message"] = "Verifique campos em branco";
 return response()->json($retorno);

}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
      $alunos = alunos::findOrFail($id);
      $alunos->delete();

      $deficiencias = deficiencia::get()->unique();
      $turmas = turma::get()->unique();
            
      return redirect()->back()->with('alunos.listar',compact('bancos','turmas','deficiencias'));

        
    }




}
