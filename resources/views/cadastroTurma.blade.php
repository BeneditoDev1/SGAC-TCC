<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Turmas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">




<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">

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

        .btn-primary,
        .btn-secondary {
            display: block;
            width: 40%;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            margin: 10px auto;
            margin-left: 60%;
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

        .lista{
            max-width: 15%;
        }
    </style>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}"><strong>Inicio</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('usuario/listar')}}"><strong>Alunos</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('curso/listar')}}"><strong>Turmas</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('turma/listar')}}"><strong>Turma</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="{{url('atividade/listar')}}"><strong>Atividades</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="{{url('about')}}"><strong>Regras</strong></a>
                </li>
                <li class="nav-item">
                    @if (Auth::check())
                        <!-- Se o usuário estiver autenticado, exiba o botão para sair -->
                        <form method="POST" action="{{ route('logout') }}" class="logout-button">
                            @csrf
                            <button type="submit" class="btn btn-danger">Sair</button>
                        </form>
                    @else
                        <!-- Se o usuário não estiver autenticado, exiba o botão para entrar -->
                        <a href="{{ route('login') }}" class="btn btn-primary">Entrar</a>
                    @endif
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>
</head>

<body>
    <div class="container">
        <h1>Cadastro de Turmas</h1>
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

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('turma.listar') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
