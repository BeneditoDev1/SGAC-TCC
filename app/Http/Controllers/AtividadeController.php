<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use Illuminate\Validation\Rule;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Exception as GlobalException;
use App\Http\Controllers\DB;

class AtividadeController extends Controller
{
    public function listar(Request $request)
{
    $query = Atividade::with('usuario')->orderBy('titulo');

    if ($request->has('search') && !empty($request->input('search'))) {
        $search = $request->input('search');
        $query->whereHas('usuario', function ($q) use ($search) {
            $q->where('nome', 'like', '%' . $search . '%');
        });
    }

    $atividades = $query->get();
    $status = $this->validacao();

    return view('listarAtividade', compact('atividades', 'status'));
    }

    public function novo()
    {
        $atividade = new Atividade();
        $atividade->id = 0;
        $cursos = Curso::all();
        $usuarios = User::all();
        return view('cadastroAtividade', compact('atividade', 'cursos', 'usuarios'));
    }

    public function Alunos(Request $request)
    {
        $usuarios = User::has('atividades')->get();
        return view('listarAlunosAtividade', compact('usuarios'));
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
        $atividade->status = 'Em análise';

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

    public function validacaoListar()
    {
        $atividades = Atividade::orderBy('titulo')->get();
        $status = $this->validacao();
        return view('validacaoView', compact('atividades', 'status'));
    }

    public function validacao()
{
    $status = [
        'Em análise' => 0,
        'Concluído' => 0,
        'Cancelado' => 0,
        'Pendente' => 0,
    ];

    // Recupere os dados das atividades
    $atividades = Atividade::all();

    // Itere sobre as atividades para acumular as horas para cada status
    foreach ($atividades as $atividade) {
        switch ($atividade->status) {
            case 'Em análise':
                $status['Em análise'] += $atividade->total_horas;
                break;
            case 'Concluído':
                $status['Concluído'] += $atividade->total_horas;
                break;
            case 'Cancelado':
                $status['Cancelado'] += $atividade->total_horas;
                break;
            case 'Pendente':
                $status['Pendente'] += $atividade->total_horas;
                break;
        }
    }

    // Retorne os dados para serem utilizados na view
    return $status;
}

    public function validacaoView()
    {

        $atividades = Atividade::with('usuario')->orderBy('titulo')->get();
        // Chame a função validacao para obter os dados necessários
        $status = $this->validacao();

        // Retorne a view 'validacao' com os dados necessários
        return view('validacaoView', compact('atividades', 'status'));
    }


    public function salvarAtividadeValidada(Request $request)
{
    // Recupere os dados do formulário de validação
    $dados = $request->all();

    try {

        // Crie ou atualize a atividade
        $atividade = $dados['id'] ? Atividade::findOrFail($dados['id']) : new Atividade;

        // Preencha os campos da atividade
        $atividade->titulo = $dados['titulo'];
        $atividade->credencial = $dados['credencial'];
        $atividade->categoria = $dados['categoria'];
        $atividade->semestre = $dados['semestre'];
        $atividade->curso_id = $dados['curso_id'];
        $atividade->usuario_id = $dados['usuario_id'];
        $atividade->data_inicio = $dados['data_inicio'];
        $atividade->data_conclusao = $dados['data_conclusao'];
        $atividade->total_horas = $dados['total_horas'];
        $atividade->arquivo = $dados['nome_arquivo'];

        // Verifique o status e defina o status da atividade
        $status = $dados['status'];
        if (in_array($status, ['Aprovado', 'Cancelado', 'Pendente', 'Em análise'])) {
            $atividade->status = $status;
        } else {
            // Se o status fornecido não estiver entre os valores permitidos, defina como 'Em análise' por padrão
            $atividade->status = 'Em análise';
        }

        // Salve a atividade no banco de dados
        $atividade->save();

        // Commit da transação se tudo estiver ok

        // Redirecione de volta para a lista de atividades com uma mensagem de sucesso
        return redirect()->route('atividade.listar')->with('success', 'Atividade validada e salva com sucesso!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Ocorreu um erro ao salvar a atividade validada. Por favor, tente novamente.');
    }
}

public function salvarStatus(Request $request, $id)
{
    // Encontre a atividade pelo ID
    $atividade = Atividade::findOrFail($id);

    // Verifique se o status foi recebido corretamente
    $status = $request->input('status');
    // Verifique se o status é um dos valores permitidos
    if (in_array($status, ['Em análise', 'Concluído', 'Cancelado', 'Pendente'])) {
        // Atualize o status da atividade com o valor enviado do formulário
        $atividade->status = $status;
        $atividade->save();

        // Redirecione de volta para a tela de listagem de atividades
        return redirect()->route('listarAlunos')->with('success', 'Status da atividade atualizado com sucesso!');
    } else {
        // Se o status não for válido, redirecione de volta com uma mensagem de erro
        return redirect()->back()->with('error', 'Status inválido!');
    }
}

    public function download(Request $request, $id)
{
    $atividade = Atividade::findOrFail($id);

    return response()->download(public_path('uploads/' . $atividade->arquivo), $atividade->arquivo);
}

public function listarAtividadesUsuario($id)
{
    $usuario = User::findOrFail($id);
    $atividades = $usuario->atividades;
    return view('validacaoView', compact('usuario', 'atividades'));
}

public function validacaoUsuario($id)
{
    $usuario = User::findOrFail($id);
    $atividades = $usuario->atividades;
    $status = $this->validacao(); // Supondo que você tenha esse método para obter o status
    return view('validacaoView', compact('usuario', 'atividades', 'status'));
}

}
