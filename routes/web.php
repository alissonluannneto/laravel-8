<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NivelAcessoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UnidadeMedidaController;
use App\Http\Controllers\UsersController;


use Illuminate\Support\Facades\Route;


Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('auth',[LoginController::class,'authenticate'])->name('auth.user');

Route::group(['middleware' => 'auth'], function () {

Route::get('dashboard',function(){
    return view('dashboard');
});

Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');

#unidade de usuarios
Route::get('/users', [UsersController::class,'index'])->name('users.index');
Route::get('/users/create', [UsersController::class,'create'])->name('users.create');
Route::post('/users', [UsersController::class,'store'])->name('users.post');
Route::get('/users/{user}/edit', [UsersController::class,'edit'])->name('users.edit');
Route::put('/users/{user}', [UsersController::class,'update'])->name('users.update');

#unidade de nivel de acesso
Route::get('/nivel-acesso',[NivelAcessoController::class,'index'])->name('nivel.index');
Route::get('/nivel-acesso/create',[NivelAcessoController::class,'create'])->name('nivel.create');
Route::post('/nivel-acesso',[NivelAcessoController::class,'store'])->name('nivel.post');

#unidade de produtos
Route::get('/produtos', [ProdutoController::class,'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutoController::class,'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoController::class,'store'])->name('produtos.post');
Route::get('/produtos/{produto}',[ProdutoController::class,'show'])->name('produtos.show');
Route::get('/produtos/{produto}/edit', [ProdutoController::class,'edit'])->name('produtos.edit');
Route::put('/produtos/{produto}', [ProdutoController::class,'update'])->name('produtos.update');

#unidade de categoria
Route::get('/categorias', [CategoriaController::class,'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class,'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class,'store'])->name('categorias.post');
Route::get('/categorias/{categoria}/edit', [CategoriaController::class,'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}', [CategoriaController::class,'update'])->name('categorias.update');

#unidade de medida
Route::get('/unidade-medida', [UnidadeMedidaController::class,'index'])->name('unidade-medida.index');
Route::get('/unidade-medida/create', [UnidadeMedidaController::class,'create'])->name('unidade-medida.create');
Route::post('/unidade-medida', [UnidadeMedidaController::class,'store'])->name('unidade-medida.post');
Route::get('/unidade-medida/{unidade}/edit', [UnidadeMedidaController::class,'edit'])->name('unidade-medida.edit');
Route::put('/unidade-medida/{unidade}', [UnidadeMedidaController::class,'update'])->name('unidade-medida.update');
});
