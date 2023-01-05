@extends('dashboard')

@section('content')

    <h2 style="padding-top: 10px;">Produtos</h2>
         @if (auth()->user()->nivel_acesso == 1)
            <a href="{{route('produtos.create')}}" class="btn btn-primary btn-sm">Cadastrar</a>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">descricao</th>
                <th scope="col">categoria</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)

                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->categoria->descricao}}</td>
                    <td>
                        <a href="{{route('produtos.show',[$produto->id])}}" class="btn btn-primary btn-sm">Visualizar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    @endsection
