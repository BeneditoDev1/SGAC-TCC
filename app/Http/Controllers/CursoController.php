<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function listar(){
        $cursos = Curso::orderBy('nome')->get();
        return view('listarCurso', compact('cursos'));
    }

    public function novo(){
        $curso = new Curso();
        $curso->id = 0;
        return view('cadastroCurso', compact('curso'));
    }

    function salvar(Request $request) {
        if ($request->input('id') == 0) {
          $curso = new Curso();
        } else {
          $curso = Curso::find($request->input('id'));
        }
        $curso->nome = $request->input('nome');
        $curso->semestre = $request->input('semestre');
        $curso->ano = $request->input('ano');
        return redirect('curso/listar');
    }
}
