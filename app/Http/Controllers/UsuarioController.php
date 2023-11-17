<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Curso;

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
      $cursos = Curso::all(); // Obtenha todos os cursos
      return view('cadastroUsuario', compact('usuario', 'cursos'));
  }

  public function salvar(Request $request)
  {
      if ($request->input('id') == 0) {
          $usuario = new Usuario();
      } else {
          $usuario = Usuario::find($request->input('id'));
      }
  
      $usuario->nome = $request->input('nome');
      $usuario->cpf = $request->input('cpf');
      $usuario->matricula = $request->input('matricula');
      $usuario->sexo = $request->input('sexo');
      $usuario->data_ativacao = $request->input('dataAtiv');
      $usuario->ra = $request->input('ra');
      
      // Obtendo o ID do curso selecionado
      $cursoId = $request->input('curso_id');
      
      // Verificar se um curso com o ID especificado existe
      $curso = Curso::find($cursoId);
  
      if ($curso) {
          $usuario->curso_id = $curso->id; // Associar o usuário ao curso usando curso_id
      } else {
          $usuario->curso__id = 4;
      }
      
      $usuario->save();
      
      return redirect()->route('usuario.listar');
  }
  

  public function editar($id)
  {
      $usuario = Usuario::find($id);
      $cursos = Curso::all(); // Obtenha todos os cursos
      return view('cadastroUsuario', compact('usuario', 'cursos'));
  }

  public function excluir($id)
  {
      $usuario = Usuario::find($id);
      $usuario->delete();
      return redirect('usuario.listar');
  }
    
    
}
/*if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $upload = $file->store('public/imagens');
            $upload = explode("/", $upload);
            $tamanho = sizeof($upload);
            if ($autor->imagem != "") {
              Storage::delete("public/imagens/".$autor->imagem);
            }
            $autor->imagem = $upload[$tamanho-1];
        }*/