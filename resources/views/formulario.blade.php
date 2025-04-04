<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1 class="display-1 text-center text-primary">Registro de Usuario</h1>
    <h3 class="display-3 text-center text-danger mb-5">Laravel -- FastAPI</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Volver a Consulta</a>
    </div>

    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="txtNombre" class="form-label">Nombre</label>
            <input type="text" name="txtNombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="txtEdad" class="form-label">Edad</label>
            <input type="number" name="txtEdad" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="txtCorreo" class="form-label">Correo</label>
            <input type="email" name="txtCorreo" class="form-control" required>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary me-md-2">Guardar</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>