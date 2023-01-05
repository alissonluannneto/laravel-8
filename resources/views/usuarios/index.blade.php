@extends('dashboard')

@section('content')

    <h2 style="padding-top: 10px;">Usuarios</h2>
    @if (auth()->user()->nivel_acesso == 1)
        <a href="{{route('users.create')}}" class="btn btn-primary btn-sm">Cadastrar</a>
    @endif
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Nível Acesso</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->nivelAcesso->descricao}}</td>
                    <td>
                        <a href="{{route('users.edit',[$user->id])}}" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    @endsection
