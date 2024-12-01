@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
@stop

@section('content')
    <div class="container py-5">

        <!-- Logo -->
        <div style="height: 5%; width: 7%">
            <img src="{{ asset('logo/logo.jpg') }}" alt="Logo" class="img-fluid">
        </div>
        {{-- <strong>ARTE-DEC</strong> --}}
        <!-- Título de la factura -->
        <h1 class="text-center font-weight-bold" style="font-size: 2.5rem; color: #4B4B4B;">FACTURA</h1>

        <!-- Información del cliente -->
        @foreach ($cliente as $cliente)
            <div class="mt-3 mb-4">
                <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
                <p><strong>CI:</strong> {{ $cliente->ci }}</p>
                <p><strong>Código del Cliente:</strong> {{ $cliente->codigo }}</p>
            </div>
        @endforeach

        <!-- Tabla de productos -->
        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>CODIGO PRODUCTO</th>
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>
                        <th>UNIDAD DE MEDIDA</th>
                        <th>PRECIO UNITARIO</th>
                        <th>DESCUENTO</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalAPagar = 0; ?>
                    @foreach ($factura as $factura)
                        <tr>
                            <td>{{ $factura->producto->cod }} - {{ $factura->producto->nombre }}</td>
                            <td>{{ $factura->producto->descripcion }}</td>
                            <td>{{ $factura->cantidad }}</td>
                            <td>{{ $factura->producto->medida }}</td>
                            <td>{{ number_format($factura->precio_unitario, 2) }}</td>
                            <td>{{ number_format($factura->descuento, 2) }}</td>
                            <td>{{ number_format($factura->subtotal, 2) }}</td>                            
                        </tr>
                        <?php $totalAPagar += $factura->subtotal; ?>
                    @endforeach
                </tbody>
            </table>

            <!-- Información de la tienda y monto total -->
            <div class="mt-4">
                <p><strong>Almacen:</strong> {{ $factura->almacen->nombre }} - <strong>Encargado:</strong> {{ $factura->almacen->encargado }}</p>
                <div style="text-align: right; font-size: 1.25rem; font-weight: bold; color: #333;">
                    <p><strong>MONTO TOTAL A PAGAR:</strong> Bs {{ number_format($totalAPagar, 2) }}</p>
                </div>
            </div>
        </div>

    </div>
@stop
