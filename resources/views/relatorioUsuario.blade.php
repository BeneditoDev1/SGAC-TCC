<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Atividades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <style>
        .container {
            max-width: 1200px;
            margin: 40px auto 50px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background-color: #fff;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .header img {
            margin-right: 20px; /* Espaçamento entre a imagem e o título */
        }
        h1 {
            flex-grow: 1; /* Faz o título ocupar o espaço restante */
            text-align: center; /* Centralizar o título */
            font-size: 30px;
            margin: 0; /* Remove margem padrão */
        }
        .table {
            text-align: center; /* Centralizar texto nas tabelas */
        }
        .table th, .table td {
            vertical-align: middle; /* Alinhamento vertical */
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
        .table-bordered {
            border: 1px solid #1f2021; /* Borda ao redor da tabela */
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #1f2021; /* Borda ao redor das células */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 style="margin-bottom: 2%">SGAC - Relatório de Atividades</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Estudante</th>
                        <th>Matricula</th>
                        <th>E-mail</th>
                        <th>ANO/PERÍODO DE INGRESSO</th>
                        <th>Nome do Curso</th>
                        <th>Turma</th>
                        <th>Total de horas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->matricula }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($usuario->data_ativacao)->format('Y') }}</td>
                        <td>{{ $usuario->curso->nome }}</td>
                        <td>{{ $usuario->turma ? $usuario->turma->nome : 'Sem turma' }}</td>
                        <td>{{ $usuario->turma ? $usuario->turma->horas : 'Sem horas' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Titulo</th>
                        <th>Horas</th>
                        <th>Categoria</th>
                        <th>Data de Conclusão</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atividades as $atividade)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($atividade->data_inicio)->format('d/m/Y') }}</td>
                        <td>{{ $atividade->titulo }}</td>
                        <td>{{ $atividade->total_horas }}</td>
                        <td>{{ $atividade->categoria}}</td>
                        <td>{{ \Carbon\Carbon::parse($atividade->data_conclusao)->format('d/m/Y')}}</td>
                    </tr>
                    @endforeach
                    @if($atividades->isEmpty())
                    <tr>
                        <td colspan="5">Nenhuma atividade encontrada</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="assinaturas">
            <div>
                <p>Assinatura do Aluno:</p>
                <p>_________________________</p>
            </div>
            <div>
                <p>Assinatura do Professor:</p>
                <p>_________________________</p>
            </div>
            <div>
                <p>Assinatura do Coordenador:</p>
                <p>_________________________</p>
            </div>
        </div>
    </div>
</body>
</html>
