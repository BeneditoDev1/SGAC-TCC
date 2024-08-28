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

    .navbar-brand{
            margin-left: 16%;
        }

    .container {
        max-width: 1200px;
        padding: 20px;
        margin-top: 4%;
        margin-bottom: 5%;
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

        .usuario {
            position: static;
            top: 10px;
            right: 80px;
            z-index: 1000;
            color: white;
        }

        .logout-button {
            position: static;
            top: 10px;
            right: 20px;
            z-index: 1000;
        }

    /* Media query para ajustar a responsividade para max-width: 767px */
            @media (max-width: 883px) {
            .container {
                max-width: 90%;
            }

            .btn-primary {
            margin-left: auto;
            margin-right: auto;
            display: block;
            }
            .logout-button {
                display: none;
            }
            .navbar-brand{
            margin-left: 2%;
            }
            .usuario {
            position: fixed;
            top: 15px;
            right: 80px;
            z-index: 1000;
            }

            .btn-primary,
            .btn-secondary {
                display: block;
                width: 100%;
                margin-left: 0;
                margin-right: 0;
            }

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
        <div class="collapse navbar-collapse justify-content-center text-center" style="margin-left: 8%" id="navbarCollapse">
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
                            <a type="submit" class="nav-link active"><strong>Sair</strong></a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-link active">Entrar</a>
                    @endif
                </li>
            </ul>
            <!-- Show logout button on larger screens -->
            <ul class="navbar-nav ml-auto d-flex align-items-center d-md-block" style="margin-left: 22%">
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

        <h1>Cadastrar Atividade</h1>

        <form enctype="multipart/form-data"
              action="{{ $atividade->id ? route('atividade.atualizar', $atividade->id) : route('atividade.salvar') }}"
              method="POST">
            @csrf
            @if($atividade->id)
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $atividade->titulo) }}" required>
            </div>

            <div class="form-group">
                <label for="credencial">Número do Certificado:</label>
                <input type="text" class="form-control" name="credencial" value="{{ old('credencial', $atividade->credencial) }}" required>
            </div>

            <div class="form-group lista">
                <label for="categoria">Categoria:</label>

                <select class="form-control" name="categoria" id="categoriaSelect" required>
                    <!-- Grupo 1: Atividades de aperfeiçoamento e enriquecimento cultural -->
                    <optgroup label="1. Atividades de aperfeiçoamento e enriquecimento cultural">
                        <option value="Participação em atividades culturais" @if($atividade->tipo == 'Participação em atividades culturais') selected @endif>1.1 Participação em atividades culturais</option>
                    </optgroup>

                    <!-- Grupo 2: Atividades de divulgação científica e de iniciação à docência -->
                    <optgroup label="2. Atividades de divulgação científica e de iniciação à docência">
                        <option value="Monitoria remunerada ou voluntária" @if($atividade->tipo == 'Monitoria remunerada ou voluntária') selected @endif>2.1 Monitoria remunerada ou voluntária</option>
                        <option value="Membro atuante em atividades técnico-científicas" @if($atividade->tipo == 'Membro atuante em atividades técnico-científicas') selected @endif>2.2 Membro atuante em atividades técnico-científicas</option>
                        <option value="Participação em atividades pedagógicas de observação para cursos de licenciatura" @if($atividade->tipo == 'Participação em atividades pedagógicas de observação para cursos de licenciatura') selected @endif>2.3 Participação em atividades pedagógicas de observação para cursos de licenciatura</option>
                    </optgroup>

                    <!-- Grupo 3: Atividades de vivência acadêmica e profissional complementar -->
                    <optgroup label="3. Atividades de vivência acadêmica e profissional complementar">
                        <option value="Organização de eventos acadêmicos e festivais" @if($atividade->tipo == 'Organização de eventos acadêmicos e festivais') selected @endif>3.1 Organização de eventos acadêmicos e festivais</option>
                        <option value="Representação discente em Conselhos e Entidades estudantis" @if($atividade->tipo == 'Representação discente em Conselhos e Entidades estudantis') selected @endif>3.2 Representação discente em Conselhos e Entidades estudantis</option>
                        <option value="Participação como ouvinte em eventos acadêmicos, tais como bancas de TCC, dissertação, teses" @if($atividade->tipo == 'Participação como ouvinte em eventos acadêmicos, tais como bancas de TCC, dissertação, teses') selected @endif>3.3 Participação como ouvinte em eventos acadêmicos, tais como bancas de TCC, dissertação, teses</option>
                        <option value="Participação como ouvinte em congressos, seminários, simpósios e demais eventos relacionados ao curso ou áreas afins" @if($atividade->tipo == 'Participação como ouvinte em congressos, seminários, simpósios e demais eventos relacionados ao curso ou áreas afins') selected @endif>3.4 Participação como ouvinte em congressos, seminários, simpósios e demais eventos relacionados ao curso ou áreas afins</option>
                        <option value="Participação em visita técnica, relacionada à área de atuação" @if($atividade->tipo == 'Participação em visita técnica, relacionada à área de atuação') selected @endif>3.5 Participação em visita técnica, relacionada à área de atuação</option>
                        <option value="Participação em projetos de incubação" @if($atividade->tipo == 'Participação em projetos de incubação') selected @endif>3.6 Participação em projetos de incubação</option>
                    </optgroup>

                    <!-- Grupo 4: Atividades de Pesquisa ou Extensão e publicações -->
                    <optgroup label="4. Atividades de Pesquisa ou Extensão e publicações">
                        <option value="Participação em projetos e grupos de pesquisa" @if($atividade->tipo == 'Participação em projetos e grupos de pesquisa') selected @endif>4.1 Participação em projetos e grupos de pesquisa</option>
                        <option value="Participação em projetos e grupos de extensão" @if($atividade->tipo == 'Participação em projetos e grupos de extensão') selected @endif>4.2 Participação em projetos e grupos de extensão</option>
                        <option value="Publicação de artigo científico completo em revista ou periódico" @if($atividade->tipo == 'Publicação de artigo científico completo em revista ou periódico') selected @endif>4.3 Publicação de artigo científico completo em revista ou periódico</option>
                        <option value="Publicação de resumos de artigo científico em revista ou periódicos" @if($atividade->tipo == 'Publicação de resumos de artigo científico em revista ou periódicos') selected @endif>4.4 Publicação de resumos de artigo científico em revista ou periódicos</option>
                        <option value="Publicação de matérias ou notas em jornais e meios eletrônicos" @if($atividade->tipo == 'Publicação de matérias ou notas em jornais e meios eletrônicos') selected @endif>4.5 Publicação de matérias ou notas em jornais e meios eletrônicos</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group" id="other-category-input" style="display: none;">
                <label for="outro_categoria">Descreva sua atividade:</label>
                <input type="text" class="form-control" name="outro_categoria">
            </div>

            <div class="form-group lista">
                <label for="semestre">Semestre:</label>
                <select class="form-control" name="semestre" required>
                    <option value="1" @if($atividade->semestre == 1) selected @endif>1</option>
                    <option value="2" @if($atividade->semestre == 2) selected @endif>2</option>
                    <option value="3" @if($atividade->semestre == 3) selected @endif>3</option>
                    <option value="4" @if($atividade->semestre == 4) selected @endif>4</option>
                    <option value="5" @if($atividade->semestre == 5) selected @endif>5</option>
                    <option value="6" @if($atividade->semestre == 6) selected @endif>6</option>
                    <option value="7" @if($atividade->semestre == 7) selected @endif>7</option>
                    <option value="8" @if($atividade->semestre == 8) selected @endif>8</option>
                    <option value="9" @if($atividade->semestre == 9) selected @endif>9</option>
                    <option value="10" @if($atividade->semestre == 10) selected @endif>10</option>
                </select>
            </div>

            <div class="form-group">
                <label for="curso">Curso:</label>
                <input type="text" class="form-control" value="{{ Auth::user()->curso->nome }}" disabled>
                <input type="hidden" name="curso_id" value="{{ Auth::user()->curso->id }}">
            </div>

            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
            </div>

            <div class="form-group lista">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" class="form-control" name="data_inicio" value="{{ old('data_inicio', $atividade->data_inicio) }}" required>
            </div>

            <div class="form-group lista">
                <label for="data_conclusao">Data de Conclusão:</label>
                <input type="date" class="form-control" name="data_conclusao" value="{{ old('data_conclusao', $atividade->data_conclusao) }}" required>
            </div>

            <div class="form-group lista">
                <label for="total_horas">Total de horas:</label>
                <input type="datetime" class="form-control" name="total_horas" value="{{ old('total_horas', $atividade->total_horas) }}" required>
            </div>

            <div class="form-group">
                <label for="arquivo">Arquivo:</label>
                <input type="file" class="form-control" name="arquivo" accept=".pdf, .doc, .docx, .png, .jpeg">
            </div>

            <input type="hidden" name="nome_arquivo" value="{{ old('arquivo', $atividade->arquivo) }}">

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('atividade.listar') }}" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('searchCategoria').addEventListener('keyup', function() {
        var searchText = this.value.toLowerCase();
        var options = document.getElementById('categoriaSelect').options;

        for (var i = 0; i < options.length; i++) {
            var optionText = options[i].text.toLowerCase();
            options[i].style.display = optionText.includes(searchText) ? '' : 'none';
        }
    });
    </script>
</body>
</html>
