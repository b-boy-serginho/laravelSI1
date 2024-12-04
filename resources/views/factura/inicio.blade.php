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

                    <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario de Factura</h1>
                    <form action="{{ url('/crear_factura') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="proveedor_id" class="font-weight-medium">Proveedor</label>
                                <select class="form-control" name="proveedor_id" required>
                                    <option value="" selected>Seleccionar proveedor...</option>
                                    @foreach ($proveedor as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->id }} ... {{ $prov->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="fecha" class="font-weight-medium">Fecha</label>
                                <input type="date" name="fecha" id="fecha" required class="form-control">
                            </div>

                            {{-- <div class="form-group col-md-4">
                                <label for="importe" class="font-weight-medium">Importe</label>
                                <input type="number" min="0" name="importe" id="importe" required class="form-control" placeholder="Precio total">
                            </div> --}}
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
                    <th>Proveedor</th>
                    <th>Fecha</th>
                    <th>Importe</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $totalAPagar = 0; @endphp
                @foreach($factura as $factura)
                <tr>
                    <td>{{ $factura->proveedor->nombre }}</td>
                    <td>{{ $factura->fecha }}</td>   
                    <td> Bs {{ $factura->importe }}</td>
                    <td>
                        <a href="{{ url('editar_factura', $factura->id) }}" class="btn btn-link text-primary">Editar</a>
                        <a href="{{ url('borrar_factura', $factura->id) }}" class="btn btn-link text-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        <a href="{{ url('prov_total', $factura->id) }}" class="btn btn-link text-info" >ver detalles</a>

                    </td>
                    @php $totalAPagar += $factura->importe; @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-right" style="font-size: 1.25rem; font-weight: bold; color: #333;">
        <p><strong>MONTO TOTAL:</strong> Bs {{ number_format($totalAPagar, 2) }}</p>
    </div>
</div>
@stop
