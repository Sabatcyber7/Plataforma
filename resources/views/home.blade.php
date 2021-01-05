@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ciclo de Amor</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>SEJA BEM-VINDO</h2>
          
                    <hr>
                    
                    @if ($usuario->cadastrar != 'NAO' || $logado == 'alex.cyber@hotmail.com')                     
                    <a href="{{ route('ponte') }}"><img src="./img/juridico2.png" alt="HTML tutorial" style="width:60px;height:50px;"> Cadastrar amigo visitante </a>
                    @endif
                    <br>    
                    
                    @if ($logado == 'alex.cyber@hotmail.com')
                    <a href="{{ route('ciclo') }}"><img src="./img/cadeado.jpg" alt="HTML tutorial" style="width:60px;height:50px;"> Permissões</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
