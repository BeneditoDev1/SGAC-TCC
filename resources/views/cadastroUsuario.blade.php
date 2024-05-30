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
            background-color: #034811; /* Define o fundo verde */
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
            margin-top: 4%;
            color: black; /* Define a cor do texto dentro do container como preto */
            margin-bottom: 2%;
        }

        .form-group {
            margin-bottom: 10px;
            max-width: 100%;
        }

        .lista{
            max-width: 15%;
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

        .logout-button {
            position: fixed;
            top: 10px; /* Distância do topo da página */
            right: 20px; /* Distância da direita da página */
            z-index: 1000; /* Z-index para garantir que o botão esteja acima de outros elementos */
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
                        <a class="nav-link active" aria-current="page" href="{{url('usuario/listar')}}"><strong>Alunos</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('curso/listar')}}"><strong>Cursos</strong></a>
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
                            <form method="POST" style="" action="{{ route('logout') }}" class="logout-button">
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
        <h1>Cadastrar Aluno</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $usuario->id ? route('usuario.atualizar', $usuario->id) : route('usuario.salvar') }}" method="POST">
            @csrf
            @if($usuario->id)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ old('nome', $usuario->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" value="{{ old('cpf', $usuario->cpf) }}" required>
                @if ($errors->has('cpf'))
                    <div class="alert alert-danger">{{ $errors->first('cpf') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="matricula">Matricula:</label>
                <input type="text" class="form-control" name="matricula" value="{{ old('matricula', $usuario->matricula) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirme a Senha:</label>
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
            </div>

            <div class="form-group lista">
                <label for="sexo">Sexo:</label>
                <select class="form-control" name="sexo" required>
                    <option value="M" @if(old('sexo', $usuario->sexo) == 'M') selected @endif>M</option>
                    <option value="F" @if(old('sexo', $usuario->sexo) == 'F') selected @endif>F</option>
                </select>
            </div>

            <div class="form-group lista">
                <label for="dataAtiv">Data de ativação:</label>
                <input type="date" class="form-control" name="dataAtiv" value="{{ old('dataAtiv', $usuario->data_ativacao) }}" required>
            </div>

            <div class="form-group">
                <label for="ra">Ra:</label>
                <input type="text" class="form-control" name="ra" value="{{ old('ra', $usuario->ra) }}" required>
            </div>

            <div class="form-group lista">
                <label for="semestre">Semestre:</label>
                <select class="form-control" name="semestre" required>
                    <option value="1" @if(old('semestre', $usuario->semestre) == 1) selected @endif>1</option>
                    <option value="2" @if(old('semestre', $usuario->semestre) == 2) selected @endif>2</option>
                    <option value="3" @if(old('semestre', $usuario->semestre) == 3) selected @endif>3</option>
                    <option value="4" @if(old('semestre', $usuario->semestre) == 4) selected @endif>4</option>
                    <option value="5" @if(old('semestre', $usuario->semestre) == 5) selected @endif>5</option>
                    <option value="6" @if(old('semestre', $usuario->semestre) == 6) selected @endif>6</option>
                    <option value="7" @if(old('semestre', $usuario->semestre) == 7) selected @endif>7</option>
                    <option value="8" @if(old('semestre', $usuario->semestre) == 8) selected @endif>8</option>
                    <option value="9" @if(old('semestre', $usuario->semestre) == 9) selected @endif>9</option>
                    <option value="10" @if(old('semestre', $usuario->semestre) == 10) selected @endif>10</option>
                </select>
            </div>

            <div class="form-group">
                <label for="curso">Escolha o Curso</label>
                <select class="form-control" name="curso_id" required>
                    <option value="">Selecione um curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ $curso->id == old('curso_id', $usuario->curso_id) ? 'selected' : '' }}>
                            {{ $curso->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="turma">Escolha uma turma:</label>
                <select class="form-control" name="turma_id" required>
                    <option value="">Selecione uma turma</option>
                    @foreach($turmas as $turma)
                        <option value="{{ $turma->id }}" {{ $turma->id == old('turma_id', $usuario->turma_id) ? 'selected' : '' }}>
                            {{ $turma->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" onclick="window.location='{{ route('usuario.listar') }}'" class="btn btn-secondary">Cancelar</button>
        </form>
    </div>

    <script>
        document.getElementById('usuarioForm').addEventListener('submit', function(event) {
            var cpfInput = document.querySelector('input[name="cpf"]');
            var cpfError = document.getElementById('cpfError');
            if (cpfInput.value.length !== 11) {
                event.preventDefault();
                cpfError.textContent = 'O CPF deve conter exatamente 11 caracteres.';
                cpfError.style.display = 'block';
            } else {
                cpfError.style.display = 'none';
            }
        });
    </script>

</body>

</html>
