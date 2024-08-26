<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAC</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #034811; /* Fundo verde */
            color: white; /* Texto branco */
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #000000;
        }

        .container {
            background-color: white; /* Fundo branco */
            padding: 20px; /* Espaçamento interno */
            border-radius: 10px; /* Bordas arredondadas */
            margin-top: 70px; /* Espaçamento acima */
            color: black; /* Texto preto */
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group input,
        .form-group select {
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

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            opacity: 0.8;
        }

        /* Ajustes de responsividade */
        @media (max-width: 767px) {
            .logout-button {
                display: none;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                margin-left: 0;
                margin-right: 0;
            }
        }

        @media (min-width: 768px) {
            .logout-button {
                position: fixed;
                top: 10px;
                right: 20px;
                z-index: 1000;
            }
        }

        .usuario {
            position: fixed;
            top: 10px;
            right: 80px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"><strong>SGAC</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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

    <div class="container">
        <h1 class="text-center">Cadastrar Aluno</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="usuarioForm" action="{{ route('usuario.salvar') }}" method="POST">
            @csrf
            @if($usuario->id)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" class="form-control" name="id" value="{{ old('id', $usuario->id) }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $usuario->name) }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" value="{{ old('cpf', $usuario->cpf) }}" required>
                <div id="cpfError" class="text-danger" style="display:none;"></div>
            </div>

            <div class="form-group">
                <label for="matricula">Matricula:</label>
                <input type="text" class="form-control" name="matricula" value="{{ old('matricula', $usuario->matricula) }}" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" name="password" @if(!$usuario->exists) required @endif>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirme a Senha:</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-control" name="sexo" required>
                    <option value="M" @if(old('sexo', $usuario->sexo) == 'M') selected @endif>M</option>
                    <option value="F" @if(old('sexo', $usuario->sexo) == 'F') selected @endif>F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_ativacao">Data de Ativação:</label>
                <input type="date" class="form-control" name="data_ativacao" value="{{ old('data_ativacao', $usuario->data_ativacao ? $usuario->data_ativacao->format('Y-m-d') : '') }}" required>
            </div>

            <div class="form-group">
                <label for="ra">RA:</label>
                <input type="text" class="form-control" name="ra" value="{{ old('ra', $usuario->ra) }}" required>
            </div>

            <div class="form-group">
                <label for="semestre">Semestre:</label>
                <select class="form-control" name="semestre" required>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" @if(old('semestre', $usuario->semestre) == $i) selected @endif>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="turma_id">Turma:</label>
                <select class="form-control" name="turma_id" required>
                    @foreach ($turmas as $turma)
                        <option value="{{ $turma->id }}" @if(old('turma_id', $usuario->turma_id) == $turma->id) selected @endif>
                            {{ $turma->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="curso_id">Curso:</label>
                <select class="form-control" name="curso_id" required>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" @if(old('curso_id', $usuario->curso_id) == $curso->id) selected @endif>
                            {{ $curso->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('usuario.listar') }}" class="btn btn-secondary">Cancelar</a>
            </div>
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

        $(function() {
            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd" // Define o formato da data
            });
        });
    </script>
</body>
</html>
