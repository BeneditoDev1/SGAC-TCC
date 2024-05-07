<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Usuario;
use App\Models\Turma;
use Exception as GlobalException;

class TurmaController extends Controller
{
    public function listar()
    {
        $turmas = Turma::orderBy('nome')->get();
        return view('listarturma', compact('turmas'));
    }

    public function novo()
    {
        $turma = new Turma();
        $turma->id = 0;
        $cursos = Curso::all();
        return view('cadastroturma', compact('turma', 'cursos'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $turma = new Turma();
        } else {
            $turma = Turma::find($request->input('id'));
        }

        $turma->nome = $request->input('nome');
        $turma->semestre = $request->input('semestre');
        $turma->ano = $request->input('ano');
        $turma->curso_id = $request->input('curso_id');

        $turma->save();

        return redirect('turma/listar');
    }

    public function editar($id)
{
    $turma = Turma::find($id);
    $curso = Curso::all();
    return view('cadastroturma', compact('turma', 'cursos'));
}

public function atualizar(Request $request, $id)
{
    $turma = Turma::find($id);
    $turma->nome = $request->input('nome');
    $turma->semestre = $request->input('semestre');
    $turma->ano = $request->input('ano');
    $turma->save();

    return redirect()->route('turma.listar');
}

public function excluir($id)
{
    try {
        $turma = Turma::findOrFail($id);
        if (Usuario::where('turma_id', $id)->count() > 0) {
            throw new GlobalException('Não é possível excluir o turma, pois ele está vinculado a um ou mais usuários.');
        }
        $turma->delete();
    } catch (GlobalException $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }

    return redirect()->route('turma.listar');
}
}
