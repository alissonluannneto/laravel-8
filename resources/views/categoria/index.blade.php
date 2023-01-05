@extends('dashboard')

@section('content')

    <h2 style="padding-top: 10px;">Categoria</h2>
        <a href="{{route('categorias.create')}}" class="btn btn-primary btn-sm">Cadastrar</a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">descricao</th>
                <th scope="col">Ativo</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)

                <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->descricao}}</td>
                    <td>{{($categoria->ativo == 1)? 'Sim' : 'Não'}}</td>
                    <td>
                        <a href="{{route('categorias.edit',[$categoria->id])}}" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    @endsection
