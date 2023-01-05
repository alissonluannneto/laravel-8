@extends('dashboard')

@section('content')

    <h2 style="padding-top: 10px;">Nível de acesso</h2>
        <a href="{{route('nivel.create')}}" class="btn btn-primary btn-sm">Cadastrar</a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nível</th>
                <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($niveis as $nivel)

                <tr>
                    <td>{{$nivel->id}}</td>
                    <td>{{$nivel->nivel}}</td>
                    <td>{{$nivel->descricao}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    @endsection
