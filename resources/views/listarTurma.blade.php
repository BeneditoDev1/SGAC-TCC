<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Turma</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">

    <style>
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

        body {
            font-family: Arial, sans-serif;
            background-color: #034811;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: black;
        }

        .container {
            max-width: 1200px;
            margin: 60px auto 50px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        select,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-top: 5px;
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

        .logout-button {
            position: fixed;
            top: 10px; /* Distância do topo da página */
            right: 20px; /* Distância da direita da página */
            z-index: 1000; /* Z-index para garantir que o botão esteja acima de outros elementos */
        }

        .lista {
            max-width: 15%;
        }

        .usuario {
            position: fixed;
            top: 10px;
            right: 80px;
            z-index: 1000;
        }

        /* Media query para ajustar a responsividade para max-width: 767px */
        @media (max-width: 767px) {
            .container {
                max-width: 100%;
                margin: 10px auto;
                padding: 10px;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                margin-left: 0;
            }

            .lista {
                max-width: 100%;
            }

            .logout-button {
                top: 5px;
                right: 10px;
            }

            .usuario {
                right: 10px;
            }
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
</head>

<body>
    <div class="container table-responsive">
        <h1 class="text-center">Turma</h1>
        @if (Auth::id() == 2)
            <div class="text-end mb-3">
                <a href="{{ route('turma.novo') }}" class="btn btn-primary">Nova Turma</a>
        @endif
    </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped" style="text-align: center">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Semestre</th>
                    <th>Curso</th>
                    <th>Ano Inicio</th>
                    <th>Ano Fim</th>
                    <th>PPC</th>
                    @if (Auth::id() == 2)
                        <th>Editar</th>
                        <th>Excluir</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                @if (Auth::id() == 2)
                <tr>
                    <td>{{ $turma->nome }}</td>
                    <td>{{ $turma->semestre }}</td>
                    <td>{{ $turma->curso->nome }}</td>
                    <th>{{ $turma->ano_inicio }}</th>
                    <th>{{ $turma->ano_fim }}</th>
                    <th>{{ $turma->horas }}</th>
                    @endif
                    @if (Auth::id() == 2)
                    <td><a class="btn btn-primary" href="editar/{{ $turma->id }}">Editar</a></td>
                    <td>
                        <form method="GET" action="excluir/{{ $turma->id }}">
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
</div>
    <script>
        @if (session('error'))
        alert('{{ session('error') }}');
        @endif
    </script>
</body>
</html>
