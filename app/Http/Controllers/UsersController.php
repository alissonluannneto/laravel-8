<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NivelAcessoService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $nivelAcessoService;
    private $userService;

    public function __construct(NivelAcessoService $nivelAcessoService, UserService $userService)
    {
        $this->nivelAcessoService = $nivelAcessoService;
        $this->userService = $userService;
    }


    public function index()
    {
        $usuarios = $this->userService->getAll();
        return view('usuarios.index',compact('usuarios'));
    }


    public function create()
    {
        $niveis = $this->nivelAcessoService->getall();
        return view('usuarios.create_edit',compact('niveis'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'password.required' => 'Senha é obrigatório',
        ]);

        $this->userService->save($request);

        return back()->with('success','Usuário cadastrado com sucesso!');
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $niveis = $this->nivelAcessoService->getall();
        return view('usuarios.create_edit',compact('user','niveis'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email']
        ],[
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
        ]);

        $this->userService->update($request, $user);

        return back()->with('success','Usuário atualizado com sucesso!');
    }


    public function destroy($id)
    {
        //
    }
}
