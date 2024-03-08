<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Atividades</title>

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
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 50px;
        }
        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin-top: 5px;
            text-decoration: none;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
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

<div class="container">
    <h1>Listagem de Atividades</h1>
    <a href="{{ route('atividade.novo') }}" class="btn btn-primary">Nova Atividade</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
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
            <th>Baixar</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        </thead>
        <tbody>
        @foreach($atividades as $atividade)
            <tr>
                <td>{{ $atividade->id }}</td>
                <td>{{ $atividade->titulo }}</td>
                <td>{{ $atividade->credencial }}</td>
                <td>{{ $atividade->semestre }}</td>
                <td>{{ $atividade->curso->nome }}</td>
                <td>{{ $atividade->categoria }}</td>
                <td>{{ $atividade->data_inicio }}</td>
                <td>{{ $atividade->data_conclusao }}</td>
                <td>{{ $atividade->total_horas}}</td>
                <td>{{ $atividade->usuario->nome}}</td>
                <td><a href="{{ asset('uploads/' . $atividade->arquivo) }}" download>{{ $atividade->arquivo }}</a></td>
                <td><a class="btn btn-primary" href="editar/{{ $atividade->id }}">Editar</a></td>
                <td><a class="btn btn-danger" href="excluir/{{ $atividade->id }}">Excluir</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
