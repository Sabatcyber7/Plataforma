@extends('layouts.app')

@section('responsaveis')

<div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('ponte') }}">Alunos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#">Listar alunos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Responsáveis</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#">Listar Responsáveis</a>
  </li>
</ul>
</div>
<br>



<div class="teste">


<div class="col-md-4 offset-md-0">
<label style="margin-left:0%;"><font color="#045FB4"><b>Pesquisar aluno pelo número do Contrato</b></font></label>


 &nbsp &nbsp

  <input type="text" name="chama_" id="chama_" size="10" style="text-align: right; background-color: #E6E6E6">

<button type="button" class="btn btn-sm"  onclick="todos()"><img border="0" title="Pesquisar pelo contrato do aluno" src="\img\luneta2.jpg" width="25" height="25"></button>


</div>

<table class="table-striped table-bordered table-responsive">
  <thead>
    <tr>
  <th><center><font size=1>ID</font></center></th>
  <th><center><font size=1>CONTRATO</font></center></th>
  <th><center><font size=1>NOME</font></center></th>
  <th><center><font size=1>SEXO</font></center></th>
  <th><center><font size=1>NASCIMENTO</font></center></th>
  <th><center><font size=1>MAE</font></center></th>
  <th><center><font size=1>PAI</font></center></th>
  <th><center><font size=1>ESTADO</font></center></th>
  <th><center><font size=1>CIDADE</font></center></th>
  <th><center><font size=1>ENDEREÇO</font></center></th>
  
 <th><center><font size=1>TELEFONE</font></center></th>
  <th><center><font size=1>EMAIL</font></center></th>
  

@if(isset($tot_turma))
  <th style="color:red"><center><font size=1>TURMA - {{$tot_turma}}</font></center>
@else
  <th><center><font size=1>TURMA</font></center>
@endif




    @if(isset($turmas))
    <select  style="width: 100%;" id="turma" onclick="p_turma()">
    <option ></option>  
        @foreach($turmas as $tur) 
    <option style="font-size: 10px;">{{$tur->turma}}</option>
        @endforeach 
    </select>
    @endif
  </th>

@if(isset($tot_def))
  <th style="color:red"><center><font size=1>DEFICIÊNCIA - {{$tot_def}}</font></center>
@else
  <th><center><font size=1>DEFICIÊNCIA</font></center>
@endif


  @if(isset($deficiencias))
    <select  style="width: 100%;" id="def_id" onclick="deficiente()">
    <option ></option>  
        @foreach($deficiencias as $de) 
    <option style="font-size: 10px;">{{$de->deficiencia}}</option>
        @endforeach 
    </select>
    @endif


  </th>
  <th><center><font size=1>OBS</font></center></th>
  <th><center><font size=1>EDITAR</font></center></th>
  <th><center><font size=1>EXCLUIR</font></center></th>
  
   </tr>


  </thead>
  <tbody>
    
@foreach($bancos as $banco)	
    <tr>
<td ><font size=1 color='#084B8A'> <b>{{$banco->id}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->contrato}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->nome_aluno}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->sexo}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->dt_nascimento}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->nome_mae}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->nome_pai}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->estado}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->cidade}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->endereco}}</b> </font></td>

<td ><font size=1 color='#084B8A'> <b>{{$banco->telefone}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->email}}</b> </font></td>

<td ><font size=1 color='#084B8A'> <b>{{$banco->turma}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->deficiencia}}</b> </font></td>
<td ><font size=1 color='#084B8A'> <b>{{$banco->obs}}</b> </font></td>
 <td>
<a href="{{ route('alunos_pesq', [$banco->id]) }}"><img border="0" title="Atualizar registro" src="\img\Editar.png" width="30" height="30"></a>

</td> 
 

 <td>
<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#exclusao{{$banco->id}}"><img border="0" title="Visualizar histórico do pedido" src="\img\Lixeira.png" width="25" height="25"></button>
</td> 

    </tr>

<div class="modal fade" id="exclusao{{$banco->id}}" tabindex="-1" role="dialog" aria-labelledby="exclusao" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00688B;color:#FFFAFA;">
        <img border="0" title="Excluir processo" src="\Imagens\Excluir.jpg" width="22" height="25"> &nbsp &nbsp 
        <h5 class="modal-title" id="exclusao{{$banco->id}}">ATENÇÃO - Tela de exclusão de aluno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br>
        <div class="container">
          <a href="{{ route('alunos_destroy', [$banco->id]) }}"><pre style="width: 100%;font-size: 12px; background-color: #B22222; color:#FFFAFA;"> Excluir aluno: {{$banco->nome_aluno}} - CONTRATO: {{$banco->contrato}}</pre></a>
        </div>

      </div>
      <div class="modal-footer" style="background-color:#071914;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>

@endforeach
  </tbody>
</table>
<br>

{!! $bancos->links() !!}
</div>


<br>




<script type="text/javascript">

function todos()
 {

var conteudo = document.getElementById("chama_").value;

if(conteudo == "")
conteudo = 0;

location.href = "{{route('pesquisa_todos','_conteudo_')}}".replace('_conteudo_',conteudo);

}
</script>

<script>
function p_turma()
{

var conteudo = document.getElementById("turma").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_turma','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function deficiente()
{

var conteudo = document.getElementById("def_id").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_def','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>


<script type="text/javascript">
function pescar($id) 
{

  $.get('/consulta/' + $id, function (cidades) {
  
    $('select[name=cidade]').empty();
    $.each(cidades, function (key, value) {
    
 $('select[name=cidade]').append('<option value=' + value.estado + '>' + value.estado + '</option>');   
                });
            });

} 

</script>



@endsection


