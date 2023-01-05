@extends('dashboard')

@section('content')
<h2>{{isset($categoria)? 'Atualizar':'Cadastrar'}} categoria</h2>
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

    @if (isset($categoria))
    {!! Form::model($categoria, array('url' => route('categorias.update',[$categoria->id]) , 'method' => 'put', 'class' => 'form-horizontal form-label-left')) !!}
    @else
        <form  method="post" action="{{route('categorias.post')}}">
    @endif
     @csrf
      <div class="form-group">
        <label>Descrição</label>
        {!! Form::text('descricao', isset($categoria)? $categoria->descricao : null, array('class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        <label>Ativo</label>
        @if (!isset($categoria))
            {!! Form::select('ativo', [true => 'Sim', false => 'Não'], null, array('class' => 'form-control')) !!}
        @else
            {!! Form::select('ativo', [true => 'Sim', false => 'Não'], $categoria->ativo, array('class' => 'form-control')) !!}
        @endif

      </div>

      <br>
      <button type="submit" class="btn btn-primary">{{isset($categoria)? 'Atualizar':'Cadastrar'}}</button>
    </form>
  </div>
@endsection
