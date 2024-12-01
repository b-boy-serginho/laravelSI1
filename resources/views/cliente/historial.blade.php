@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1 style="text-align: center">Historial de pagos de cada usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title ">Detalle de Pagos</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Importe</th>
                            <th>Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedido as $user)
                            <tr>
                                <td>{{ $user->nombreUsuario }}</td>
                                <td>{{ $user->correo }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>{{ $user->direccion }}</td>
                                <td>{{ $user->nombreProducto }}</td>
                                <td class="text-center">{{ $user->cantidad }}</td>
                                <td class="text-end">{{ number_format($user->precioVenta, 2) }}</td>
                                <td class="text-end">{{ number_format($user->importe, 2) }}</td>
                                <td class="text-center">
                                    <span class="badge 
                                        @if ($user->estado_pago == 'completo') bg-success 
                                        @elseif ($user->estado_pago == 'pendiente') bg-warning 
                                        @else bg-danger 
                                        @endif">
                                        {{ ucfirst($user->estado_pago) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-danger">
                                    No se encontraron los datos
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
