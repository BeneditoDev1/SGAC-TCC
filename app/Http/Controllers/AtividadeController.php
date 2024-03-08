<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use Illuminate\Validation\Rule;
use App\Models\Curso;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;

class AtividadeController extends Controller
{
    public function listar()
    {
        $atividades = Atividade::orderBy('titulo')->get();
        return view('listarAtividade', compact('atividades'));
    }

    public function novo()
    {
        $atividade = new Atividade();
        $atividade->id = 0;
        $cursos = Curso::all();
        $usuarios = Usuario::all();
        return view('cadastroAtividade', compact('atividade', 'cursos', 'usuarios'));
    }

    public function salvar(Request $request)
    {

        // Cria ou atualiza a atividade
        $atividade = $request->input('id') ? Atividade::findOrFail($request->input('id')) : new Atividade;
        $nomeArquivo = $request->input('nome_arquivo');
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');
            $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();

            $arquivo->move(public_path('uploads'), $nomeArquivo);
        }
        $atividade->titulo = $request->input('titulo');
        $atividade->credencial = $request->input('credencial');
        $atividade->categoria = $request->input('categoria');
        $atividade->semestre = $request->input('semestre');
        $atividade->curso_id = $request->input('curso_id');
        $atividade->usuario_id = $request->input('usuario_id');
        $atividade->data_inicio = $request->input('data_inicio');
        $atividade->data_conclusao = $request->input('data_conclusao');
        $atividade->total_horas = $request->input('total_horas');
        $atividade->arquivo = $nomeArquivo;

        $atividade->save();

        return redirect()->route('atividade.listar')->with('success', 'Atividade salva com sucesso!');
    }

    public function editar($id)
    {
        $atividade = Atividade::find($id);
        return view('cadastroAtividade', compact('atividade'));
    }

    public function atualizar(Request $request, $id)
    {
        $atividade = Atividade::find($id);
        $atividade->titulo = $request->input('titulo');
        $atividade->credencial = $request->input('credencial');
        $atividade->categoria = $request->input('categoria');
        $atividade->semestre = $request->input('semestre');
        $atividade->usuario = $request->input('usuario');
        $atividade->data_inicio = $request->input('data_inicio');
        $atividade->total_horas = $request->input('total_horas');
        $atividade->data_conclusao = $request->input('data_conclusao');

        // Obtendo o ID do curso selecionado
        $cursoId = $request->input('curso_id');

        // Verificar se um curso com o ID especificado existe
        $curso = Curso::find($cursoId);

        if ($curso) {
          $atividade->curso_id = $curso->id; // Associar o usuário ao curso usando curso_id
        } else {
          $atividade->curso__id = 4;
        }

        $atividade->save();

        return redirect()->route('atividade.listar');
    }

    public function excluir($id)
    {
        $atividade = Atividade::find($id);
        $atividade->delete();

        return redirect()->route('atividade.listar');
    }

    public function download(Request $request, $id)
{
    $atividade = Atividade::findOrFail($id);

    return response()->download(public_path('uploads/' . $atividade->arquivo), $atividade->arquivo);
}

}
