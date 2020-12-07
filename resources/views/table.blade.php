@extends('menu')


@section('conteudo')

<title>Acompanhamento</title>

@if (session('status'))
    
    <div class="alert alert-success">
        {{ session('status') }}

    </div>
@endif


<link href="css/imagem_listagem.css" rel="stylesheet">
<link href="css/botoes_pesquisa.css" rel="stylesheet">
<link href="{{ asset('css/textos.css') }}" rel="stylesheet">

<!-- 
<head>
   <script type="text/javascript">
        function abrir_popup()
        {
            alert("Página carregou...");
        }
   </script>
</head>

<body onload="abrir_popup();">
-->

<div class="col-md-4 offset-md-0">
<label style="margin-left:0%;"><font color="#045FB4"><b>Pesquisar pelo Número do pedido</b></font></label>


 &nbsp &nbsp 

  <input type="text" name="chama_" id="chama_" size="10" style="text-align: right; background-color: #E6E6E6">

<button type="button" class="btn btn-sm"  onclick="pedir_botao()"><img border="0" title="Pesquisar pelo número do chamado" src="\Imagens\luneta2.jpg" width="25" height="25"></button>

    
</div>


<div style="overflow-x: auto; width: 98%; height: 70%; margin-left:1%; margin-top:1%; margin-bottom:2%;  border:solid 1px;flex-direction: row;">


<h1 style="background-color:#0B2F3A"> <center><font size="5" face="verdana" color="white">Solicitações Registradas</font>
<h4 class="h5" style="margin-left: 85%; margin-top:0%;" id="totais"><font color="#FFFFFF"><a href="{{route('paginar_chamado')}}"> @if(isset($total))</a>Total: <font color="#DF0101">{{( $total )}}  </font> @endif</font> </h4> <center></h1>


<table class="table-striped table-bordered">

<tr>
  <th><center><font size=1>NÚMERO PEDIDO</font></center></th>
  <th><center><font size=1>FILIAL DO SOLICITANTE</font></center></th>
  <th><center><font size=1>NOME DO SOLICITANTE</font></center></th>
  <th><center><font size=1>DATA DA SOLICITAÇÃO</font></center></th>
  <th><center><font size=1>NATUREZA DO PEDIDO</font></center></th>
  <th><center><font size=1>TIPO DE PRIORIDADE</font></center></th>
  <th><center><font size=1>STATUS DO ATENDIMENTO</font></center></th>

<th colspan="7"><center>Painel de acompanhamento das solicitações</center></th>
    
</tr>  

	<tr >
		<th>

  @if(isset($pedido))
    <select  style="width: 100%;" id="pedir" onclick="pedir()">
    <option ></option>  
        @foreach($pedido as $pede) 
    <option style="font-size: 10px;">{{$pede->nr_chamado}}</option>
        @endforeach 
    </select>
    @endif


    </th>
	
  	<th>

    @if(isset($filial))
    <select  style="width: 100%;" id="filial" onclick="filial()">
    <option ></option>  
        @foreach($filial as $filia) 
    <option style="font-size: 10px;">{{$filia->custo_origem}}</option>
        @endforeach 
    </select>
    @endif

   </th>
    

    <th>

  @if(isset($solicita))
    <select  style="width: 100%;" id="solicitante" onclick="solicitante()">
    <option ></option>  
        @foreach($solicita as $sol) 
    <option style="font-size: 10px;">{{$sol->responsavel}}</option>
        @endforeach 
    </select>
    @endif

    </th>
		<th>

