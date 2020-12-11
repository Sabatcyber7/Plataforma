@extends('layouts.app')

@section('alunos')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Alunos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('lista') }}">Listar alunos</a>
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

<br>
<span class='msg-erro'></span>

<div class="div_pai_alunos" id="formulario">


  <form name="formLogin" method="POST" action="">
    @csrf

  <div class="form-group">
    <label for="formGroupExampleInput">Contrato</label>
    <input type="text" name="contrato" id="contrato" class="form-control" value="{{$bancos->contrato}}">
  </div>

 <div class="form-group">
    <label for="formGroupExampleInput">Nome do Aluno</label>
    <input type="text" name="nome_aluno" id="nome_aluno" class="form-control" value="{{$bancos->nome_aluno}}">
  </div>

   <div class="form-group">
    <label for="exampleFormControlSelect2">Sexo</label>
    <select  class="form-control" name="sexo" id="sexo">
      <option>{{$bancos->sexo}}</option>
      <option value="Masculino">Masculino</option>
      <option value="Feminino">Feminino</option>
    </select>
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Data de nascimento</label>
    <input type="date" name="dt_nascimento" class="form-control" value="{{$bancos->dt_nascimento}}">
</div>

 <div class="form-group">
    <label for="formGroupExampleInput">Endereço</label>
    <input type="text" name="endereco" class="form-control" value="{{$bancos->endereco}}">
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Nome da Mãe</label>
    <input type="text" name="nome_mae" class="form-control" value="{{$bancos->nome_mae}}" >
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Nome do Pai</label>
    <input type="text" name="nome_pai" class="form-control" value="{{$bancos->nome_pai}}">
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Estados</label>

@if(isset($estados))
<select class="form-control" name="estado" id="estado" onchange="pesquisar()">

    <option>{{$bancos->estado}}</option>

        @foreach($estados as $uf)

    <option style="font-size: 15px;" data-dado="{{$uf->id}}" value="{{$uf->estado}}">{{$uf->estado}}</option>
        @endforeach
    </select>
    @endif
 </div>

  


  <div class="form-group">
    <label for="exampleFormControlSelect2">Cidades</label>
    <select  class="form-control" name="cidade" id="cidade">
      <option>{{$bancos->cidade}}</option>
    </select>
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="email" name="email" class="form-control" value="{{$bancos->email}}" >
  </div>

<label for="txttelefone">Telefone</label>
<input type="tel" name="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" value="{{$bancos->telefone}}" />
<script type="text/javascript">$("#telefone").mask("(00) 0000-00009");</script>


<div class="form-group">
    <label for="exampleFormControlSelect1">Turma</label>

@if(isset($turmas))
<select class="form-control" name="turma" id="turma" value="{{$bancos->turma}}">

    <option>{{$bancos->turma}}</option>

        @foreach($turmas as $tur)

    <option style="font-size: 15px;" value="{{$tur->turma}}">{{$tur->turma}}</option>
        @endforeach
    </select>
    @endif
 </div>

<div class="form-group">
    <label for="exampleFormControlSelect1">Deficiência</label>

@if(isset($deficiencias))
<select class="form-control" name="deficiencia" id="deficiencia">

    <option>{{$bancos->deficiencia}}</option>

        @foreach($deficiencias as $deficien)

    <option style="font-size: 15px;" value="{{$deficien->deficiencia}}">{{$deficien->deficiencia}}</option>
        @endforeach
    </select>
    @endif
 </div>



   <div class="form-group">
    <label for="exampleFormControlTextarea1">Observações</label>
    <textarea class="form-control" name="obs" id="exampleFormControlTextarea1" rows="3" style="color: red;">{{$bancos->obs}}</textarea>
  </div>
 

 <button type="submit" class="btn btn-primary">Atualizar</button>
 <button type="reset" class="btn btn-primary" onblur= "rolar()">LIMPAR</button >
 

</form>

<table id="tbody"></table>

<script type="text/javascript">

  function pesquisar() {
    var dado = $('#estado option:selected').attr('data-dado'); //pega os dados da select estado não do value mas sim do data-dado

  $.get('/cidades/' + dado, function (cidades) {
  
    $('select[name=cidade]').empty();
    $.each(cidades, function (key, value) {
    $('select[name=cidade]').append('<option value=' + value.cidade + '>' + value.cidade + '</option>');
                });
            });
  }

</script>

<script type="text/javascript">

$(function(){

$('form[name="formLogin"]').submit(function(event){
event.preventDefault();

$.ajax({
 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
url: "{{ route('alunos_update', [$id]) }}",
type: "post",
data: $(this).serialize(),
dataType: 'json',

success: function(response) {

    alert(response.message);

$().ready(function(){
$("#formulario").animate({ scrollTop: 1000 }, 3000);
});

}

});

});

});

</script>


 <script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    </script>

@endsection