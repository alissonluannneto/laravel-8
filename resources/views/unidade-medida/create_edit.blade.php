@extends('dashboard')

@section('content')
<h2>{{isset($unidade)? 'Atualizar':'Cadastrar'}} Unidade de medida</h2>
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

    @if (isset($unidade))
    {!! Form::model($unidade, array('url' => route('unidade-medida.update',[$unidade->id]) , 'method' => 'put', 'class' => 'form-horizontal form-label-left')) !!}
    @else
        <form  method="post" action="{{route('unidade-medida.post')}}">
    @endif
     @csrf
      <div class="form-group">
        <label>Descrição</label>
        {!! Form::text('descricao', isset($unidade)? $unidade->descricao : null, array('class' => 'form-control')) !!}
      </div>

      <br>
      <button type="submit" class="btn btn-primary">{{isset($unidade)? 'Atualizar':'Cadastrar'}}</button>
    </form>
  </div>
@endsection
