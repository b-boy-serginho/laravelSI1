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

                    <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario de Inventario</h1>
                    <form action="{{ url('/crear_inventario') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="producto_id" class="font-weight-medium">Proveedor</label>
                                <select class="form-control" name="producto_id" required>
                                    <option value="" selected>Seleccionar producto...</option>
                                    @foreach ($producto as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->cod}} ... {{ $prod->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="fechaActualizacion" class="font-weight-medium">Fecha de Actualizacion</label>
                                <input type="datetime-local" name="fechaActualizacion" id="fechaActualizacion" required class="form-control">
                            </div>
                            
                        </div>

                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-primary">Crear Factura</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Facturas de Compras</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Producto</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    {{-- <th>Acciones</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($inventario as $inv)
                <tr>
                    <td>{{ $inv->producto->nombre }}</td>
                    <td>{{ $inv->fechaActualizacion }}</td>
                    <td>{{ $inv->cantidad }}</td>
                    {{-- <td>
                        <a href="{{ url('editar_factura', $factura->id) }}" class="btn btn-link text-primary">Editar</a>
                        <a href="{{ url('borrar_factura', $factura->id) }}" class="btn btn-link text-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
