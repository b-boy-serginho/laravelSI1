@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1 class="text-center text-primary">Lista de Pedidos</h1>
@stop

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">

                
                <h2 class="h5 font-weight-bold mb-0">Pedidos de Clientes</h2>
            </div>
            <div class="card-body">
                @if (session('mensaje'))
                    <div class="alert alert-success text-center">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <div style="padding-bottom: 30px;">
                    <form action="{{url('busqueda')}}" method="GET">
                        @csrf
                        <input type="text" name="search" placeholder="que es lo que buscas">
                        <input type="submit" value="Search" style="background-color: rgb(65, 65, 155); color: aliceblue; ">
                    </form>
                </div>
                
                <a href="{{ route('generarPDF') }}" class="btn btn-success">IMPRIMIR TODO</a>                        

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
                                <th>Entrega</th>
                                <th>Imagen</th>
                                <th>PDF</th>
                                <th>Acciones</th>
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
                                    <td class="text-center">{{ ucfirst($user->estado_pago) }}</td>
                                    <td class="text-center">
                                        @if ($user->estado_entrega === 'PROCESANDO')
                                            <span class="badge bg-warning text-dark">{{ $user->estado_entrega }}</span>
                                        @else
                                            <span class="badge bg-success">Entregado</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <img style="width: 60px; height: 60px; border-radius: 8px;" src="/imagen/{{ $user->imagen_url }}" alt="Imagen del producto">
                                    </td>
                                    <td>
                                        <a href="{{ route('imprimir', $user->id) }}" class="btn btn-success">Imprimir</a>

                                    </td>
                                    <td class="text-center">
                                        @if ($user->estado_entrega == 'PROCESANDO')
                                            <a href="{{ url('entrega', $user->id) }}"
                                                onclick="return confirm('¿Estás seguro de marcar como entregado?')"
                                                class="btn btn-sm btn-primary">
                                                Cambiar a Entregado
                                            </a>
                                        @else
                                            <span class="text-muted">Entregado</span>
                                        @endif

        
                                    </td>
                                </tr>

                                @empty    

                                <tr>
                                    <td colspan="16">
                                        No se encontraron los datos
                                    </td>
                                </tr>
                               

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
