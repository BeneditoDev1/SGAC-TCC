<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use Exception as GlobalException;

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

        $curso->save();

        return redirect()->route('curso.listar');
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
        $curso->save();

        return redirect()->route('curso.listar');
    }

    public function excluir($id)
    {
    try {
        $curso = Curso::findOrFail($id);
        if ($curso->usuarios()->exists()) {
            throw new GlobalException('Não é possível excluir o curso, pois ele está vinculado a um ou mais usuários.');
        }

        $curso->delete();

        return redirect()->route('curso.listar')->with('success', 'Curso excluído com sucesso.');
        } catch (GlobalException $e) {
        return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erro ao excluir o curso.');
        }
    }
}

