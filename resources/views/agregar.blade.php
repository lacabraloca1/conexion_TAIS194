<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QHTK2yJpcFj3Ys9wRU0Fr4P0skYtcvmFb5uYh1Z2kRJmOJmJY6Nb+ALe1hF" crossorigin="anonymous">
</head>
<body>

<form action="{{ route('usuario.store') }}" method="POST">
    @csrf

    <h1 class="display-5 mt-3 text-center text-primary">Registro de Usuario</h1>
    <h4 class="display-8 mt-3 text-center text-danger">FastAPI</h4>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="text-center">
            <a href="{{ route('usuario.index') }}">→ Consultar de Usuarios</a>
        </div>

        <div class="mb-3">
            <label for="txtNombre" class="form-label">Nombre:</label>
            <input type="text" name="txtNombre" class="form-control" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="txtEdad" class="form-label">Edad:</label>
            <input type="number" name="txtEdad" class="form-control" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="txtCorreo" class="form-label">Correo:</label>
            <input type="text" name="txtCorreo" class="form-control" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </div> <!-- cierra el container -->
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvprFYbEYs1U8oBMiwkxz6s9DFv2LE5a6a5N5D2xhv9E6cs1zLk6aW7X6jzImk" crossorigin="anonymous"></script>

</body>
</html>
