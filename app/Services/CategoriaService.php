<?php

namespace App\Services;

use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriaService
{
    public function getAll()
    {
       return Categoria::where('ativo',true)->get();
    }

    public function save(Request $request)
    {
        Categoria::create($request->all());
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update([
            'descricao' => ($request->has('descricao')? $request->descricao : $categoria->descricao),
            'ativo' => ($request->has('ativo') ? $request->ativo : $categoria->ativo),
            'created_at' => Carbon::now(),
        ]);
    }
}
