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
            min-height: 75rem;
            padding-top: 4.5rem;
            background-color: #034811;
            margin-bottom: 1%;
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

<body>
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
        <h2><strong>PONTUAÇÃO SUGERIDA PARA AS ATIVIDADES COMPLEMENTARES</strong></h2>

        <table>
            <tr>
                <th>1. Atividades de aperfeiçoamento e enriquecimento cultural (Máximo de 120 pontos ao longo do
                    curso)</th>
            </tr>
            <tr>
                <td>
                    <div class="activity">
                        <ul>
                            <li>
                                <h3>1.1 Participação em atividades culturais</h3>
                                <ul>
                                    <li> Participar em atividades culturais, como filme, teatro, apresentações
                                        artísticas, feiras, exposições, festivais e competições esportivas, bandas,
                                        coral, olimpíadas em geral. (5 pontos por atividade comprovada - 30 pontos) </li>
                                </ul>
                                <ul>
                                    <li>Relatório ou comprovante de participação</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <th>2. Atividades de divulgação científica e de iniciação à docência (Máximo de 100 pontos ao longo do
                    curso)</th>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>
                            <h3>2.1 Monitoria remunerada ou voluntária</h3>
                            <ul>
                                <li>15 pontos por participação (60 pontos max)</li>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                        <li>
                            <h3>2.2 Membro atuante em atividades técnico-científicas</h3>
                            <ul>
                                <li>
                                    <p>10 pontos por participação (30 pontos max)</p>
                                    <p>ou</p>
                                    <p>15 pontos, caso o trabalho seja da área específica do curso (30 pontos
                                        max)</p>
                                </li>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                        <li>
                            <h3>2.3 Participação em atividades pedagógicas de observação para cursos de licenciatura</h3>
                            <ul>
                                <li>5 pontos por participação (20 pontos max)</li>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                    </ul>
                    <p>* Valido após regulamentação pelo IFMS</p>
                </td>
            </tr>
            <tr>
                <th>3. Atividades de vivência acadêmica e profissional complementar (Máximo de 100 pontos ao longo do
                    curso)</th>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>
                            <h3>3.1 Organização de eventos acadêmicos e festivais. (1 ponto por hora ou 10 pontos por
                                evento, caso o documento de comprovação não apresente a carga horária - 30 pontos)</h3>
                            <ul>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                        <li>
                            <h3>3.2 Representação discente em Conselhos e Entidades estudantis, liderança de turma,
                                órgãos de classe e conselhos representativos.</h3>
                            <ul>
                                <li>5 pontos por participação (20 pontos max)</li>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                        <li>
                            <h3>3.3 Participação como ouvinte em eventos acadêmicos, tais como bancas de TCC,
                                dissertação, teses.</h3>
                            <ul>
                                <li>3 pontos por participação (18 pontos max)</li>
                                <li>Relatório/Declaração</li>
                            </ul>
                        </li>
                        <li>
                            <h3>3.4 Participação como ouvinte em congressos, seminários, simpósios e demais eventos
                                relacionados ao curso ou áreas afins.</h3>
                            <ul>
                                <li>1 ponto por hora ou 10 pontos por evento (caso o documento de comprovação não
                                    apresente a carga horária) (40 pontos max)</li>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                        <li>
                            <h3>3.5 Participação em visita técnica, relacionada à área de atuação.</h3>
                            <ul>
                                <li>1 ponto por hora ou 8 pontos por evento (caso o documento de comprovação não
                                    apresente a carga horária) (20 pontos max)</li>
                                <li>Relatório da visita, com anuência do professor responsável.</li>
                            </ul>
                        </li>
                        <li>
                            <h3>3.6 Participação em projetos de incubação.</h3>
                            <ul>
                                <li>7,5 pontos por mês (45 pontos max)</li>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>4. Atividades de Pesquisa ou Extensão e publicações (Máximo de 100 pontos ao longo do curso)</th>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>
                            <h3>4.1 Participação em projetos e grupos de pesquisa</h3>
                            <ul>
                                <li>7,5 pontos por mês (45 pontos max)</li>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                        <li>
                            <h3>4.2 Participação em projetos e grupos de extensão</h3>
                            <ul>
                                <li>7,5 pontos por mês (45 pontos max)</li>
                                <li>Certificado/Declaração</li>
                            </ul>
                        </li>
                        <li>
                            <h3>4.3 Publicação de artigo científico completo em revista ou periódico.</h3>
                            <ul>
                                <li>25 pontos por publicação ou 30 pontos por publicação em revista ou periódico da
                                    área (50 pontos max)</li>
                                <li>Artigo publicado</li>
                            </ul>
                        </li>
                        <li>
                            <h3>4.4 Publicação de resumos de artigo científico em revista ou periódicos</h3>
                            <ul>
                                <li>15 pontos por publicação ou 20 pontos por publicação em revista ou periódico da
                                    área (50 pontos max)</li>
                                <li>Resumo publicado</li>
                            </ul>
                        </li>
                        <li>
                            <h3>4.5 Publicação de matérias ou notas em jornais e meios eletrônicos</h3>
                            <ul>
                                <li>5 pontos (10 pontos max)</li>
                                <li>Publicação</li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</html>
