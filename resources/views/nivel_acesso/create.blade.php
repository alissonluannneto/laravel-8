@extends('dashboard')

@section('content')
<h2>Cadastrar Nível de Acesso</h2>
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

    <form  method="post" action="{{route('nivel.post')}}">
     @csrf
      <div class="form-group">
        <label>Nível</label>
        <input type="text"  name="nivel" class="form-control" >
      </div>
      <div class="form-group">
        <label>Descrição</label>
        <input type="text"  name="descricao" class="form-control" >
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
@endsection
