@extends('dashboard')

@section('content')
<h2>{{isset($produto)? 'Atualizar':'Cadastrar'}} produto</h2>
<div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if (isset($produto))
    {!! Form::model($produto, array('url' => route('produtos.update',[$produto->id]) , 'method' => 'put', 'class' => 'form-horizontal form-label-left')) !!}
    @else
        <form  method="post" action="{{route('produtos.post')}}">
    @endif
     @csrf
      <div class="form-group">
        <label>Descrição</label>
        {!! Form::text('descricao', isset($user)? $user->name : null, array('class' => 'form-control')) !!}
      </div>
      <br>
      <div class="form-group">
        <label>Ativo</label>
        @if (!isset($produto))
            {!! Form::select('ativo', [true => 'Sim', false => 'Não'], null, array('class' => 'form-control')) !!}
        @else
            {!! Form::select('ativo', [true => 'Sim', false => 'Não'], $produto->ativo, array('class' => 'form-control')) !!}
        @endif

      </div>
      <br>
      <div class="form-group">
        <label>Categoria</label>
        @if (!isset($produto))
        {!! Form::select('categoria_id', $categorias->pluck('descricao','id'),  null, array('class' => 'form-control', 'placeholder' => 'Selecione')) !!}
        @else
        {!! Form::select('categoria_id', $categorias->pluck('descricao','id'), $produto->categoria->id, array('class' => 'form-control', 'placeholder' => 'Selecione')) !!}
        @endif
      </div>
      <br>
      <div class="form-group">
        <label>Unidade de medida</label>
        @if (!isset($produto))
        {!! Form::select('unidade_medida_id', $unidades->pluck('descricao','id'),  null, array('class' => 'form-control', 'placeholder' => 'Selecione')) !!}
        @else
        {!! Form::select('unidade_medida_id', $unidades->pluck('descricao','id'), $produto->unidadeMedida->id, array('class' => 'form-control', 'placeholder' => 'Selecione')) !!}
        @endif
      </div>
      <br>
      <button type="submit" class="btn btn-primary">{{isset($produto)? 'Atualizar':'Cadastrar'}}</button>
    </form>
  </div>
@endsection
