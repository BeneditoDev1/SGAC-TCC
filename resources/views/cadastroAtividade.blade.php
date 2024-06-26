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
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 60px;
            margin-bottom: 50px;
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
            display: block;
            width: 40%;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
            color: #fff;
            border: none;
            text-align: center;
            cursor: pointer;
            margin: 10px auto;
            margin-left: 60%;
        }

        .logout-button {
            position: fixed;
            top: 10px; /* Distância do topo da página */
            right: 20px; /* Distância da direita da página */
            z-index: 1000; /* Z-index para garantir que o botão esteja acima de outros elementos */
        }

        .lista{
            max-width: 15%;
        }
    </style>
</head>
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
                <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $atividade->titulo) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="credencial">Número do Certificado:</label>
                <input type="text" class="form-control" name="credencial"
                    value="{{ old('credencial', $atividade->credencial) }}" required>
            </div>

            <div class="form-group lista">
                <label for="categoria">Categoria:</label>
                <select class="form-control" name="categoria" required>
                    <option value="Atividades culturais" @if($atividade->tipo == 'Atividades culturais') selected @endif>Atividades culturais</option>
                    <option value="Monitoria remunerada ou voluntária" @if($atividade->tipo == 'Monitoria remunerada ou voluntária') selected @endif>Monitoria remunerada ou voluntária</option>
                    <option value="Membro atuante em atividades técnico-científicas" @if($atividade->tipo == 'Membro atuante em atividades técnico-científicas') selected @endif>Membro atuante em atividades técnico-científicas</option>
                    <option value="Participação em atividades pedagógicas de observação para cursos de licenciatura" @if($atividade->tipo == 'Participação em atividades pedagógicas de observação para cursos de licenciatura') selected @endif>Participação em atividades pedagógicas de observação para cursos de licenciatura</option>
                    <option value="Representação discente em Conselhos e Entidades estudantis, liderança de turma, órgãos de classe e conselhos representativos" @if($atividade->tipo == 'Representação discente em Conselhos e Entidades estudantis, liderança de turma, órgãos de classe e conselhos representativos') selected @endif>Representação discente em Conselhos e Entidades estudantis, liderança de turma, órgãos de classe e conselhos representativos</option>
                    <option value="Participação como ouvinte em eventos acadêmicos, tais como bancas de TCC, dissertação, teses" @if($atividade->tipo == 'Participação como ouvinte em eventos acadêmicos, tais como bancas de TCC, dissertação, teses') selected @endif>Participação como ouvinte em eventos acadêmicos, tais como bancas de TCC, dissertação, teses</option>
                    <option value="Participação como ouvinte em congressos, seminários, simpósios e demais eventos relacionados ao curso ou áreas afins" @if($atividade->tipo == 'Participação como ouvinte em congressos, seminários, simpósios e demais eventos relacionados ao curso ou áreas afins') selected @endif>Participação como ouvinte em congressos, seminários, simpósios e demais eventos relacionados ao curso ou áreas afins</option>
                    <option value="Participação em visita técnica, relacionada à área de atuação" @if($atividade->tipo == 'Participação em visita técnica, relacionada à área de atuação') selected @endif>Participação em visita técnica, relacionada à área de atuação</option>
                    <option value="Participação em projetos de incubação" @if($atividade->tipo == 'Participação em projetos de incubação') selected @endif>Participação em projetos de incubação</option>
                    <option value="Participação em projetos e grupos de pesquisa" @if($atividade->tipo == 'Participação em projetos e grupos de pesquisa') selected @endif>Participação em projetos e grupos de pesquisa</option>
                    <option value="Participação em projetos e grupos de extensão" @if($atividade->tipo == 'Participação em projetos e grupos de extensão') selected @endif>Participação em projetos e grupos de extensão</option>
                    <option value="Publicação de artigo científico completo em revista ou periódico" @if($atividade->tipo == 'Publicação de artigo científico completo em revista ou periódico') selected @endif>Publicação de artigo científico completo em revista ou periódico</option>
                    <option value="Publicação de resumos de artigo científico em revista ou periódicos" @if($atividade->tipo == 'Publicação de resumos de artigo científico em revista ou periódicos') selected @endif>Publicação de resumos de artigo científico em revista ou periódicos</option>
                    <option value="Publicação de matérias ou notas em jornais e meios eletrônicos" @if($atividade->tipo == 'Publicação de matérias ou notas em jornais e meios eletrônicos') selected @endif>Publicação de matérias ou notas em jornais e meios eletrônicos</option>
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
                <label for="curso">Escolha o curso:</label>
                <select class="form-control" name="curso_id" required>
                    <option value="">Selecione um curso</option>
                    @foreach($cursos as $curso)
                    <option {{ $curso->id == old('curso_id', $atividade->curso_id) ? 'selected' : '' }}
                        value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="usuario">Escolha o usuário:</label>
                <select class="form-control" name="usuario_id" required>
                    <option value="">Selecione um usuário</option>
                    @foreach($usuarios as $usuario)
                    <option {{ $usuario->id == old('usuario_id', $atividade->usuario_id) ? 'selected' : '' }}
                        value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group lista">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" class="form-control" name="data_inicio"
                    value="{{ old('data_inicio', $atividade->data_inicio) }}" required>
            </div>

            <div class="form-group lista">
                <label for="data_conclusao">Data de Conclusão:</label>
                <input type="date" class="form-control" name="data_conclusao"
                    value="{{ old('data_conclusao', $atividade->data_conclusao) }}" required>
            </div>

            <div class="form-group lista">
                <label for="total_horas">Total de horas:</label>
                <input type="datetime" class="form-control" name="total_horas"
                    value="{{ old('total_horas', $atividade->total_horas) }}" required>
            </div>

            <div class="form-group">
                <label for="arquivo">Arquivo:</label>
                <input type="file" class="form-control" name="arquivo" accept=".pdf, .doc, .docx, .png, .jpeg">
            </div>

            <input type="hidden" name="nome_arquivo" value="{{ old('arquivo', $atividade->arquivo) }}">

            <button type="submit" style="background-color: #0d6efd" class="btn-primary">Salvar</button>
            <button type="button" onclick="window.location='{{ route('atividade.listar') }}'" class="btn btn-secondary">Cancelar</button></form>
        </form>

    </div>
    <script>
        var selectElement = document.querySelector('select[name="categoria"]');
        selectElement.addEventListener('change', function () {
            if (this.value === 'Outros') {
                document.getElementById('other-category-input').style.display = 'block';
            } else {
                document.getElementById('other-category-input').style.display = 'none';
            }
        });
    </script>
</body>
</html>
