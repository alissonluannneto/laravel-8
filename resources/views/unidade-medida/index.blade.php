@extends('dashboard')

@section('content')

    <h2 style="padding-top: 10px;">Unidade de medida</h2>
        <a href="{{route('unidade-medida.create')}}" class="btn btn-primary btn-sm">Cadastrar</a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">descricao</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unidades as $unidade)

                <tr>
                    <td>{{$unidade->id}}</td>
                    <td>{{$unidade->descricao}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    @endsection
