<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos com Atividades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 767px) {
            .logout-button {
                display: none;
            }
        }

        h1 {
            text-align: center;
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, 0);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        body {
            min-height: 50rem;
            padding-top: 4.5rem;
            background-color: #034811;
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
            text-align: left;
        }

        .row {
            margin-left: 12%;
            margin-bottom: 5%;
        }

        .usuario {
            margin-right: 10px;
            color: white;
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
        }

    </style>
</head>
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
    <body>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="container">
            <h1>Alunos com Atividades</h1>
            <table class="table table-bordered table-striped">
                @if (Auth::id() == 2)
                    <form action="{{ route('atividade.listar') }}" method="GET">
                        <div class="input-group rounded" style="margin-bottom: 2%">
                            <input type="search" class="form-control rounded" id="search" name="search" placeholder="Digite o nome do usuário" aria-label="Search" aria-describedby="search-addon" style="width: 40%"/>
                            <button class="btn btn-primary" type="submit" style="width: 10%">
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
                        // Calcular totalHorasObrigatorias baseado na turma
                        $turma = $usuario->turma; // Supondo que você tem uma relação turma no usuário
                        $totalHorasObrigatorias = 0;

                        if ($turma) {
                            if ($turma->ano_inicio >= 2019 && $turma->ano_fim <= 2022) {
                                $totalHorasObrigatorias = 150;
                            } elseif ($turma->ano_inicio > 2022) {
                                $totalHorasObrigatorias = 80;
                            }
                        }

                        // Calcular total de horas concluídas pelo usuário
                        $horasConcluidas = $horasConcluidasPorUsuario[$usuario->id] ?? 0;

                        // Verificar se o total de horas concluídas é igual ao total de horas obrigatórias
                        $todasConcluidas = $totalHorasObrigatorias > 0 && $horasConcluidas >= $totalHorasObrigatorias;
                    @endphp
                    <tr>
                        <td><a href="{{ route('atividade.listarAtividadesUsuario', $usuario->id) }}">{{ $usuario->name }}</a></td>
                        <td>{{ $usuario->email }}</td>
                        <td style="{{ $todasConcluidas ? 'color: green; font-weight: bolder;' : '' }}">
                            {{ $horasConcluidas }}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('atividade.listarAtividadesUsuario', $usuario->id) }}">Ver Atividades</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('atividade.relatorio', $usuario->id) }}">Gerar Relatório</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
</html>
