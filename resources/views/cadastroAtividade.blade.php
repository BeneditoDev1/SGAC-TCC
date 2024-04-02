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
            background-color: green;
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
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            text-align: center;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('usuario/listar')}}">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('curso/listar')}}">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{url('atividade/listar')}}">Atividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{url('about')}}">Regras</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" name="categoria" required>
                    <option value="Curso" @if($atividade->tipo == 'Curso') selected @endif>Curso</option>
                    <option value="Palestra" @if($atividade->tipo == 'Palestra') selected @endif>Palestra</option>
                    <option value="Evento" @if($atividade->tipo == 'Evento') selected @endif>Evento</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>

            <div class="form-group" id="other-category-input" style="display: none;">
                <label for="outro_categoria">Descreva sua atividade:</label>
                <input type="text" class="form-control" name="outro_categoria">
            </div>

            <div class="form-group">
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

            <div class="form-group">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" class="form-control" name="data_inicio"
                    value="{{ old('data_inicio', $atividade->data_inicio) }}" required>
            </div>

            <div class="form-group">
                <label for="data_conclusao">Data de Conclusão:</label>
                <input type="date" class="form-control" name="data_conclusao"
                    value="{{ old('data_conclusao', $atividade->data_conclusao) }}" required>
            </div>

            <div class="form-group">
                <label for="total_horas">Total de horas:</label>
                <input type="datetime" class="form-control" name="total_horas"
                    value="{{ old('total_horas', $atividade->total_horas) }}" required>
            </div>

            <div class="form-group">
                <label for="arquivo">Arquivo:</label>
                <input type="file" class="form-control" name="arquivo" accept=".pdf, .doc, .docx, .png, .jpeg">
            </div>

            <input type="hidden" name="nome_arquivo" value="{{ old('arquivo', $atividade->arquivo) }}">

            <button type="submit" class="btn-primary">Salvar</button>
            <a href="{{ route('atividade.listar') }}" class="btn-secondary">Cancelar</a>
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
