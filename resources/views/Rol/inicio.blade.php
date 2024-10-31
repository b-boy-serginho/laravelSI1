@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
@stop

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    
                    @if (session('mensaje'))
                        <div class="alert alert-success text-center">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <h1 class="h4 font-weight-bold text-secondary mb-4">
                        Formulario de Roles
                    </h1>

                    <form action="{{ url('/crear_rol') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="usuario_id" class="font-weight-medium">Usuario</label>
                            <select class="form-control" name="usuario_id" required>
                                <option value="" selected>Seleccionar usuario...</option>
                                @foreach ($usuario as $user)
                                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rol_id" class="font-weight-medium">Asignar Rol</label>
                            <select class="form-control" name="rol_id" required>
                                <option value="" selected>Seleccionar rol...</option>
                                @foreach ($rol as $rols)
                                    <option value="{{ $rols->id }}">{{ $rols->id }} - {{ $rols->descripcion }}</option>
                                @endforeach
                            </select>              
                        </div>

                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-success">Asignar Rol</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Roles</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>                        
                    <th>Usuario</th>
                    <th>Rol</th> 
                    <th>Acciones</th>                       
                </tr>
            </thead>
            <tbody>
            @foreach($usuario_rol as $usuario_rol)
                <tr>
                    <td>{{ $usuario_rol->usuario->name }}</td>
                    <td>{{ $usuario_rol->rol->descripcion }}</td>
                    <td>
                        <a href="{{ url('editar_rol', $usuario_rol->id) }}" class="btn btn-link text-primary">Editar</a>
                        <a href="{{ url('borrar_rol', $usuario_rol->id) }}" 
                           class="btn btn-link text-danger" 
                           onclick="return confirm('¿Estás seguro de eliminar este rol?')">Eliminar</a>
                    </td>
                </tr>
            @endforeach 
            </tbody>
        </table>
    </div>
</div>
@stop
