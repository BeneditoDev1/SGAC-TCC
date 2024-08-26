<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar atividades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">




<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

<link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

<style>
    body {
        background-color: #034811;
        color: white; /* Define a cor do texto como branco */
    }

    h1 {
        color: black;
    }

    .container {
        background-color: white; /* Define o fundo do container como branco */
        padding: 20px; /* Adiciona algum espaçamento interno ao container */
        border-radius: 10px; /* Adiciona bordas arredondadas ao container */
        margin-top: 70px; /* Adiciona um espaço acima do container para a barra de navegação */
        color: black; /* Define a cor do texto dentro do container como preto */
    }

    .table {
        color: black; /* Define a cor do texto da tabela como preto */
    }

    .table th,
    .table td {
        vertical-align: middle;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .container {
            max-width: 90%;
        }
    }

    /* Navbar */
    .navbar {
        background-color: green; /* Define a cor de fundo da barra de navegação como verde */
    }

    .navbar-collapse {
        text-align: center;
    }

    .navbar-collapse ul {
        display: inline-block;
        vertical-align: middle;
        float: none;
    }

    .navbar-collapse li {
        display: inline-block;
    }

    .navbar-collapse li a {
        display: inline-block;
        vertical-align: middle;
        color: white; /* Define a cor do texto dos links da barra de navegação como branco */
    }

    .logout-button {
            position: fixed;
            top: 10px; /* Distância do topo da página */
            right: 20px; /* Distância da direita da página */
            z-index: 1000; /* Z-index para garantir que o botão esteja acima de outros elementos */
        }

    .mb-3{
        margin-top: 2%;
    }

    .usuario {
            position: fixed;
            top: 10px;
            right: 80px;
            z-index: 1000;
    }
</style>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><strong>SGAC</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center text-center" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                @if (Auth::id() == 2)
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('alunos') }}"><strong>Listar Alunos com Atividades</strong></a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('usuario/listar') }}"><strong>Aluno</strong></a>
                </li>
                @if (Auth::id() == 2)
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('curso/listar') }}"><strong>Cursos</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('turma/listar') }}"><strong>Turmas</strong></a>
                </li>
                @endif
                @if (Auth::id() !== 2)
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('atividade/listar') }}"><strong>Atividades</strong></a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('about') }}"><strong>Consultar Regras</strong></a>
                </li>
                <!-- Add logout button as a menu item on smaller screens -->
                <li class="nav-item d-md-none">
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}" class="mb-0">
                            @csrf
                            <button type="submit" class="nav-link active">Sair</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-link active">Entrar</a>
                    @endif
                </li>
            </ul>
            <!-- Show logout button on larger screens -->
            <ul class="navbar-nav ml-auto d-flex align-items-center d-md-block">
                <li class="nav-item d-flex align-items-center">
                    @if (Auth::check())
                        <p class="usuario text-white mb-0 me-2"><strong>OLÁ {{ Auth::user()->name }}</strong></p>
                        <form method="POST" action="{{ route('logout') }}" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm logout-button">Sair</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm logout-button">Entrar</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

</head>

<body>
    <div class="container">
        <h1 style="text-align: center">Validar atividades de {{ $usuario->name }}</h1>

        <table class="table table-bordered table-striped mt-4" style="text-align: center">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Credencial</th>
                    <th>Semestre</th>
                    <th>Categoria</th>
                    <th>Data de início</th>
                    <th>Data de conclusão</th>
                    <th>Total de horas</th>
                    <th>Arquivo</th>
                    <th>Status</th>
                    <th>Salvar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atividades as $atividade)
                <tr>
                    <td>{{ $atividade->titulo }}</td>
                    <td>{{ $atividade->credencial }}</td>
                    <td>{{ $atividade->semestre }}</td>
                    <td>{{ $atividade->categoria }}</td>
                    <td>{{ \Carbon\Carbon::parse($atividade->data_inicio)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($atividade->data_conclusao)->format('d/m/Y') }}</td>
                    <td>{{ $atividade->total_horas }}</td>
                    <td style="max-width: 150px"><a href="{{ asset('uploads/' . $atividade->arquivo) }}" download>{{ $atividade->titulo }}</a></td>
                    <td>
                        <form action="{{ route('atividade.salvarStatus', ['id' => $atividade->id]) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <select class="form-select" name="status">
                                    @foreach(['Em análise', 'Concluído', 'Cancelado', 'Pendente'] as $statusOption)
                                        <option value="{{ $statusOption }}" {{ isset($atividadeStatus[$atividade->id]) && $atividadeStatus[$atividade->id] == $statusOption ? 'selected' : '' }}>{{ $statusOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <td>
                                <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
                            </td>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
