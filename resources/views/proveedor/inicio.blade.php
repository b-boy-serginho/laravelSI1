@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
@stop

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if (session('mensaje'))
                        <div class="alert alert-success text-center">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario del Proveedor</h1>

                    <form action="{{ url('/crear_proveedor') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre" class="font-weight-medium">Nombre del proveedor</label>
                                <input type="text" name="nombre" id="nombre" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contacto" class="font-weight-medium">Contacto</label>
                                <input type="text" name="contacto" id="contacto" required class="form-control" placeholder="Número de contacto">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="correo" class="font-weight-medium">Correo</label>
                                <input type="email" name="correo" id="correo" required class="form-control" placeholder="Correo electrónico">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="direccion" class="font-weight-medium">Dirección</label>
                                <input type="text" name="direccion" id="direccion" required class="form-control" placeholder="Dirección del proveedor">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="telefono" class="font-weight-medium">Teléfono</label>
                                <input type="number" name="telefono" id="telefono" required class="form-control" placeholder="Teléfono del proveedor">
                            </div>
                        </div>

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Crear Proveedor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Proveedores</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contacto</th>                                   
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedor as $prov)
                <tr>
                    <td>{{ $prov->nombre }}</td>
                    <td>{{ $prov->correo }}</td>
                    <td>{{ $prov->contacto }}</td>
                    <td>{{ $prov->direccion }}</td>
                    <td>{{ $prov->telefono }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ url('editar_proveedor', $prov->id) }}" class="btn btn-link text-primary">Editar</a>  
                        <a href="{{ url('borrar_proveedor', $prov->id) }}" class="btn btn-link text-danger" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
