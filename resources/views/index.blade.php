<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="origin-trial"
        content="Az520Inasey3TAyqLyojQa8MnmCALSEU29yQFW8dePZ7xQTvSt73pHazLFTK5f7SyLUJSo2uKLesEtEa9aUYcgMAAACPeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZS5jb206NDQzIiwiZmVhdHVyZSI6IkRpc2FibGVUaGlyZFBhcnR5U3RvcmFnZVBhcnRpdGlvbmluZyIsImV4cGlyeSI6MTcyNTQwNzk5OSwiaXNTdWJkb21haW4iOnRydWUsImlzVGhpcmRQYXJ0eSI6dHJ1ZX0=">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAC</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">


    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('ifms.ico') }}" type="image/x-icon">
    <meta name="theme-color" content="#712cf9">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 767px){
            .logout-button {
                display: none;
            }
        }

        h1 {
            text-align: center;
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, 0);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

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

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        body {
            min-height: 50rem;
            padding-top: 4.5rem;
            background-color: #034811;
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
        }

        .container {
            background-color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .row {
            margin-left: 12%;
            margin-bottom: 5%;
        }

        .usuario {
            margin-right: 10px;
            color: white;
        }

        .logout-button {
            position: fixed;
            top: 10px;
            right: 20px;
            z-index: 1000;
        }

        .usuario{
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
    <div class="container">
        <h1><strong>Bem-vindo ao SGAC</strong></h1>
        <p></p>
        <h3>O processo de formação dos cursos superiores, exige que, conforme o Projeto Pedagógico do Curso (PPC),
        o estudante participe de atividades de enriquecimento curricular para compor os requisitos para sua formação, as chamadas atividades complementares.</h3>

        <h3>Confira as páginas dos cursos superiores e regulamento oficial da instituição:</h3>
        <div class="links">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card" style="width: 18rem; margin-bottom:1%">
                        <img src="https://www.ifms.edu.br/imagens/cursos/topos-medio/topo-sistemas-para-internet.png" width="500px" height="140px" class="card-img-top" alt="Descrição da imagem 1">
                        <div class="card-body">
                            <p class="card-text"><a href="https://www.ifms.edu.br/campi/campus-campo-grande/cursos/graduacao/sistemas-para-internet" target="_blank">Sistemas para Internet</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="card" style="width: 18rem; margin-bottom:1%">
                        <img src="https://www.ifms.edu.br/imagens/cursos/topos-medio/toposupengenhariaeletrica.png" width="500px" height="140px" class="card-img-top" alt="Descrição da imagem 2">
                        <div class="card-body">
                            <p class="card-text"><a href="https://www.ifms.edu.br/campi/campus-campo-grande/cursos/graduacao/engenharia-eletrica" target="_blank">Engenharia Elétrica</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card" style="width: 18rem; margin-bottom:1%">
                        <img src="https://www.ifms.edu.br/imagens/cursos/topos-superior/toposupengenhariamecanica.png" width="500px" height="140px" class="card-img-top" alt="Descrição da imagem 3">
                        <div class="card-body">
                            <p class="card-text"><a href="https://www.ifms.edu.br/campi/campus-campo-grande/cursos/graduacao/engenharia-mecanica" target="_blank">Engenharia Mecânica</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="card" style="width: 18rem; margin-bottom:1%">
                        <img src="https://www.ifms.edu.br/imagens/icones/s/2/ifms15" width="500px" height="140px" class="card-img-top" alt="Descrição da imagem 2">
                        <div class="card-body">
                            <p class="card-text"><a href="https://www.ifms.edu.br/cidadania/consultas-publicas/rod/minuta-regulamento-da-organizacao-didatico-pedagogica-03-04-2019-revisada-para-consulta.pdf" target="_blank">Minuta Regulamento da Organização Didático-Pedagógica</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</html>
