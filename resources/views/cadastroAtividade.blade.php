<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAC</title>

    body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #007bff;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 50px;
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
        }

    </style>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/')}}">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link active" aria-current="page" href="{{url('atividade/listar')}}">Atividades</a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>

</head>
<body>

<h1>Cadastrar Atividade</h1>

<div class="container">

    <form action="{{ $atividade->id ? route('atividade.atualizar', $atividade->id) : route('atividade.salvar') }}" method="POST">
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

        <div class="form-group">
            <label for="tipo">Categoria:</label>
            <select class="form-control" name="tipo" required>
                <option value="Tipo1" @if($atividade->tipo == 'Tipo1') selected @endif>Tipo 1</option>
                <option value="Tipo2" @if($atividade->tipo == 'Tipo2') selected @endif>Tipo 2</option>
                <option value="Tipo3" @if($atividade->tipo == 'Tipo3') selected @endif>Tipo 3</option>
            </select>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" class="form-control" name="data_inicio" value="{{ old('data_inicio', $atividade->data_inicio) }}" required>
        </div>

        <div class="form-group">
            <label for="data_conclusao">Data de Conclusão:</label>
            <input type="date" class="form-control" name="data_conclusao" value="{{ old('data_conclusao', $atividade->data_conclusao) }}" required>
        </div>

        <div class="form-group">
            <label for="ra">Subcategoria:</label>
            <input type="text" class="form-control" name="ra" value="{{ old('ra', $atividade->ra) }}" required>
        </div>

        <div class="form-group">
            <label for="curso_id">Carga Horária:</label>
            <select class="form-control" name="curso_id" required>
                <option value="">Selecione um curso</option>
                @foreach($cursos as $curso)
                    <option {{ $curso->id == old('curso_id', $atividade->curso_id) ? 'selected' : '' }} value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Adicione outros campos conforme necessário -->

        <button type="submit" class="btn-primary">Salvar</button>
        <a href="{{ route('atividade.listar') }}" class="btn-secondary">Cancelar</a>
    </form>

</div>


    </body>
</html>