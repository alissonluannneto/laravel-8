<?php

namespace App\Http\Controllers;

use App\Services\UnidadeMedidaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UnidadeMedidaController extends Controller
{
    private $unidadeMedidaService;


    public function __construct(UnidadeMedidaService $unidadeMedidaService)
    {

        $this->unidadeMedidaService = $unidadeMedidaService;
    }


    public function index()
    {
        $unidades = $this->unidadeMedidaService->getAll();
        return view('unidade-medida.index',compact('unidades'));
    }


    public function create()
    {
        Gate::authorize('criar-unidade-medida');
        return view('unidade-medida.create_edit');
    }


    public function store(Request $request)
    {
        Gate::authorize('salvar-unidade-medida');
        $this->validate($request,[
            'descricao' => ['required'],
        ]);

        $this->unidadeMedidaService->save($request);
        return back()->with('success','Unidade cadastrada com sucesso!');
    }


    public function show()
    {
        //
    }


    public function edit()
    {
        //
    }


    public function update(Request $request )
    {
        //
    }


    public function destroy()
    {
        //
    }
}
