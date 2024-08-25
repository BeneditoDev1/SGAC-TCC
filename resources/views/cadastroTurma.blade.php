<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Turmas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #034811;
            color: white; /* Define a cor do texto como branco */
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #000000;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* Define o fundo do container como branco */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px; /* Adiciona bordas arredondadas ao container */
            margin-top: 60px;
            color: black;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn-primary,
        .btn-secondary {
            display: inline-block;
            width: 40%;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            margin: 10px;
            margin-left: 60px;
        }

        @media (min-width: 500px) and (max-width: 768px) {
            .btn-primary,
            .btn-secondary {
            display: inline-block;
            width: 40%;
            margin-left: 0;
            margin-right: 10px;
    }
}

@media (max-width: 500px) {
    .btn-primary,
    .btn-secondary {
        display: block;
        width: 100%;
        margin-left: 0;
        margin-right: 0;
    }
    .container {
        max-width: 459px;
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

        .lista{
            max-width: 15%;
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
        <h1 style="text-align: center">Cadastro de Turmas</h1>
        <form action="{{ $turma->id ? route('turma.atualizar', $turma->id) : route('turma.salvar') }}" method="POST">
            @csrf
            @if($turma->id)
            @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ $turma->id }}">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $turma->nome }}" required>
            </div>

            <div class="form-group lista">
                <label for="semestre">Semestre:</label>
                <select class="form-control" name="semestre" required>
                    <option value="1" @if($turma->semestre == 1) selected @endif>1</option>
                    <option value="2" @if($turma->semestre == 2) selected @endif>2</option>
                    <option value="3" @if($turma->semestre == 3) selected @endif>3</option>
                    <option value="4" @if($turma->semestre == 4) selected @endif>4</option>
                    <option value="5" @if($turma->semestre == 5) selected @endif>5</option>
                    <option value="6" @if($turma->semestre == 6) selected @endif>6</option>
                    <option value="7" @if($turma->semestre == 7) selected @endif>7</option>
                    <option value="8" @if($turma->semestre == 8) selected @endif>8</option>
                    <option value="9" @if($turma->semestre == 9) selected @endif>9</option>
                    <option value="10" @if($turma->semestre == 10) selected @endif>10</option>
                </select>
            </div>

            <div class="form-group">
                <label for="curso">Escolha o Curso</label>
                <select class="form-control" name="curso_id" required>
                    <option value="">Selecione um curso</option>
                    @foreach($cursos as $curso)
                    <option {{ $curso->id == old('curso_id', $turma->curso_id) ? 'selected' : '' }}
                        value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ano_inicio">Ano Inicio</label>
                <input type="text" class="form-control" name="ano_inicio" value="{{ $turma->ano_inicio }}" required>
            </div>

            <div class="form-group">
                <label for="ano_fim">Ano Fim</label>
                <input type="text" class="form-control" name="ano_fim" value="{{ $turma->ano_fim }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('turma.listar') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
