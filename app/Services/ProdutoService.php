<?php

namespace App\Services;


use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoService
{
    public function getAll()
    {
       return Produto::where('ativo',true)->get();
    }

    public function save(Request $request)
    {
        Produto::create($request->all());
    }
}
