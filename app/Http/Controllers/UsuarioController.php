<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function listar(){
        $usuarios = Usuario::orderBy('nome')->get();
        return view('listarUsuario', compact('usuarios'));
    }

    public function novo(){
        $usuario = new Usuario();
        $usuario->id = 0;  
        return view('cadastroUsuario', compact('usuario'));
    }

    function salvar(Request $request) {
        if ($request->input('id') == 0) {
          $usuario = new Usuario();
        } else {
          $usuario = Usuario::find($request->input('id'));
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
    
    
        $usuario->nome = $request->input('nome');
        $usuario->cpf = $request->input('cpf');
        $usuario->matricula = $request->input('matricula');
        $usuairo->sexo = $request->input('sexo');
        $usuario->data_ativacao = $request->input('data_ativacao');
        $usuario->ra = $request->input('ra');
        $usuario->nome_curso = $request->input('nome_curso');
        $usuario->save();
        return redirect('usuario/listar');
      }
    
      function editar($id) {
        $autor = Autor::find($id);
        return view('frmAutor', compact('autor'));
      }
    
      function excluir($id) {
        $autor = Autor::find($id);
        if ($autor->imagem != "") {
          Storage::delete("public/imagens/".$autor->imagem);
        }
        $autor->delete();
        return redirect('autor/listar');
      }
    
    
}