<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
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

        $request->validate([
            'ano_inicio' => 'required|integer',
            'ano_fim' => 'required|integer',
        ]);

        $turma = new Turma();
        $turma->nome = $request->input('nome');
        $turma->semestre = $request->input('semestre');
        $turma->curso_id = $request->input('curso_id');
        $turma->ano_inicio = $request->input('ano_inicio');
        $turma->ano_fim = $request->input('ano_fim');

        $turma->setHorasAttribute(null);
        $turma->save();

        return redirect('turma/listar');
    }

    public function editar($id)
    {
    $turma = Turma::find($id);
    $cursos = Curso::all(); // mudar para $cursos

    return view('cadastroturma', compact('turma', 'cursos'));
    }

    public function atualizar(Request $request, $id)
    {
    $turma = Turma::find($id);
    $turma->nome = $request->input('nome');
    $turma->semestre = $request->input('semestre');
    $turma->curso_id = $request->input('curso_id');
    $turma->ano_inicio = $request->input('ano_inicio');
    $turma->ano_fim = $request->input('ano_fim');

    $turma->setHorasAttribute(null);
    $turma->save();

    return redirect()->route('turma.listar');
    }

    public function excluir($id)
    {
    try {
        $turma = Turma::findOrFail($id);
        if ($turma->usuario) {
            throw new GlobalException('Não é possível excluir a turma, pois ela está vinculada a um usuário');
        }

        $turma->delete();

        return redirect()->route('turma.listar')->with('success', 'Turma excluída com sucesso.');
    } catch (GlobalException $e) {
        return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
