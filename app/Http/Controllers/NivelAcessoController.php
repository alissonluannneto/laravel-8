<?php

namespace App\Http\Controllers;

use App\Models\NivelAcesso;
use App\Services\NivelAcessoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NivelAcessoController extends Controller
{
    private $nivelAcessoService;

    public function __construct(NivelAcessoService $nivelAcessoService)
    {

        $this->nivelAcessoService = $nivelAcessoService;
    }

    public function index()
    {
        $niveis = $this->nivelAcessoService->getall();
        return view('nivel_acesso.index',compact('niveis'));
    }


    public function create()
    {
        Gate::authorize('criar-nivel-acesso');
        return view('nivel_acesso.create');
    }


    public function store(Request $request)
    {
        Gate::authorize('salvar-nivel-acesso');

        $this->validate($request,[
            'nivel' => ['required','numeric'],
            'descricao' => ['required'],

        ],[
            'nivel.required' => 'Nível é obrigatório',
            'nivel.numeric' => 'Nível deve ser do tipo número',
            'descricao.required' => 'descrição é obrigatório',
        ]);

        $this->nivelAcessoService->save($request);

        return back()->with('success', 'Nível cadastrado com sucesso!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
