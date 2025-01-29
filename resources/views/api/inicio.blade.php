<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Usuarios</h1>

        @if(session('sms'))
            <div class="alert alert-success">
                {{ session('sms') }}
            </div>
        @endif

        <!-- Formulario para crear un nuevo usuario -->
        {{-- <form action="{{ route('crear_usuario') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="number" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="datetime-local" name="fecha" id="fecha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form> --}}

        <!-- Tabla para mostrar los usuarios -->
        <h2 class="mt-5">Usuarios Registrados</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($api as $usuario)
                        <tr>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->correo }}</td>
                            <td>{{ $usuario->telefono }}</td>
                            <td>{{ $usuario->fecha }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
