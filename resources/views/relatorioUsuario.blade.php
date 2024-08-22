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
            background-color: white; /* Fundo do container */
            padding: 20px; /* Espaçamento interno */
            border-radius: 10px; /* Bordas arredondadas */
            margin-top: 70px; /* Espaço superior */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra leve */
        }
        h1 {
            text-align: center; /* Centralizar o título */
            margin-bottom: 30px;
        }
        .table th, .table td {
            vertical-align: middle; /* Alinhamento vertical */
        }
        .assinaturas {
            margin-top: 50px; /* Espaço acima das assinaturas */
        }
        .assinaturas p {
            margin-bottom: 50px; /* Espaçamento abaixo do texto de assinatura */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="font-size: 60px">SGAC - Relatório de Atividades</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Matricula</th>
                        <th>E-mail</th>
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
                        <th>Atividade</th>
                        <th>Horas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atividades as $atividade)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($atividade->data_inicio)->format('d/m/Y') }}</td>
                        <td>{{ $atividade->titulo }}</td>
                        <td>{{ $atividade->total_horas }}</td>
                    </tr>
                    @endforeach

                    @if($atividades->isEmpty())
                    <tr>
                        <td colspan="3">Nenhuma atividade encontrada</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="assinaturas">
            <p>Assinatura do Aluno:</p>
            <br><br>
            <p>Assinatura do Coordenador:</p>
            <br><br>
        </div>
    </div>
</body>
</html>
