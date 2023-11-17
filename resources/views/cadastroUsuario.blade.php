<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAC</title>

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

<h1>Cadastrar Usuário</h1>

<form action="{{ $usuario->id ? route('usuario.atualizar', $usuario->id) :route('usuario.salvar') }}" method="POST">
  @csrf
    @if($usuario->id)
      @method('PUT')
    @endif


  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome" value="" required>
  </div>

  <div class="form-group">
    <label for="cpf">CPF:</label>
    <input type="text" class="form-control" name="cpf" value="" required>
  </div>

  <div class="form-group">
    <label for="matricula">Matricula:</label>
    <input type="text" class="form-control" name="matricula" value="" required>
  </div>

  <div class="form-group">
    <label for="sexo">Sexo:</label>
    <select class="form-control" name="sexo" required>
        <option value="M" @if($usuario->sexo == 'M') selected @endif>M</option>
        <option value="F" @if($usuario->sexo == 'F') selected @endif>F</option>
    </select>
</div>
  <div class="form-group">
    <label for="dataAtiv">Data de ativação:</label>
    <input type="date" class="form-control" name="dataAtiv" value="" required>
  </div>

  <div class="form-group">
    <label for="ra">Ra:</label>
    <input type="text" class="form-control" name="ra" value="" required>
  </div>

  <div class="form-group">
    <label for="curso">Escolha o Curso</label>
    <select class="form-control" name="curso_id" required>
        <option value="">Selecione um curso</option>
        @foreach($cursos as $curso)
            <option {{ $curso->id == old('curso_id', $usuario->curso_id) ? 'selected' : '' }} value="{{ $curso->id }}">{{ $curso->nome }}</option>
        @endforeach
    </select>
</div>


  <button type="submit" class="btn btn-primary">Salvar</button>
  <a href="{{ route('usuario.listar') }}" class="btn btn-secondary">Cancelar</a>
</form>

    </body>
</html>