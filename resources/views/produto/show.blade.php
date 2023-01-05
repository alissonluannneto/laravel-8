@extends('dashboard')

@section('content')
    <h1>Visualizar produto</h1>
    <div class="alert alert-warning">
        <ul>
            <li><strong>Nome:</strong> {{$produto->descricao}}</li>
            <li><strong>Ativo?:</strong> {{($produto->ativo == 1)? 'Sim' :  'Não'}}</li>
            <li><strong>Categoria:</strong> {{$produto->categoria->descricao }}</li>
            <li><strong>Unidade de medida:</strong> {{$produto->unidadeMedida->descricao }}</li>
        </ul>
    </div>
@endsection
