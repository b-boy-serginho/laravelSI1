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

                    <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario de Categoría</h1>

                    <form action="{{ url('/crear_categoria') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre" class="font-weight-medium">Nombre de la categoría</label>
                                <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Nombre de la categoría">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="descripcion" class="font-weight-medium">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion" required class="form-control" placeholder="Descripción de la categoría">
                            </div>
                        </div>

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Crear Categoría</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Categorías</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nombre de la categoría</th>                                   
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoria as $cat)
                <tr>
                    <td>{{ $cat->nombre }}</td> 
                    <td>{{ $cat->descripcion }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ url('editar_categoria', $cat->id) }}" class="btn btn-link text-primary">Editar</a>                        
                        <a href="{{ url('borrar_categoria', $cat->id) }}" class="btn btn-link text-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
