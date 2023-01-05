<?php

namespace App\Services;

use App\Models\UnidadeMedida;
use Illuminate\Http\Request;

class UnidadeMedidaService
{
    public function getAll()
    {
       return UnidadeMedida::all();
    }

    public function save(Request $request)
    {
        UnidadeMedida::create($request->all());
    }
}
