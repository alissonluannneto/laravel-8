@extends('dashboard')

@section('content')

<h2>{{isset($user)? 'Atualizar':'Cadastrar'}} Usuário</h2>
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

    @if (isset($user))
    {!! Form::model($user, array('url' => route('users.update',[$user->id]) , 'method' => 'put', 'class' => 'form-horizontal form-label-left')) !!}
    @else
        <form  method="post" action="{{route('users.post')}}">
    @endif
     @csrf
      <div class="form-group">
        <label>Nome</label>
        {!! Form::text('name', isset($user)? $user->name : null, array('class' => 'form-control')) !!}
      </div>
      <div class="form-group">
        <label>Email</label>
        {!! Form::text('email', isset($user)? $user->email : null, array('class' => 'form-control', 'type' => 'password')) !!}
      </div>

        @if (auth()->user()->nivel_acesso == 1)
            <div class="form-group">
            <label>Nível de acesso</label>
            @if (!isset($user))
            {!! Form::select('nivel_acesso', $niveis->pluck('descricao','id'),  null, array('class' => 'form-control', 'placeholder' => 'Selecione')) !!}
            @else
            {!! Form::select('nivel_acesso', $niveis->pluck('descricao','id'), $user->nivelAcesso->id, array('class' => 'form-control', 'placeholder' => 'Selecione')) !!}
            @endif
            </div>
        @endif

      <div class="form-group">
        <label>Senha</label>
        {!! Form::password('password', array('class' => 'form-control', 'type' => 'password')) !!}
      </div>
      <br>
      <button type="submit" class="btn btn-primary">{{isset($user)? 'Atualizar':'Cadastrar'}}</button>
    </form>
  </div>
@endsection
