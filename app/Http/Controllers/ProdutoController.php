<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Services\CategoriaService;
use App\Services\ProdutoService;
use App\Services\UnidadeMedidaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProdutoController extends Controller
{
    private $produtoService;
    private $categoriaService;
    private $UnidadeMedidaService;

    public function __construct(ProdutoService $produtoService, CategoriaService $categoriaService,
    UnidadeMedidaService $UnidadeMedidaService)
    {

        $this->produtoService = $produtoService;
        $this->categoriaService = $categoriaService;
        $this->UnidadeMedidaService = $UnidadeMedidaService;
    }


    public function index()
    {
        $produtos = $this->produtoService->getAll();
        return view('produto.index',compact('produtos'));
    }


    public function create()
    {
        Gate::authorize('criar-produto');

        $categorias = $this->categoriaService->getAll();
        $unidades = $this->UnidadeMedidaService->getAll();
        return view('produto.create_edit',compact('categorias','unidades'));
    }


    public function store(Request $request)
    {
        Gate::authorize('cadastrar-produto');

        $this->validate($request,[
            'descricao' => ['required'],
            'ativo' => ['required'],
            'categoria_id' => ['required'],
            'unidade_medida_id' => ['required'],

        ],[
            'descricao.required' => 'descricao é obrigatório',
            'ativo.required' => 'ativo é obrigatório',
            'categoria_id.required' => 'categoria é obrigatório',
            'unidade_medida_id.required' => 'unidade medida é obrigatório',
        ]);

        $this->produtoService->save($request);
        return back()->with('success', 'Produto cadastrado com sucesso!');
    }


    public function show(Produto $produto)
    {
        Gate::authorize('ver-produto');
        return view('produto.show',compact('produto'));
    }


    public function edit(Produto $produto)
    {
        //
    }


    public function update(Request $request, Produto $produto)
    {
        //
    }


    public function destroy(Produto $produto)
    {
        //
    }
}
