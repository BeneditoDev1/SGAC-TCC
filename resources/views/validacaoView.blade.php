<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar atividades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
        body {
            background-color: #034811;
            min-height: 50rem;
            padding-top: 4.5rem;
        }

        .container {
            background-color: white;
            padding: 20px;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .usuario {
            position: static;
            top: 10px;
            right: 80px;
            z-index: 1000;
            color: white;
        }

        .logout-button {
            position: static;
            top: 10px;
            right: 20px;
            z-index: 1000;
        }

        /* CSS para manter o título centralizado */
        h1 {
            text-align: center;
            margin-bottom: 20px;
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

        .navbar-brand{
            margin-left: 16%;
        }

        @media (max-width: 767px){
            .logout-button {
                display: none;
            }
            .navbar-brand{
            margin-left: 2%;
            }
            .usuario {
            position: fixed;
            top: 15px;
            right: 80px;
            z-index: 1000;
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
                    <!-- Add logout button as a menu item on smaller screens -->
                    <li class="nav-item d-md-none">
                        @if (Auth::check())
                            <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                @csrf
                                <a type="submit" class="nav-link active"><strong>Sair</strong></a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-link active">Entrar</a>
                        @endif
                    </li>
                </ul>
                <!-- Show logout button on larger screens -->
                <ul class="navbar-nav ml-auto d-flex align-items-center d-md-block" style="margin-left: 15%">
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
    <div class="container table-responsive">
        <h1>Validar atividades de {{ $usuario->name }}</h1>

        <table class="table table-bordered table-striped mt-4">
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
                    <td style="max-width: 150px">
                        <a href="{{ asset('uploads/' . $atividade->arquivo) }}" download>{{ $atividade->titulo }}</a>
                    </td>
                    <td>
                        <form action="{{ route('atividade.salvarStatus', ['id' => $atividade->id]) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <select class="form-select" name="status">
                                    @foreach(['Em análise', 'Concluído', 'Cancelado', 'Pendente'] as $statusOption)
                                    <option value="{{ $statusOption }}" {{ isset($atividadeStatus[$atividade->id]) && $atividadeStatus[$atividade->id] == $statusOption ? 'selected' : '' }}>
                                        {{ $statusOption }}
                                    </option>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
