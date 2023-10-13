<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cursos</title>

    <style>
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
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            text-align:center;  
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 300px;
            margin: 0 auto;
            padding: 40px;
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
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .btn-primary,
        .btn-secondary {
            display: block;
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
        }
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
        }

    </style>
</head>
<body>
<form action="{{ $curso->id ? route('curso.atualizar', $curso->id) : route('curso.salvar')  }}" method="POST">
    @csrf
    @if($curso->id)
      @method('PUT')
    @endif

    <input type="hidden" name="id" value="{{ $curso->id }}">

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome" value="{{ $curso->nome }}" required>
    </div>

    <div class="form-group">
    <label for="semestre">Semestre:</label>
    <select class="form-control" name="semestre" required>
        <option value="1" @if($curso->semestre == 1) selected @endif>1</option>
        <option value="2" @if($curso->semestre == 2) selected @endif>2</option>
    </select>
</div>


    <div class="form-group">
      <label for="ano">Ano:</label>
      <input type="date" class="form-control" name="ano" value="{{ $curso->ano }}" required></input>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('curso.listar') }}" class="btn btn-secondary">Cancelar</a>
  </form>
</body>
</html>