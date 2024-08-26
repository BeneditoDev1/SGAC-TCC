<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos com Atividades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
        body {
            min-height: 50rem;
            padding-top: 4.5rem;
            background-color: #034811;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .logout-button {
            position: fixed;
            top: 10px;
            right: 20px;
            z-index: 1000;
        }

        .usuario {
            position: fixed;
            top: 10px;
            right: 80px;
            z-index: 1000;
            color: white;
        }

        @media (max-width: 767px) {
            .logout-button, .usuario {
                position: static;
                margin: 12px 0;
                text-align: center;
                display: block;
            }

            .table th, .table td {
                font-size: 0.875rem;
                padding: 6px;
            }

            .table th {
                font-weight: bold;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
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
                        <a class="nav-link active" aria-current="page" href="{{ url('alunos') }}"><strong>Listar Aluno com Atividades</strong></a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('usuario/listar') }}"><strong>Aluno</strong></a>
                    </li>
                    @if (Auth::id() == 2)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('curso/listar') }}"><strong>Curso</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('turma/listar') }}"><strong>Turma</strong></a>
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

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="container table-responsive">
        <h1 style="text-align: center">Aluno com Atividade</h1>
    <div>
        <div style="table-responsive">
        <table class="table table-bordered table-striped">
            @if (Auth::id() == 2)
            <form action="{{ route('atividade.listar') }}" method="GET">
                <div class="input-group rounded mb-3">
                    <input type="search" class="form-control" id="search" style="width: 80%" name="search" placeholder="Digite o nome do usuário" aria-label="Search" aria-describedby="search-addon"/>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </form>
            @endif
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Horas Concluídas</th>
                    <th>Ações</th>
                    <th>Relatório</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                @php
                    $turma = $usuario->turma;
                    $totalHorasObrigatorias = 0;

                    if ($turma) {
                        if ($turma->ano_inicio >= 2019 && $turma->ano_fim <= 2022) {
                            $totalHorasObrigatorias = 150;
                        } elseif ($turma->ano_inicio > 2022) {
                            $totalHorasObrigatorias = 80;
                        }
                    }

                    $horasConcluidas = $horasConcluidasPorUsuario[$usuario->id] ?? 0;
                    $todasConcluidas = $totalHorasObrigatorias > 0 && $horasConcluidas >= $totalHorasObrigatorias;
                @endphp
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td style="{{ $todasConcluidas ? 'color: green; font-weight: bolder;' : '' }}">
                        {{ $horasConcluidas }}
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('atividade.listarAtividadesUsuario', $usuario->id) }}">Ver Atividades</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('atividade.relatorio', $usuario->id) }}">Gerar Relatório</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
