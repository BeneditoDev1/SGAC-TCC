<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
        body {
            background-color: #034811; /* Fundo verde */
            color: white; /* Texto branco */
            margin-bottom: 70px;
        }

        .container {
            background-color: white; /* Fundo branco */
            padding: 20px; /* Espaçamento interno */
            border-radius: 10px; /* Bordas arredondadas */
            margin-top: 70px; /* Espaçamento acima para a barra de navegação */
            color: black; /* Texto preto */
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

        .logout-button {
            position: fixed;
            top: 10px; /* Distância do topo */
            right: 20px; /* Distância da direita */
            z-index: 1000; /* Acima de outros elementos */
        }

        .btn-primary {
            margin-bottom: 1%;
        }

        .logout-button button {
            padding: 5px 10px; /* Tamanho do botão Sair */
        }

        .usuario {
            position: fixed;
            top: 10px;
            right: 80px;
            z-index: 1000;
        }

        @media (max-width: 767px) {
            .logout-button {
                display: none;
            }
            .btn-primary {
                margin-left: 0;
                width: 100%; /* Botão ocupa toda a largura */
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
                        <a class="nav-link active" aria-current="page" href="{{ url('usuario/listar') }}" id="listarUsuarioLink"><strong>Aluno</strong></a>
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

    <div class="container table-responsive">
        <h1 class="text-center">Aluno</h1>
        @if (Auth::id() == 2)
            <div class="text-end mb-3">
                <a href="{{ route('usuario.novo') }}" class="btn btn-primary">Novo Aluno</a>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Matricula</th>
                        <th>E-mail</th>
                        <th>Sexo</th>
                        <th>Data de ativação</th>
                        <th>RA</th>
                        <th>Semestre</th>
                        <th>Nome do Curso</th>
                        <th>Turma</th>
                        <th>Total de horas</th>
                        @if (Auth::id() == 2)
                        <th>Editar</th>
                        <th>Excluir</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    @if(Auth::id() == 2 || Auth::user()->id == $usuario->id)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->cpf }}</td>
                        <td>{{ $usuario->matricula }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->sexo }}</td>
                        <td>{{ $usuario->data_ativacao->format('d/m/Y') }}</td>
                        <td>{{ $usuario->ra }}</td>
                        <td>{{ $usuario->semestre }}</td>
                        <td>{{ $usuario->curso->nome }}</td>
                        <td>{{ $usuario->turma ? $usuario->turma->nome : 'Sem turma' }}</td>
                        <td>{{ $usuario->turma ? $usuario->turma->horas : 'Sem horas' }}</td>
                        @endif
                        @if (Auth::id() == 2)
                            <td><a class="btn btn-primary" href="{{ route('usuario.editar', $usuario->id) }}">Editar</a></td>
                            <td>
                                <form action="{{ route('usuario.excluir', $usuario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
