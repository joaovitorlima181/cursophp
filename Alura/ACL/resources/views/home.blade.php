@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <h2>Lista de Chamados</h2>

      <p>Criar chamados</p>
      @forelse($chamados as $key => $value)
      @can('view', $value)
      <p>{{$value->titulo}}<a href="/home/{{$value->id}}">Editar</a></p>
      <p>{{$value->titulo}}<a href="/home/{{$value->id}}">Deletar</a></p>
      @endcan
        
      @empty
        <p>Não existem chamados!</p>
      @endforelse

    </div>
</div>
@endsection
