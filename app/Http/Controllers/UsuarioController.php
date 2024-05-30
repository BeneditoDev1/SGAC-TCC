<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Support\Facades\Hash;
use Exception as GlobalException;

class UsuarioController extends Controller
{
    public function listar()
    {
        $usuarios = Usuario::orderBy('nome')->get();
        return view('listarUsuario', compact('usuarios'));
    }

    public function novo()
    {
        $usuario = new Usuario();
        $usuario->id = 0;
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('cadastroUsuario', compact('usuario', 'cursos', 'turmas'));
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|size:11',
            'matricula' => 'required|string|size:15',
            'email' => 'required|email|unique:usuarios,email,' . $request->input('id'),
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($request->input('id') == 0) {
            $usuario = new Usuario();
            $usuario->password = Hash::make($request->input('password'));
        } else {
            $usuario = Usuario::find($request->input('id'));
            if ($request->filled('password')) {
                $usuario->password = Hash::make($request->input('password'));
            }
        }

        $usuario->fill($request->except('password'));
        $usuario->tipo_usuario = $request->input('tipo_usuario', 2); // Default to student (2) if not provided
        $usuario->save();

        return redirect()->route('usuario.listar');
    }

    public function editar($id)
    {
        $usuario = Usuario::find($id);
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('cadastroUsuario', compact('usuario', 'cursos', 'turmas'));
    }

    public function excluir($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            if ($usuario->atividade) {
                throw new GlobalException('Não é possível excluir o usuário, pois ele está vinculado a uma atividade.');
            }

            $usuario->delete();
            return redirect()->route('usuario.listar')->with('success', 'Usuário excluído com sucesso.');
        } catch (GlobalException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
