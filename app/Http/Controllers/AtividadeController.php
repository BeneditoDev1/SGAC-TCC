<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use Illuminate\Validation\Rule;
use App\Models\Curso;
use App\Models\Usuario;

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
        return view('cadastroAtividade', compact('atividade'));
    }

    public function salvar(Request $request)
    {
        // Validação
        $request->validate([
            'titulo' => 'required|string|max:255',
            'credencial' => 'required|string|max:255',
            'nome_curso' => 'required|string|max:255',
            'tipo' => ['required', Rule::in(['Tipo1', 'Tipo2', 'Tipo3'])], // Substitua 'Tipo1', 'Tipo2', 'Tipo3' pelos tipos reais permitidos
            'semestre' => 'required|integer',
            'usuario' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_conclusao' => 'required|date|after:data_inicio',
        ]);

        if ($request->input('id') == 0) {
            $atividade = new Atividade();
        } else {
            $atividade = Atividade::find($request->input('id'));
        }

        $atividade->titulo = $request->input('titulo');
        $atividade->credencial = $request->input('credencial');
        $atividade->nome_curso = $request->input('nome_curso');
        $atividade->tipo = $request->input('tipo');
        $atividade->semestre = $request->input('semestre');
        $atividade->usuario = $request->input('usuario');
        $atividade->data_inicio = $request->input('data_inicio');
        $atividade->data_conclusao = $request->input('data_conclusao');

        $atividade->save();

        return redirect('atividade/listar');
    }

    public function editar($id)
    {
        $atividade = Atividade::find($id);
        return view('cadastroAtividade', compact('atividade'));
    }

    public function atualizar(Request $request, $id)
    {
        // Validação
        $request->validate([
            'titulo' => 'required|string|max:255',
            'credencial' => 'required|string|max:255',
            'nome_curso' => 'required|string|max:255',
            'tipo' => ['required', Rule::in(['Tipo1', 'Tipo2', 'Tipo3'])], // Substitua 'Tipo1', 'Tipo2', 'Tipo3' pelos tipos reais permitidos
            'semestre' => 'required|integer',
            'usuario' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_conclusao' => 'required|date|after:data_inicio',
        ]);

        $atividade = Atividade::find($id);
        $atividade->titulo = $request->input('titulo');
        $atividade->credencial = $request->input('credencial');
        $atividade->nome_curso = $request->input('nome_curso');
        $atividade->tipo = $request->input('tipo');
        $atividade->semestre = $request->input('semestre');
        $atividade->usuario = $request->input('usuario');
        $atividade->data_inicio = $request->input('data_inicio');
        $atividade->data_conclusao = $request->input('data_conclusao');

        $atividade->save();

        return redirect()->route('atividade.listar');
    }

    public function excluir($id)
    {
        $atividade = Atividade::find($id);
        $atividade->delete();

        return redirect()->route('atividade.listar');
    }
}
