<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarimboController;
use App\Http\Controllers\ControleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/* Home (usuário autenticado ou não) */
Route::get('/', [HomeController::class, 'index'])->name('index');

/* Rotas de autenticação e logout */
Route::post('/login',[LoginController::class, 'authenticate'])->name('login');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

/* Links da sidebar */
Route::get('/dashboard', function(){ return view('fallback.manutencao');})->name('dashboard.index')->middleware('auth');
Route::get('/carimbos/b2b', function(){ return view('fallback.manutencao');})->name('carimbos.b2b.index')->middleware('auth');
Route::get('/carimbos/controle', [ControleController::class, 'carregarViewControle'])->name('carimbos.controle.index')->middleware('auth');
Route::get('/carimbos/gerais', function(){ return view('fallback.manutencao');})->name('carimbos.gerais.index')->middleware('auth');
Route::get('/carimbos/vivo2', function(){ return view('fallback.manutencao');})->name('carimbos.vivo2.index')->middleware('auth');
Route::get('/links', function(){ return view('fallback.manutencao');})->name('links.index')->middleware('auth');
/* Fim dos links da sidebar */

/* Formulários de carimbos */
Route::post('/carimbos/controle/formularios/controle_crise',[ControleController::class, 'carregarFormCrise'])->name('formulario.controle_crise');
/* Fim dos formulários de carimbos */

/* Insert de carimbos */
Route::post('/carimbos/controle/formularios/controle_crise/insert',[ControleController::class, 'insertCarimboCrise'])->name('insert.controle_crise');
/* Fim do insert de carimbos */

/* CRUD de usuários */
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index')->middleware('auth');
Route::post('/usuarios/lista_usuarios', [UsuarioController::class, 'listarUsuarios'])->name('usuarios.listar')->middleware('auth');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create')->middleware('auth');
Route::post('/usuarios/store', [UsuarioController::class, 'store'])->name('usuarios.store')->middleware('auth');
Route::get('/usuarios/{user}', [UsuarioController::class, 'show'])->name('usuarios.show')->middleware('auth');
Route::get('/usuarios/{user}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit')->middleware('auth');
Route::put('/usuarios/{user}/update', [UsuarioController::class, 'update'])->name('usuarios.update')->middleware('auth');
Route::delete('/usuarios/{user}/destroy', [UsuarioController::class, 'destroy'])->name('usuarios.delete')->middleware('auth');
/* Fim do CRUD de usuários */

//Fallback(tratar requisições a rotas inexistentes)
Route::fallback(function () {
    echo 'Rota acessada não existe. <a href="' . route('index') . '"> Clique aqui </a> para ir para página inicial';
});