@if(isset($data_sol))
    <select  style="width: 100%;" id="data_s" onclick="data_sol()">
    <option ></option>  
        @foreach($data_sol as $data) 
    <option style="font-size: 10px;">{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i:s')}}</option>

        @endforeach 
    </select>
    @endif


    </th>

		<th>
@if(isset($natureza))
    <select  style="width: 100%;" id="nat" onclick="natureza()">
    <option ></option>  
        @foreach($natureza as $nat) 
    <option style="font-size: 10px;">{{$nat->titulo}}</option>
        @endforeach 
    </select>
    @endif

    </th>

						
    <th>

  @if(isset($prioriza))
    <select  style="width: 90%;" id="priorida" onclick="priorida()">
    <option ></option>  
        @foreach($prioriza as $pri) 
    <option style="font-size: 10px;">{{$pri->prioridade}}</option>
        @endforeach 
    </select>
  @endif


    </th>
		<th>

  @if(isset($status))
    <select  style="width: 90%;" id="estatos" onclick="estatos()">
    <option ></option>  
        @foreach($status as $sta) 
    <option style="font-size: 10px;">{{$sta->status}}</option>
        @endforeach 
    </select>
  @endif
    </th>

  <th bgcolor="#A9D0F5"><center><font size=2>OBS</font></center></th>
  <th bgcolor="#A9D0F5"><center><font size=2>LOG</font></center></th>
  <th bgcolor="#A9D0F5"><center><font size=2>P.O</font></center></th>
  <th bgcolor="#A9D0F5"><center><font size=2>ORDEM</font></center></th>
  <th bgcolor="#A9D0F5"><center><font size=2>BOLETO</font></center></th>
  <th bgcolor="#A9D0F5"><center><font size=2>TRATAR</font></center></th>
  <th bgcolor="#A9D0F5"><center><font size=2>PDF</font></center></th>


	</tr>

  
	@foreach($banco as $bancos)	

	<tr >
		
		<td ><font size=1 color='#FF0000'> <b>{{$bancos->nr_chamado}}</b> </font></td>
		<td ><font size=1>{{$bancos->custo_origem}} </font></td>
    <td ><font size=1>{{$bancos->responsavel}} </font></td>
    <td><font size=1>{{ \Carbon\Carbon::parse($bancos->created_at)->format('d/m/Y H:i:s')}}</font></td>
		<td ><font size=1>{{$bancos->titulo}} </font></td>
		
 		
		@if($bancos->prioridade == 'URGENTE')
		<td ><font size=1 color='#FF0000'>{{$bancos->prioridade}} </font></td>
		@else
		<td ><font size=1 color='#0000FF'>{{$bancos->prioridade}} </font></td>
		@endif

		@if($bancos->status == 'ENCAMINHADO')
		<td ><font size=1 color='#088A08'>{{$bancos->status}} </font></td>
		@else
		<td ><font size=1 color='#0000FF'>{{$bancos->status}} </font></td>
		@endif
		
		
        <td>
    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#OBST{{$bancos->id}}"><img border="0" title="Observações do Pedido" src="\Imagens\obs.png" width="22" height="25"></button>
    </td>


<!--
<td align="center"><font size=1 ><div class="zoom"><img src="{{url('https://jomaga.blob.core.windows.net/jomagapa/jomagapa/'.$bancos->imagem)}}"></div></font></td>
-->
	
  <td>
<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#obs{{$bancos->nr_chamado}}"><img border="0" title="Visualizar histórico do pedido" src="\Imagens\historico.png" width="25" height="25"></button>
</td>	


<td>
@if(isset($bancos->documento) != "")

<a href="{{ route('pdf', [$bancos->documento]) }}"><img border="0" title="Baixar planilha de orçamento" src="\Imagens\excelanexo.jpg" width="30" height="30"></a>
@endif

</td>


<td><center>
@if(isset($bancos->ordem) != "")

<a href="{{ route('ordem', [$bancos->ordem]) }}"><img border="0" title="Baixar Ordem de pagamento" src="\Imagens\ordem.jpg" width="30" height="30"></a>
@endif

</center></td>


<td><center>
@if(isset($bancos->boleto) != "")

<a href="{{ route('boletos', [$bancos->boleto]) }}"><img border="0" title="Baixar Boleto ou Nota Fiscal anexada" src="\Imagens\boleto3.jpg" width="30" height="30"></a>
@endif

</center></td>


	<td><center>
<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#tratamento{{$bancos->nr_chamado}}"><img border="0" title="Tratamento do pedido" src="\Imagens\work_02.png" width="25" height="25"></button>
</td>

</center><td>
<a href="{{ route('Relatorio', [$bancos->nr_chamado]) }}"><img border="0" title="Imprimir PDF" src="\Imagens\impressora.jpg" width="30" height="30"></a>
</td>


<div class="modal fade" id="obs{{$bancos->nr_chamado}}" tabindex="-1" role="dialog" aria-labelledby="obs" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8D8D8"><img border="0" title="Visualizar histórico do pedido" src="\Imagens\historico.jpg" width="25" height="25">&nbsp &nbsp 
       <h5 class="modal-title" id="obs{{$bancos->nr_chamado}}">Histórico do pedido Nr: <b>{{$bancos->nr_chamado}} - {{$bancos->titulo}} </b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:#A9D0F5">
        
      <pre><b><span class="inner-pre" align="justify" style="font-size: 11px">{{$bancos->historico}}</span></b></pre>

      </div>
      <div class="modal-footer" style="background-color:#D8D8D8">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="OBST{{$bancos->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#F6CECE">
        <img border="0" title="Observações do Pedido" src="\Imagens\obs.png" width="22" height="25">&nbsp &nbsp 
        <h5 class="modal-title">Observações do pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body btn-lg" style="background-color:#EFFBF8" >
    
     <pre>{{$bancos->descricao}}</pre>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="tratamento{{$bancos->nr_chamado}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header"><img border="0" title="Imprimir PDF" src="\Imagens\work_02.png" width="30" height="30">&nbsp &nbsp 
        <h5 class="modal-title" id="tratamento{{$bancos->nr_chamado}}">Tratamento do chamado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">
               
<form method="POST" id="my-banco" action="{{route('grava_historico')}}" enctype="multipart/form-data">
@csrf
 

		<div class="col-md-15 offset-md-0" >
    		<label><font color="#045FB4">NÚMERO DO PEDIDO</font></label>
    		<input readonly type="text" name="chamado_"  id="chamado_"  class="form-control" value="{{$bancos->nr_chamado}}">
		  </div>
		<br>


		<div class="col-md-15 offset-md-0" >
    		<label><font color="#045FB4">NATUREZA DO PEDIDO</font></label>
    		<input readonly type="text" name="titulo_" id="titulo_" class="form-control" value="{{$bancos->titulo}}">
		  </div>
		<br>

  <div class="col-md-15 offset-md-0" >
        <label><font color="#045FB4">FILIAL DO SOLICITANTE</font></label>
        <input readonly type="text" name="filial_" id="filial_" class="form-control" value="{{$bancos->custo_origem}}">
      </div>
    <br>

		<div class="col-md-15 offset-md-0" >
    		<label><font color="#045FB4">NOME DO SOLICITANTE</font></label>
    		<input readonly type="text" name="responsavel_" id="responsavel_" class="form-control" value="{{$bancos->responsavel}}">
		  </div>
		<br>

		<div class="col-md-15 offset-md-0" >
    		<label><font color="#045FB4">DATA DA SOLICITAÇÃO</font></label>
    		<input readonly type="text" name="data_" class="form-control" id="data_" value="{{ \Carbon\Carbon::parse($bancos->created_at)->format('d/m/Y H:i:s')}}">
		  </div>
		<br>

		<!--
    <div class="col-md-15 offset-md-0" >
    		<label><font color="#045FB4">POLO DESTINO</font></label>
    		<input readonly type="text" name="custo_" class="form-control" id="custo_" value="{{$bancos->c_custo}}">
		  </div>
		<br>

		<div class="col-md-15 offset-md-0" >
    		<label><font color="#045FB4">SETOR DESTINO</font></label>
    		<input readonly type="text" name="setor_" class="form-control" id="setor_" value="{{$bancos->setor}}">
		  </div>
		<br>
-->
	

		<div class="col-md-15 offset-md-0" >
    		<label><font color="#045FB4">TIPO DE PRIORIDADE</font></label>
    		<input readonly type="text" name="prioridade_" class="form-control" id="prioridade_" value="{{$bancos->prioridade}}">
		  </div>
		<br>


        <div class="col-md-20 offset-md-0">
     	<label><font color="#045FB4">DESCRIÇÃO DO PEDIDO</font></label>
  		<div class="col-15">  
    	<textarea readonly name="descricao_" class="form-control" id="descricao_" rows="5" style="margin-left:0%">{{$bancos->descricao}}</textarea>
   		</div> 
  		</div>

    <br>
    <div class="col-md-15 offset-md-0" >
        <label><font color="#045FB4">STATUS DO PEDIDO</font></label>
        <input readonly type="text" name="status_" class="form-control" id="status_" value="{{$bancos->status}}">
      </div>
    <br>


		<br>
		<hr color="#DF0101">
		<div class="col-md-20 offset-md-0">
     		<label><font color="#045FB4">Digite suas observações no quadro abaixo. </font></label>
    <button type="button" title="{{$bancos->historico}}"><img border="0" src="\Imagens\luneta2.jpg"  width="25" height="25"></button>


    <div class="col-15">  
    	<textarea name="historico_" class="form-control" id="historico_" rows="5" style="margin-left:0%"></textarea>
   		</div> 
  		</div>

<br>
<div class="col-md-10 offset-md-0">
    <label><img border="0" title="Ordem de Compra" src="\Imagens\excelanexo.jpg" width="30" height="30"><font color="#DF0101"><b>&nbsp Anexar Ordem de Compra</b></font></label>
    <input type="file" title="Anexar Ordem de Compra" name="ordem" class="form-control-file" aria-describedby="fileHelp" style="margin-left:-3%">

</div>  
<br>

<div class="col-md-20 offset-md-0">
  <label><font color="#045FB4">ALTERAR STATUS DO PEDIDO</font></label>
  <select style="width: 100%;" name="alt_status" id="alt_status" class="form-control">
  <option selected></option>
  @foreach($b_status as $stat)  
  <option>{{$stat->nome}}</option>
  @endforeach
  </select>
</div>

<!--
<hr color="#DF0101">

<div class="col-md-20 offset-md-0">
  <label><font color="#045FB4">ENCAMINHAR PARA POLO DE DESTINO</font></label>
  <select style="width: 100%;" name="encaminha" id="encaminha" class="form-control" onclick="retorno()">
  
  @foreach($custos as $custo_)  
  <option selected >{{$custo_->nome}}</option>
  @endforeach
  </select>
</div>

<div class="col-md-20 offset-md-0">
   <label><font color="#045FB4">ENCAMINHAR PARA O SETOR DE DESTINO</font></label>
  <select name="setores" id="setores" class="form-control" onclick="p_servico()" >
  <option></option>
    <option></option>
  </select>
</div>


<br>

<div class="col-md-20 offset-md-0">
   <label><font color="#045FB4">TIPO DE SOLICITAÇÃO</font></label>
  <select name="servico" id="servico" class="form-control">
  <option></option>
    <option></option>
  </select>
</div>

<br>
-->
<div class="modal-footer">
 
<input type="hidden" name="codigo" value="{{$bancos->nr_chamado}}">


 <div class="botoes">
    <input type="submit" id="botao" value="Salvar" name="botao" class="btn btn-primary">
 </div>  
  

 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

</div>

</form>

</div>
       		
      
    </div>
  </div>
</div>


</tr>

 @endforeach	


</table>  


  @if (isset($fixa)) 
    {!! $banco->appends($fixa)->links() !!}
  @else
    {!! $banco->links() !!}
  @endif  




<script>
function retorno()
{
    var valor = document.getElementById("encaminha").value;
   
    $.get('/Pesquise/' + valor, function(data) {
       $('select[name=setores]').empty();
    
    $.each(data, function(key,value){
    
    $('select[name=setores]').append('<option value='+value.nome + '>' + value.nome + '</option>');

    
    });

    });
 }
</script>


<script>
function p_servico()
{
    
    var valor = document.getElementById("setores").value;
   
    $.get('/Pesca_servico/' + valor, function(data) {
    
       $('select[name=servico]').empty();
    
    $.each(data, function(key,value){
    
    $('select[name=servico]').append('<option value='+value.servico + '>' + value.servico + '</option>');
    
    });

    });
 }
</script>


<script>
function filial()
{

var conteudo = document.getElementById("filial").value;

if(conteudo != "")
{
location.href = "{{route('Filial','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>


<script>
function solicitante()
{

var conteudo = document.getElementById("solicitante").value;

if(conteudo != "")
{
location.href = "{{route('Solicitante','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>


<script>
function data_sol()
{

var conteudo = document.getElementById("data_s").value;

if(conteudo != "")
{
location.href = "{{route('Data_solis','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>



<script>
function natureza()
{

var conteudo = document.getElementById("nat").value;

if(conteudo != "")
{
location.href = "{{route('Natureza','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>




<script>
function destino()
{

var conteudo = document.getElementById("destino").value;

if(conteudo != "")
{
location.href = "{{route('Destina','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function setores()
{

var conteudo = document.getElementById("set").value;

if(conteudo != "")
{
location.href = "{{route('Rota_set','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function solicita()
{

var conteudo = document.getElementById("solicita").value;

if(conteudo != "")
{
location.href = "{{route('Rota_sol','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function priorida()
{

var conteudo = document.getElementById("priorida").value;

if(conteudo != "")
{
location.href = "{{route('Rota_pri','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function estatos()
{

var conteudo = document.getElementById("estatos").value;

if(conteudo != "")
{
location.href = "{{route('Rota_sta','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>

<script>
function pedir()
{

var conteudo = document.getElementById("pedir").value;

if(conteudo != "")
{
location.href = "{{route('Rota_pedir','_conteudo_')}}".replace('_conteudo_',conteudo);
}

}
</script>


<script>
function pedir_botao()
{

var conteudo = document.getElementById("chama_").value;

if(conteudo != "")
{
location.href = "{{route('Rota_pedir','_conteudo_')}}".replace('_conteudo_',conteudo);
}

if(conteudo == "")
{
location.href = "{{route('paginar_chamado','_conteudo_')}}".replace('_conteudo_',conteudo);
}


}
</script>




<script type="text/javascript">

function loca()
 {

var conteudo = document.getElementById("chama_").value;

if(conteudo != "")
{
location.href = "{{route('Loca_trata','_conteudo_')}}".replace('_conteudo_',conteudo);
}

if(conteudo == "")
{
location.href = "{{route('alimenta_chamado','_conteudo_')}}".replace('_conteudo_',conteudo);
}


}
</script>


@stop