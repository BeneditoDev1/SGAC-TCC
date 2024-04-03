<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAC</title>

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
            background-color: green; /* Define o fundo verde */
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
            background-color: white; /* Define o fundo do container como branco */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 60px;
            color: black; /* Define a cor do texto dentro do container como preto */
        }

        .form-group {
            margin-bottom: 10px;
            max-width: 100%;
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
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
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
                    <li class="nav-item">
                        @if (Auth::check())
                            <!-- Se o usuário estiver autenticado, exiba o botão para sair -->
                            <form method="POST" action="{{ route('logout') }}">
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

    <div class="container">
        <h1>Cadastrar Usuário</h1>

        <form action="{{ $usuario->id ? route('usuario.atualizar', $usuario->id) :route('usuario.salvar') }}"
            method="POST">
            @csrf
            @if($usuario->id)
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" value="" required>
            </div>

            <div class="form-group">
                <label for="matricula">Matricula:</label>
                <input type="text" class="form-control" name="matricula" value="" required>
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-control" name="sexo" required>
                    <option value="M" @if($usuario->sexo == 'M') selected @endif>M</option>
                    <option value="F" @if($usuario->sexo == 'F') selected @endif>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dataAtiv">Data de ativação:</label>
                <input type="date" class="form-control" name="dataAtiv" value="" required>
            </div>


            <div class="form-group">
                <label for="ra">Ra:</label>
                <input type="text" class="form-control" name="ra" value="" required>
            </div>

            <div class="form-group">
                <label for="semestre">Semestre:</label>
                <select class="form-control" name="semestre" required>
                    <option value="1" @if($usuario->semestre == 1) selected @endif>1</option>
                    <option value="2" @if($usuario->semestre == 2) selected @endif>2</option>
                    <option value="3" @if($usuario->semestre == 3) selected @endif>3</option>
                    <option value="4" @if($usuario->semestre == 4) selected @endif>4</option>
                    <option value="5" @if($usuario->semestre == 5) selected @endif>5</option>
                    <option value="6" @if($usuario->semestre == 6) selected @endif>6</option>
                    <option value="7" @if($usuario->semestre == 7) selected @endif>7</option>
                    <option value="8" @if($usuario->semestre == 8) selected @endif>8</option>
                    <option value="9" @if($usuario->semestre == 9) selected @endif>9</option>
                    <option value="10" @if($usuario->semestre == 10) selected @endif>10</option>
                </select>
            </div>

            <div class="form-group">
                <label for="curso">Escolha o Curso</label>
                <select class="form-control" name="curso_id" required>
                    <option value="">Selecione um curso</option>
                    @foreach($cursos as $curso)
                    <option {{ $curso->id == old('curso_id', $usuario->curso_id) ? 'selected' : '' }}
                        value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" onclick="window.location='{{ route('usuario.listar') }}'" class="btn btn-secondary">Cancelar</button></form>
        </form>
    </div>

</body>

</html>
