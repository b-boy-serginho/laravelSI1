@extends('adminlte::page')

@section('title', 'Historial de Pagos')

@section('content_header')
    <h1 class="text-center">Historial de Pagos de Usuarios</h1>
@stop

@section('content')

    {{-- Mensaje de error si la fecha no es válida --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Formulario de Filtros --}}
    <div class="mb-3">
        <form action="{{ route('reportePDF') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
                <select name="nombreUsuario" id="nombreUsuario" class="form-control">
                    <option value="">-- Seleccione un usuario --</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario }}" 
                            {{ request('nombreUsuario') == $usuario ? 'selected' : '' }}>
                            {{ $usuario }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="nombreProducto" class="form-label">Nombre de Producto</label>
                <select name="nombreProducto" id="nombreProducto" class="form-control">
                    <option value="">-- Seleccione un producto --</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto }}" 
                            {{ request('nombreProducto') == $producto ? 'selected' : '' }}>
                            {{ $producto }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="fechaInicio" class="form-label">Fecha</label>
                <input type="date" name="fechaInicio" id="fechaInicio" class="form-control"
                       value="{{ request('fechaInicio', $fechaMin) }}">
            </div>
            {{-- <div class="col-md-4">
                <label for="fechaFin" class="form-label">Fecha de Fin</label>
                <input type="date" name="fechaFin" id="fechaFin" class="form-control"
                       value="{{ request('fechaFin', $fechaMax) }}">
            </div> --}}
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-50 me-2">Filtrar</button>
                <button type="submit" name="generate_pdf" value="1" class="btn btn-danger w-50">Generar PDF</button>
            </div>
        </form>
    </div>

    {{-- Tabla de Resultados --}}
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Detalle de Pagos</h5>
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
                            <th>Fecha Creación</th>
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
                                    <span
                                        class="badge 
                                        @if ($user->estado_pago == 'completo') bg-success 
                                        @elseif ($user->estado_pago == 'pendiente') bg-warning 
                                        @else bg-danger @endif">
                                        {{ ucfirst($user->estado_pago) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $user->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-danger">
                                    No se encontraron datos.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
