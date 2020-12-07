@extends('layouts.app')

@section('alunos')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Alunos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('responsaveis') }}">Responsáveis</a>
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
<div class="div_pai_alunos">
  <form name="formLogin" method="POST" action="{{route('insert_alunos')}}">
    @csrf
    

 <div class="form-group">
    <label for="formGroupExampleInput">Nome do Aluno</label>
    <input type="text" name="nome_aluno" class="form-control" id="formGroupExampleInput" >
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Cpf</label>
    <input type="text" name="cpf" class="form-control" id="formGroupExampleInput" >
  </div>


   <div class="form-group">
    <label for="exampleFormControlSelect2">Sexo</label>
    <select  class="form-control" name="sexo" id="sexo">
      <option value="Masculino">Masculino</option>
      <option value="Feminino">Feminino</option>
    </select>
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Data de nascimento</label>
    <input type="date" name="dt_nascimento" class="form-control" id="formGroupExampleInput">
</div>

 <div class="form-group">
    <label for="formGroupExampleInput">Endereço</label>
    <input type="text" name="endereco" class="form-control" id="formGroupExampleInput" >
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Nome da Mãe</label>
    <input type="text" name="nome_mae" class="form-control" id="formGroupExampleInput" >
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Nome do Pai</label>
    <input type="text" name="nome_pai" class="form-control" id="formGroupExampleInput">
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Estados</label>
@if(isset($estados))
<select class="form-control" name="estado" id="estado" onchange="pesquisar()">

    <option ></option>

        @foreach($estados as $uf)

    <option style="font-size: 15px;" data-dado="{{$uf->id}}" value="{{$uf->estado}}">{{$uf->estado}}</option>
        @endforeach
    </select>
    @endif
 </div>

  


  <div class="form-group">
    <label for="exampleFormControlSelect2">Cidades</label>
    <select  class="form-control" name="cidade" id="cidade">
      
    </select>
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="email" name="email" class="form-control" id="formGroupExampleInput" >
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">Telefone</label>
    <input type="tel" name="telefone" class="form-control" id="formGroupExampleInput" >
  </div>


<div class="form-group">
    <label for="exampleFormControlSelect2">Turma</label>
    <select  class="form-control" name="turma" id="turma">
      <option value="1">Tgd</option>
      <option value="2">Síndrome de Down</option>
    </select>
  </div>


<div class="form-group">
    <label for="exampleFormControlSelect2">Deficiência</label>
    <select  class="form-control" name="deficiencia" id="deficiencia">
      <option value="1">Tgd</option>
      <option value="2">Síndrome de Down</option>
    </select>
  </div>


   <div class="form-group">
    <label for="exampleFormControlTextarea1">Observações</label>
    <textarea class="form-control" name="obs" id="exampleFormControlTextarea1" rows="3" style="color: red;"></textarea>
  </div>
 

 <button type="submit" class="btn btn-primary">Submit</button>

</form>


</div>

 <!-- Fonts <div class="card-header"><a href="{{ url('usuarios/novo') }}">Novo Usuario</a></div> -->

<table class="table table-bordered" id="tbody" name="tbody">

 </table>

  
<script type="text/javascript">

  function pesquisar() {
    var dado = $('#estado option:selected').attr('data-dado');

  $.get('/cidades/' + dado, function (cidades) {
  
    $('select[name=cidade]').empty();
    $.each(cidades, function (key, value) {
    $('select[name=cidade]').append('<option value=' + value.cidade + '>' + value.cidade + '</option>');
                });
            });
  }

</script>

<script>

$(function(){

$('form[name="formLogin"]').submit(function(event){
event.preventDefault();


$.ajax({

url: '/insert_alunos',
type: "post",
data: $(this).serialize(),
dataType: 'json',

success: function(response) {

    alert(response.message);

}

});

});

});
</script>

@endsection