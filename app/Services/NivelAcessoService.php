<?php

namespace App\Services;

use App\Models\NivelAcesso;
use Illuminate\Http\Request;

class NivelAcessoService
{
    public function getAll()
    {
       return NivelAcesso::all();
    }

    public function save(Request $request)
    {
        NivelAcesso::create($request->all());
    }
}
