@extends('layouts.app')

@section('alunos')

  <form name="formLogin" method="POST" action="">

@csrf

  <div class="form-group">
    <label for="exampleFormControlSelect1">Estados</label>


@if(isset($estados))
<select class="form-control" name="estado" id="estado" onchange="pesquisar(this.value)">

    <option ></option>

        @foreach($estados as $uf)

    <option style="font-size: 15px;" value="{{$uf->id}}">{{$uf->estado}}</option>
        @endforeach
    </select>
    @endif
 </div>

  


  <div class="form-group">
    <label for="exampleFormControlSelect2">CIDADES</label>
    <select  class="form-control" name="cidade" id="cidade">
      
    </select>
  </div>

 <button type="submit" class="btn btn-primary">Submit</button>


</form>

 <!-- Fonts <div class="card-header"><a href="{{ url('usuarios/novo') }}">Novo Usuario</a></div> -->

<table class="table table-bordered" id="tbody" name="tbody">

 </table>

  
<script type="text/javascript">

  function pesquisar(id) {

  $.get('/cidades/' + id, function (cidades) {
  
    $('select[name=cidade]').empty();
    $.each(cidades, function (key, value) {
    $('select[name=cidade]').append('<option value=' + value.id + '>' + value.cidade + '</option>');
                });
            });
  }

</script>

@endsection