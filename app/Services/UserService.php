<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserService
{
    public function getAll()
    {
        if (auth()->user()->nivel_acesso != 1) {
           return $this->myUser();
        }

       return User::all();
    }

    public function save(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nivel_acesso' => $request->nivel_acesso,
        ]);
    }

    public function update(Request $request, User $usuario)
    {
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password != null)? bcrypt($request->password) : $usuario->password,
            'nivel_acesso' => $request->nivel_acesso,
            'created_at' => Carbon::now(),
        ]);
    }

    public function myUser()
    {
        return User::where('id',auth()->user()->id)->get();
    }
}
