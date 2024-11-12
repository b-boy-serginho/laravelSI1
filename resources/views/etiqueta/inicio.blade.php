@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1 class="text-center text-primary">Lista de Etiquetas</h1>
@stop

@section('content')

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
                        Formulario de Etiqueta
                    </h1>

                    <form action="{{ url('/crear_etiqueta') }}" method="POST">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="producto_id" class="font-weight-medium">Producto</label>
                                <select class="form-control" name="producto_id" required>
                                    <option value="" selected>Seleccionar producto...</option>
                                    @foreach ($producto as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nombre" class="font-weight-medium">Nombre</label>
                                <input type="text" name="nombre" id="nombre" required class="form-control"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Crear Etiqueta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="card shadow-lg">
            
            <div class="card-header bg-primary text-white text-center">
                <h2 class="h5 font-weight-bold mb-0">Etiqueta</h2>
            </div>


            <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Producto</th>
                            <th>Nombre</th>
                            {{-- <th>Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etiqueta as $etiqueta)
                            <tr>
                                <td>{{ $etiqueta->producto->nombre }}</td>
                                <td>{{ $etiqueta->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@stop
