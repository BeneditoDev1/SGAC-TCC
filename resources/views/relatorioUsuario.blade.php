<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Atividades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <style>
        .container {
            max-width: 1200px;
            margin: 40px auto 50px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background-color: #fff;
        }
        .table {
            text-align: center; /* Centralizar texto nas tabelas */
        }
        .table th, .table td {
            vertical-align: middle; /* Alinhamento vertical */
            padding: 8px 12px; /* Adiciona espaço interno nas células */
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9; /* Linhas alternadas */
        }
        .table-bordered {
            border: 1px solid #1f2021; /* Borda ao redor da tabela */
            table-layout: fixed; /* Força as colunas a terem o mesmo tamanho */
            width: 100%; /* Garante que a tabela ocupe 100% do espaço disponível */
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #1f2021; /* Borda ao redor das células */
            word-wrap: break-word; /* Quebra de linha automática para longos textos */
        }
        .table th {
            background-color: #f2f2f2; /* Cor de fundo para o cabeçalho */
            font-weight: bold;
            text-transform: uppercase; /* Texto em maiúsculas */
        }
        .assinaturas {
            margin-top: 50px; /* Espaço acima das assinaturas */
            display: flex;
            justify-content: space-around; /* Distribuir espaço igualmente entre os itens */
            align-items: flex-end;
        }
        .assinaturas div {
            text-align: center;
        }
        .assinaturas p {
            margin-bottom: 50px; /* Espaçamento abaixo do texto de assinatura */
            font-weight: bold;
        }
        /* Aumentando o tamanho da fonte para as linhas do foreach */
        .atividade-row {
            font-size: 18px; /* Tamanho da fonte maior para as atividades */
        }
    </style>
</head>
<body>

    <div class="container">
        <p>REGULAMENTO DA ORGANIZAÇÃO-DIDÁTICO PEDAGÓGICA DO INSTITUTO FEDERAL DE EDUCAÇÃO,
            CIÊNCIA E TECNOLOGIA DE MATO GROSSO DO SUL</p>
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ public_path('marcaifms.png') }}" alt="Logo IFMS" style="max-width: 100%; height: auto;">
        </div>
        <h1 style="margin-bottom: 2%; text-align: center">SGAC - Relatório de Atividades</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Estudante</th>
                        <th>Matrícula</th>
                        <th>Curso</th>
                        <th>Ano/Período de Ingresso</th>
                        <th>Ano/Período de Conclusão</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->matricula }}</td>
                        <td>{{ $usuario->curso->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($usuario->data_ativacao)->format('Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($usuario->data_conclusao)->format('Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Data de inicio</th>
                        <th>Data de conclusão</th>
                        <th>Carga Conferida</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atividades as $atividade)
                    <tr class="atividade-row">
                        <td>{{ $atividade->titulo }}</td>
                        <td>{{ $atividade->categoria }}</td>
                        <td>{{ \Carbon\Carbon::parse($atividade->data_inicio)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($atividade->data_conclusao)->format('d/m/Y') }}</td>
                        <td>{{ $atividade->total_horas }}</td>
                    </tr>
                    @endforeach
                    @if($atividades->isEmpty())
                    <tr>
                        <td colspan="6">Nenhuma atividade encontrada</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th colspan="5">Carga Horária Total:</th>
                    <td>{{ $usuario->turma ? $usuario->turma->horas : 'Sem horas' }}</td>
                </tr>
            </table>
        </div>
        <div>
            <table>
                <tr>
                    <th colspan="5">Situação do Estudante:</th>
                    <td>{{ $situacao }}</td>
                </tr>
                <tr>
                    <th>Data de conclusão:</th>
                    <p>    </p>
                </tr>
                <tr>
                    <th>Aluno:</th>
                    <td>__________________________________</td>
                </tr>
                <br>
                <tr>
                    <th>Professor responsável:</th>
                    <td>__________________________________</td>
                </tr>
                <br>
                <tr>
                    <th>Coordenador:</th>
                    <td>__________________________________</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
