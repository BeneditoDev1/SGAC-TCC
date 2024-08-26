<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAC</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">




    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

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

        .logout-button {
            position: fixed;
            top: 10px; /* Distância do topo da página */
            right: 20px; /* Distância da direita da página */
            z-index: 1000; /* Z-index para garantir que o botão esteja acima de outros elementos */
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
<body>
    <div class="container">
        <h1 style="text-align: center">Cadastrar Aluno</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="usuarioForm" action="{{route('usuario.salvar')}}" method="POST">
            @csrf
            @if($usuario->id)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" class="form-control" name="id" value="{{ old('id', $usuario->id)}}" readonly>
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

            <div class="form-group lista">
                <label for="sexo">Sexo:</label>
                <select class="form-control" name="sexo" required>
                    <option value="M" @if(old('sexo', $usuario->sexo) == 'M') selected @endif>M</option>
                    <option value="F" @if(old('sexo', $usuario->sexo) == 'F') selected @endif>F</option>
                </select>
            </div>

            <div class="form-group lista">
                <label for="data_ativacao">Data de Ativação:</label>
                <input type="date" class="form-control" name="data_ativacao" value="{{ old('data_ativacao', $usuario->data_ativacao ? $usuario->data_ativacao->format('Y-m-d') : '') }}" required>
            </div>

            <div class="form-group">
                <label for="ra">RA:</label>
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

            <div class="form-group lista">
                <label for="turma_id">Turma:</label>
                <select class="form-control" name="turma_id" required>
                    @foreach ($turmas as $turma)
                        <option value="{{ $turma->id }}" @if(old('turma_id', $usuario->turma_id) == $turma->id) selected @endif>
                            {{ $turma->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group lista">
                <label for="curso_id">Curso:</label>
                <select class="form-control" name="curso_id" required>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" @if(old('curso_id', $usuario->curso_id) == $curso->id) selected @endif>
                            {{ $curso->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
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
