<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Curso</title>

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
        background-color: green; /* Define o fundo verde */
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

</head>

<body>
<div class="container">
    <h1>Listagem de Cursos</h1>
    <a href="{{ route('curso.novo') }}" class="btn btn-primary">Novo Curso</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Semestre</th>
                <th>Turma</th>
                <th>Ano</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nome }}</td>
                <td>{{ $curso->semestre }}</td>
                <th>{{ $curso->turma}}</th>
                <td>{{ $curso->ano }}</td>
                <td><a class="btn btn-primary" href="editar/{{ $curso->id }}">Editar</a></td>
                <td>
                    <form method="GET" action="excluir/{{ $curso->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Excluir</button>
                    </form>
                </td>
                @endforeach
        </tbody>
    </table>
</div>
</body>

<script>
@if (session('error'))
alert('{{ session('error') }}');
@endif
</script>
</html>
