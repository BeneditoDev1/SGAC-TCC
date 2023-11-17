<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AtividadeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/usuario/listar', [UsuarioController::class, 'listar'])->name('usuario.listar');
Route::get('/usuario/novo', [UsuarioController::class, 'novo'])->name('usuario.novo');
Route::post('/usuario/salvar', [UsuarioController::class, 'salvar'])->name('usuario.salvar');
Route::get('/usuario/editar/{id}', [UsuarioController::class, 'editar'])->name('usuario.editar');
Route::post('/usuario/atualizar/{id}', [UsuarioController::class, 'atualizar'])->name('usuario.atualizar');
Route::put('/usuario/atualizar/{id}', [UsuarioController::class, 'atualizar'])->name('usuario.atualizar');
Route::get('/usuario/excluir/{id}', [UsuarioController::class, 'excluir'])->name('usuario.excluir');


Route::get('/curso/listar', [CursoController::class, 'listar'])->name('curso.listar');
Route::get('/curso/novo', [CursoController::class, 'novo'])->name('curso.novo');
Route::post('/curso/salvar', [CursoController::class, 'salvar'])->name('curso.salvar');
Route::get('/curso/editar/{id}', [CursoController::class, 'editar'])->name('curso.editar');
Route::post('/curso/atualizar/{id}', [CursoController::class, 'atualizar'])->name('curso.atualizar');
Route::put('/curso/atualizar/{id}', [CursoController::class, 'atualizar'])->name('curso.atualizar');
Route::get('/curso/excluir/{id}', [CursoController::class, 'excluir'])->name('curso.excluir');

Route::get('/atividade/listar', [AtividadeController::class, 'listar'])->name('atividade.listar');
Route::get('/atividade/novo', [AtividadeController::class, 'novo'])->name('atividade.novo');
Route::post('/atividade/salvar', [AtividadeController::class, 'salvar'])->name('atividade.salvar');
Route::get('/atividade/editar/{id}', [AtividadeController::class, 'editar'])->name('atividade.editar');
Route::post('/atividade/atualizar/{id}', [AtividadeController::class, 'atualizar'])->name('atividade.atualizar');
Route::put('/atividade/atualizar/{id}', [AtividadeController::class, 'atualizar'])->name('atividade.atualizar');
Route::get('/atividade/excluir/{id}', [AtividadeController::class, 'excluir'])->name('atividade.excluir');

Route::get('/', function () {
    return view('index');
});
