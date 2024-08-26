<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Atividades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
        body {
            background-color: #034811;
            color: white;
        }

        h1 {
            color: black;
            text-align: center;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 70px;
            color: black;
            margin-bottom: 2%;
        }

        .table {
            color: black;
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
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }

            .btn-primary {
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        }

        /* Navbar */
        .navbar {
            background-color: green;
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
            color: white;
        }

        .logout-button {
            margin: 0;
        }

        .row {
            margin-bottom: 1%;
        }

        .btn-primary {
            margin-bottom: 1%;
        }

        .buscador {
            margin-top: 1%;
        }

        .logout-button {
            display: none;
        }

        .usuario {
            position: fixed;
            top: 10px;
            right: 80px;
            z-index: 1000;
        }

        /* Responsividade para a tabela */
        .table-responsive {
            overflow-x: auto;
        }

        /* Centraliza o botão de nova atividade no mobile */
    </style>
</head>
<body>
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

    <div class="container">
        <h1>Atividades</h1>
        <div class="row">
            @foreach ($status as $nomeStatus => $totalHoras)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $nomeStatus }}</h5>
                            <p class="card-text">Total de horas: {{ $totalHoras }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-end mb-3">
            <a href="{{ route('atividade.novo') }}" class="btn btn-primary">Nova Atividade</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
                        <th>Editar</th>
                        <th>Excluir</th>
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
                        <td>{{ $atividade->status }}</td>
                        <td><a class="btn btn-primary" href="{{ route('atividade.editar', $atividade->id) }}">Editar</a></td>
                        <td>
                            <form action="{{ route('atividade.excluir', $atividade->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
