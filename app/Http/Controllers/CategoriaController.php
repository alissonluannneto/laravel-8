<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Services\CategoriaService;
use App\Services\UnidadeMedidaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriaController extends Controller
{
    private $categoriaService;


    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }


    public function index()
    {
        $categorias = $this->categoriaService->getAll();
        return view('categoria.index',compact('categorias'));
    }


    public function create()
    {
        Gate::authorize('categoria-criar');
        return view('categoria.create_edit');
    }


    public function store(Request $request)
    {
        Gate::authorize('categoria-salvar');
        $this->validate($request,[
            'descricao' => ['required'],
        ]);

        $this->categoriaService->save($request);
        return back()->with('success','Categoria cadastrada com sucesso!');
    }


    public function show()
    {
        //
    }


    public function edit(Categoria $categoria)
    {
        Gate::authorize('categoria-criar');
        return view('categoria.create_edit',compact('categoria'));
    }


    public function update(Request $request, Categoria $categoria )
    {
        $this->validate($request,[
            'descricao' => ['required'],
        ]);

        $this->categoriaService->update($request, $categoria);
        return back()->with('success','Categoria atualizada com sucesso!');
    }


    public function destroy()
    {
        //
    }
}
