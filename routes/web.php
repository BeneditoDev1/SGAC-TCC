<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;

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

Route::get('/curso/listar', [CursoController::class, 'listar'])->name('curso.listar');
Route::get('/curso/novo', [CursoController::class, 'novo'])->name('curso.novo');
Route::post('/curso/salvar', [CursoController::class, 'salvar'])->name('curso.salvar');



Route::get('/', function () {
    return view('index');
});
