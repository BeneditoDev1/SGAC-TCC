<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Curso</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
        body {
            background-color: #034811; /* Define o fundo verde */
            color: white; /* Define a cor do texto como branco */
        }

        .container {
            background-color: white; /* Define o fundo do container como branco */
            padding: 20px; /* Adiciona algum espaçamento interno ao container */
            border-radius: 10px; /* Adiciona bordas arredondadas ao container */
            margin-top: 70px; /* Adiciona um espaço acima do container para a barra de navegação */
            color: black; /* Define a cor do texto dentro do container como preto */
        }

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

        .btn-primary {
            margin-bottom: 1%;
        }

        .logout-button button {
            padding: 5px 10px; /* Reduz o tamanho do botão Sair */
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

    <div class="container">
        <h1 style="text-align: center">Curso</h1>
        @if (Auth::id() == 2)
            <div class="text-end mb-3">
                <a href="{{ route('curso.novo') }}" class="btn btn-primary">Novo Curso</a>
            </div>
        @endif
        <table class="table table-bordered table-striped" style="text-align: center">
            <thead>
                <tr>
                    <th>Nome do Curso</th>
                    @if (Auth::id() == 2)
                        <th>Editar</th>
                        <th>Excluir</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    @if (Auth::id() == 2)
                    <td><a class="btn btn-primary" href="editar/{{ $curso->id }}">Editar</a></td>
                    <td>
                        <form method="POST" action="{{ route('curso.excluir', $curso->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Excluir</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script>
        @if (session('error'))
        alert('{{ session('error') }}');
        @endif
    </script>
</body>

</html>
