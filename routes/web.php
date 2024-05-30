<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AboutController;


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

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('usuario/listar', [UsuarioController::class, 'listar'])->name('usuario.listar');
    Route::get('usuario/novo', [UsuarioController::class, 'novo'])->name('usuario.novo');
    Route::post('usuario/salvar', [UsuarioController::class, 'salvar'])->name('usuario.salvar');
    Route::get('usuario/editar/{id}', [UsuarioController::class, 'editar'])->name('usuario.editar');
    Route::put('usuario/atualizar/{id}', [UsuarioController::class, 'salvar'])->name('usuario.atualizar');
    Route::get('usuario/excluir/{id}', [UsuarioController::class, 'excluir'])->name('usuario.excluir');


Route::get('/curso/listar', [CursoController::class, 'listar'])->name('curso.listar');
Route::get('/curso/novo', [CursoController::class, 'novo'])->name('curso.novo');
Route::post('/curso/salvar', [CursoController::class, 'salvar'])->name('curso.salvar');
Route::get('/curso/editar/{id}', [CursoController::class, 'editar'])->name('curso.editar');
Route::post('/curso/atualizar/{id}', [CursoController::class, 'atualizar'])->name('curso.atualizar');
Route::put('/curso/atualizar/{id}', [CursoController::class, 'atualizar'])->name('curso.atualizar');
Route::get('/curso/excluir/{id}', [CursoController::class, 'excluir'])->name('curso.excluir');

Route::get('/turma/listar', [TurmaController::class, 'listar'])->name('turma.listar');
Route::get('/turma/novo', [TurmaController::class, 'novo'])->name('turma.novo');
Route::post('/turma/salvar', [TurmaController::class, 'salvar'])->name('turma.salvar');
Route::get('/turma/editar/{id}', [TurmaController::class, 'editar'])->name('turma.editar');
Route::post('/turma/atualizar/{id}', [TurmaController::class, 'atualizar'])->name('turma.atualizar');
Route::put('/turma/atualizar/{id}', [TurmaController::class, 'atualizar'])->name('turma.atualizar');
Route::get('/turma/excluir/{id}', [TurmaController::class, 'excluir'])->name('turma.excluir');

Route::get('/atividade/listar', [AtividadeController::class, 'listar'])->name('atividade.listar');
Route::get('/atividade/novo', [AtividadeController::class, 'novo'])->name('atividade.novo');
Route::post('/atividade/salvar', [AtividadeController::class, 'salvar'])->name('atividade.salvar');
Route::get('/atividade/editar/{id}', [AtividadeController::class, 'editar'])->name('atividade.editar');
Route::post('/atividade/atualizar/{id}', [AtividadeController::class, 'atualizar'])->name('atividade.atualizar');
Route::put('/atividade/atualizar/{id}', [AtividadeController::class, 'atualizar'])->name('atividade.atualizar');
Route::get('/atividade/excluir/{id}', [AtividadeController::class, 'excluir'])->name('atividade.excluir');
Route::get('atividade/download/{id}', 'AtividadeController@download')->name('atividade.download');
Route::get('atividade/validacaolistar', [AtividadeController::class, 'validacaoListar'])->name('atividade.validacao');
Route::get('atividade/validacaoView', [AtividadeController::class, 'validacaoView'])->name('validacaoView');
Route::get('atividade/validacao/status', [AtividadeController::class, 'validacao'])->name('atividade.status');
Route::post('/atividade/salvar-status/{id}', [AtividadeController::class, 'salvarStatus'])->name('atividade.salvarStatus');
Route::get('/about', [AboutController::class, 'index']);




Route::get('/', function () {
    return view('index');
});


});

require __DIR__.'/auth.php';
