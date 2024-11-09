@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
<h1 class="text-center text-primary mb-4">Registro de Bitácora</h1>
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descripción</th>
                <th scope="col">Usuario</th>
                <th scope="col">Id Usuario</th>
                <th scope="col">IP</th>
                <th scope="col">Navegador</th>
                <th scope="col">Tabla Afectada</th>
                <th scope="col">Registro ID</th>
                <th scope="col">Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bitacora as $bitacoras)
                <tr>
                    <td>{{ $bitacoras->id }}</td>
                    <td>{{ $bitacoras->descripcion }}</td>
                    <td>{{ $bitacoras->usuario }}</td>
                    <td>{{ $bitacoras->usuario_id }}</td>
                    <td>{{ $bitacoras->direccion_ip }}</td>
                    <td>{{ $bitacoras->navegador }}</td>
                    <td>{{ $bitacoras->tabla }}</td>
                    <td>{{ $bitacoras->registro_id }}</td>
                    <td>{{ $bitacoras->fecha_hora }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
