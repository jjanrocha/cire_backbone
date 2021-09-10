<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

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
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/login',[LoginController::class, 'authenticate'])->name('login');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

/* CRUD de usuários */
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index')->middleware('auth');
Route::post('/usuarios/lista_usuarios', [UsuarioController::class, 'listarUsuarios'])->name('usuarios.listar')->middleware('auth');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create')->middleware('auth');
Route::post('/usuarios/store', [UsuarioController::class, 'store'])->name('usuarios.store')->middleware('auth');
Route::get('/usuarios/{user}', [UsuarioController::class, 'show'])->name('usuarios.show')->middleware('auth');
Route::delete('/usuarios/{user}/destroy', [UsuarioController::class, 'destroy'])->name('usuarios.delete')->middleware('auth');

