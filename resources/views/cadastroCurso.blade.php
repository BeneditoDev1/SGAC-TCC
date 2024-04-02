<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cursos</title>

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
            background-color: green;
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
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
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
                    <a class="nav-link active" aria-current="page" href="{{url('usuario/listar')}}"><strong>Usuarios</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('curso/listar')}}"><strong>Cursos</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="{{url('atividade/listar')}}"><strong>Atividades</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="{{url('about')}}"><strong>Regras</strong></a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>
</head>

<body>
    <div class="container">
        <h1>Cadastro de Cursos</h1>
        <form action="{{ $curso->id ? route('curso.atualizar', $curso->id) : route('curso.salvar') }}" method="POST">
            @csrf
            @if($curso->id)
            @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ $curso->id }}">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $curso->nome }}" required>
            </div>

            <div class="form-group">
                <label for="turma">Turma:</label>
                <input type="text" class="form-control" name="turma" value="{{ $curso->turma }}" required>
            </div>

            <div class="form-group">
                <label for="semestre">Semestre:</label>
                <select class="form-control" name="semestre" required>
                    <option value="1" @if($curso->semestre == 1) selected @endif>1</option>
                    <option value="2" @if($curso->semestre == 2) selected @endif>2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ano">Ano:</label>
                <input type="date" class="form-control" name="ano" value="{{ $curso->ano }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('curso.listar') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
