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

                    <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario del Detalle de la Compra</h1>
                    <form action="{{ url('/crear_detalle') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="proveedor_id" class="font-weight-medium">Proveedor</label>
                                <select class="form-control" name="proveedor_id" required>
                                    <option value="" selected>Seleccionar proveedor...</option>
                                    @foreach ($proveedor as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="producto_id" class="font-weight-medium">Producto</label>
                                <select class="form-control" name="producto_id" required>
                                    <option value="" selected>Seleccionar producto...</option>
                                    @foreach ($producto as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cantidad" class="font-weight-medium">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" required class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="costoUnitario" class="font-weight-medium">Costo Unitario</label>
                                <input type="number" name="costoUnitario" id="costoUnitario" required class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-primary">Crear Detalle de Compra</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Detalles de Compra</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Proveedor</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Costo Unitario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalle as $det)
                <tr>
                    <td>{{ $det->proveedor->nombre }}</td>
                    <td>{{ $det->producto->nombre }}</td>
                    <td>{{ $det->cantidad }}</td>
                    <td>{{ $det->costoUnitario }}</td>
                    <td>
                        <a href="{{ url('editar_detalle', $det->id) }}" class="btn btn-link text-primary">Editar</a>
                        <a href="{{ url('borrar_detalle', $det->id) }}" class="btn btn-link text-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
