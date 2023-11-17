<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function listar()
    {
        $cursos = Curso::orderBy('nome')->get();
        return view('listarCurso', compact('cursos'));
    }

    public function novo()
    {
        $curso = new Curso();
        $curso->id = 0;
        return view('cadastroCurso', compact('curso'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $curso = new Curso();
        } else {
            $curso = Curso::find($request->input('id'));
        }

        $curso->nome = $request->input('nome');
        $curso->semestre = $request->input('semestre');
        $curso->ano = $request->input('ano');
        $curso->save();

        return redirect('curso/listar');
    }

    public function editar($id)
{
    $curso = Curso::find($id);
    return view('cadastroCurso', compact('curso'));
}

public function atualizar(Request $request, $id)
{
    $curso = Curso::find($id);
    $curso->nome = $request->input('nome');
    $curso->semestre = $request->input('semestre');
    $curso->ano = $request->input('ano');
    $curso->save();

    return redirect()->route('curso.listar');
}

public function excluir($id)
{
    $curso = Curso::find($id);
    $curso->delete();

    return redirect()->route('curso.listar');
}
}