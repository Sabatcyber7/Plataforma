@extends('layouts.app')

@section('responsaveis')

<div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('cad_alunos') }}">Alunos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#">Responsaveis</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Turmas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Desativado</a>
  </li>
</ul>
</div>
<br>

<div class="teste">


<div class="col-md-4 offset-md-0">
<label style="margin-left:0%;"><font color="#045FB4"><b>Pesquisar pelo Número do CPF</b></font></label>


 &nbsp &nbsp

  <input type="text" name="chama_" id="chama_" size="10" style="text-align: right; background-color: #E6E6E6">

<button type="button" class="btn btn-sm"  onclick="pedir_botao()"><img border="0" title="Pesquisar pelo cpf do aluno" src="\img\luneta2.jpg" width="25" height="25"></button>


</div>

<table class="table table-striped">
  <thead>
    <tr>
  <th><center><font size=2>ID</font></center></th>
  <th><center><font size=2>CPF</font></center></th>
  <th><center><font size=2>NOME</font></center></th>
  <th><center><font size=2>SEXO</font></center></th>
  <th><center><font size=2>NASCIMENTO</font></center></th>
  <th><center><font size=2>ENDEREÇO</font></center></th>
  <th><center><font size=2>MAE</font></center></th>
  <th><center><font size=2>PAI</font></center></th>
  <th><center><font size=2>ESTADO</font></center></th>
  <th><center><font size=2>CIDADE</font></center></th>
  <th><center><font size=2>TURMA</font></center>

    @if(isset($turma))
    <select  style="width: 100%;" id="turma" onclick="p_turma()">
    <option ></option>  
        @foreach($turma as $tur) 
    <option style="font-size: 10px;">{{$tur->turma}}</option>
        @endforeach 
    </select>
    @endif
  </th>

  <th><center><font size=2>DEFICIENCIA</font></center>
  @if(isset($def))
    <select  style="width: 100%;" id="def_id" onclick="deficiente()">
    <option ></option>  
        @foreach($def as $de) 
    <option style="font-size: 10px;">{{$de->deficiencia}}</option>
        @endforeach 
    </select>
    @endif


  </th>
  <th><center><font size=2>OBS</font></center></th>
  <th><center><font size=2>EDITAR</font></center></th>
  <th><center><font size=2>EXCLUIR</font></center></th>
  
   </tr>


  </thead>
  <tbody>
    
@foreach($bancos as $banco)	
    <tr>
<td ><font size=2 color='#084B8A'> <b>{{$banco->id}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->cpf}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->nome_aluno}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->sexo}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->dt_nascimento}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->endereco}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->nome_mae}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->nome_pai}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->estado}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->cidade}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->turma}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->deficiencia}}</b> </font></td>
<td ><font size=2 color='#084B8A'> <b>{{$banco->obs}}</b> </font></td>
 <td>
<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target=""><img border="0" title="Visualizar histórico do pedido" src="\img\Editar2.png" width="25" height="25"></button>
</td> 
 

 <td>
<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target=""><img border="0" title="Visualizar histórico do pedido" src="\img\Lixeira.png" width="25" height="25"></button>
</td> 

    </tr>
@endforeach
  </tbody>
</table>

<br>
 {{($bancos->links())}}

</div>
<br>
<br>

<br>
  
<script type="text/javascript">

function pedir_botao()
 {

var conteudo = document.getElementById("chama_").value;

if(conteudo != "")
{
location.href = "{{route('pesquisa_aluno','_conteudo_')}}".replace('_conteudo_',conteudo);
}
else
{
 location.href = "{{route('responsaveis','_conteudo_')}}".replace('_conteudo_',conteudo); 
}

}
</script>

<script>
function p_turma()
{

var conteudo = document.getElementById("turma").value;

if(conteudo != "")
{
location.href = "{{route('turma','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function deficiente()
{

var conteudo = document.getElementById("def_id").value;

if(conteudo != "")
{
location.href = "{{route('deficiencia','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

@endsection

