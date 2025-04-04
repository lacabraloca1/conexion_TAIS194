<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1 class="display-1 text-center text-primary">Consulta de Usuarios</h1>
    <h3 class="display-3 text-center text-danger mb-5">Laravel -- FastAPI</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('usuario.inicio') }}" class="btn btn-success">Agregar Nuevo</a>
        <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Actualizar Lista</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Correo</th>
                <th scope="col" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario['id'] }}</td>
                <td>{{ $usuario['name'] }}</td>
                <td>{{ $usuario['age'] }}</td>
                <td>{{ $usuario['email'] }}</td>
                <td class="d-flex justify-content-center gap-2">
                    <a href="{{ route('usuario.edit', $usuario['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    
                    <form action="{{ route('usuario.destroy', $usuario['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>