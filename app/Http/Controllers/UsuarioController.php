<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception as GlobalException;

class UsuarioController extends Controller
{
    public function listar()
    {
        $usuarios = User::orderBy('name')->get();
        return view('listarUsuario', compact('usuarios'));
    }

    public function listarCurso()
    {
        $cursos = Auth::user()->is_superuser ? Curso::all() : Auth::user()->cursos;
        return view('curso.listar', compact('cursos'));
    }

    public function listarTurma()
    {
        $turmas = Auth::user()->is_superuser ? Turma::all() : Auth::user()->turmas;
        return view('turma.listar', compact('turmas'));
    }

    public function novo()
    {
        $usuario = new User();
        $cursos = Curso::all();
        $turmas = Turma::all();
        $usuario->data_ativacao = now();
        return view('cadastroUsuario', compact('usuario', 'cursos', 'turmas'));
    }

    public function salvar(Request $request)
    {
        if ($request->input('id') == 0) {
            $usuario = User::find($request->input('id'));
        } else {
            $usuario = new User();
        }

        if ($request->filled('password') && $usuario) {
            $usuario->password = Hash::make($request->input('password'));
        }

        if ($request->filled('password') && $usuario) {
            $usuario->password = Hash::make($request->input('password'));
        }

        if ($usuario) {
            $usuario->fill($request->except(['password', 'password_confirmation']));
        }

    if (is_null($usuario->data_ativacao)) {
        $usuario->data_ativacao = now();
    }

    $turma = Turma::find($request->input('turma_id'));
    if ($turma) {
        if ($turma->ano_inicio >= 2019 && $turma->ano_fim <= 2022) {
            $usuario->horas_obrigatorias = 150;
        } elseif ($turma->ano_inicio > 2022) {
            $usuario->horas_obrigatorias = 80;
        } else {
            $usuario->horas_obrigatorias = 0;
        }
    } else {
        $usuario->horas_obrigatorias = 0;
    }

    $usuario->turma_id = $request->input('turma_id');

    $usuario->save();

    return redirect()->route('usuario.listar')->with('success', 'Usuário salvo com sucesso.');
}

    public function editar($id)
    {
        $usuario = User::find($id);
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('cadastroUsuario', compact('usuario', 'cursos', 'turmas'));
    }

    public function excluir($id)
    {
    //try {
        $usuario = User::findOrFail($id);
        //if ($usuario->atividade) {
          //  throw new GlobalException('Não é possível excluir o usuário, pois ele está vinculado a uma atividade.');
        //}

        $usuario->delete();

        return redirect()->route('usuario.listar')->with('success', 'Usuário excluído com sucesso.');
        //} catch (GlobalException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        //} catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir o usuário.');
        //}
    }
}

