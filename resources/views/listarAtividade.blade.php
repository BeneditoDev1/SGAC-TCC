<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Atividades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">




<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


<style>
    body {
        background-color: #034811;
        color: white; /* Define a cor do texto como branco */
    }

    h1 {
        color: black;
    }

    .container {
        background-color: white; /* Define o fundo do container como branco */
        padding: 20px; /* Adiciona algum espaçamento interno ao container */
        border-radius: 10px; /* Adiciona bordas arredondadas ao container */
        margin-top: 70px; /* Adiciona um espaço acima do container para a barra de navegação */
        color: black; /* Define a cor do texto dentro do container como preto */
    }

    .table {
        color: black; /* Define a cor do texto da tabela como preto */
    }

    .table th,
    .table td {
        vertical-align: middle;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
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

    .row{
        margin-bottom: 1%;
    }

    .btn-primary{
        margin-bottom: 1%;
    }

    .buscador{
        margin-top: 1%;
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
        <h1>Atividades</h1>
        <div class="row">
            @foreach ($status as $nomeStatus => $contador)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $nomeStatus }}</h5>
                            <p class="card-text">Total: {{ $contador }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{{ route('atividade.listar') }}" method="GET">
            <div class="form-group">
                <label for="search">Buscar por Nome do Usuário:</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Digite o nome do usuário">
            </div>
            <button type="submit" class="btn btn-primary buscador">Buscar</button>
        </form>
        <a href="{{ route('atividade.novo') }}" class="btn btn-primary">Nova Atividade</a>
        <a href="{{ route('atividade.validacao') }}" class="btn btn-primary">Validar atividade</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Credencial</th>
                    <th>Semestre</th>
                    <th>Nome do curso</th>
                    <th>Categoria</th>
                    <th>Data de inicio</th>
                    <th>Data de conclusão</th>
                    <th>Total de horas</th>
                    <th>Usuario</th>
                    <th>Arquivo</th>
                    <th>Status</th>
                    <th>Horas Pendentes</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atividades as $atividade)
                <tr>
                    <td>{{ $atividade->titulo }}</td>
                    <td>{{ $atividade->credencial }}</td>
                    <td>{{ $atividade->semestre }}</td>
                    <td>{{ $atividade->curso->nome }}</td>
                    <td>{{ $atividade->categoria }}</td>
                    <td>{{ $atividade->data_inicio }}</td>
                    <td>{{ $atividade->data_conclusao }}</td>
                    <td>{{ $atividade->total_horas }}</td>
                    <td>{{ $atividade->usuario->nome }}</td>
                    <td style="max-width: 150px"><a href="{{ asset('uploads/' . $atividade->arquivo) }}" download>{{ $atividade->titulo }}</a></td>
                    <td>{{ $atividade->status }}</td>
                    <td><a class="btn btn-primary" href="editar/{{ $atividade->id }}">Editar</a></td>
                    <td><a class="btn btn-danger" href="excluir/{{ $atividade->id }}">Excluir</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </body>


</body>
</html>
