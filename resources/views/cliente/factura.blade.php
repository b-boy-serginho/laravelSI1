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

                        <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario de la Factura</h1>


                        <form action="{{ url('/crear_factura_cliente') }}" method="POST">
                            @csrf

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="cliente_id" class="font-weight-medium">Codigo del cliente</label>
                                    <select class="form-control" name="cliente_id" required>
                                        <option value="" selected>Seleccionar codigo del cliente...</option>
                                        @foreach ($cliente as $client)
                                            <option value="{{ $client->id }}">{{ $client->codigo }} -
                                                {{ $client->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="almacen_id" class="font-weight-medium">Almacen</label>
                                    <select class="form-control" name="almacen_id" required>
                                        <option value="" selected>Seleccionar almacen...</option>
                                        @foreach ($almacen as $alma)
                                            <option value="{{ $alma->id }}">{{ $alma->nombre }} - {{ $alma->encargado }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="producto_id" class="font-weight-medium">Codigo del producto</label>
                                    <select class="form-control" name="producto_id" required>
                                        <option value="" selected>Seleccionar producto...</option>
                                        @foreach ($producto as $prod)
                                            <option value="{{ $prod->id }}">{{ $prod->cod}} - {{ $prod->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>                                  

                                <div class="form-group col-md-6">
                                    <label for="nit" class="font-weight-medium">NIT</label>
                                    <input type="number" name="nit" min="0" id="nit" required
                                        class="form-control" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="nro" class="font-weight-medium">NRO</label>
                                    <input type="number" name="nro" min="0" id="nro" required
                                        class="form-control" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="cod_aut" class="font-weight-medium">Codigo de Autorizacion</label>
                                    <input type="number" name="cod_aut" min="0" id="cod_aut" required
                                        class="form-control" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="cantidad" class="font-weight-medium">Cantidad</label>
                                    <input type="number" name="cantidad" min="0" id="cantidad" required class="form-control"
                                        placeholder="">
                                </div> 

                                <div class="form-group col-md-6">
                                    <label for="precio_unitario" class="font-weight-medium">Precio Unitario</label>
                                    <input type="number" name="precio_unitario" min="0" id="precio_unitario" required class="form-control"
                                        placeholder="">
                                </div> 
                                
                                <div class="form-group col-md-6">
                                    <label for="descuento" class="font-weight-medium">Descuento</label>
                                    <input type="number" name="descuento" min="0" id="descuento" required class="form-control"
                                        placeholder="">
                                </div>                                 

                                <div class="form-group col-md-6">
                                    <label for="descripcion_monto" class="font-weight-medium">Descripcion del monto a pagar</label>
                                    <input type="text" name="descripcion_monto" id="descripcion_monto" required class="form-control"
                                        placeholder="Escriba el subtotal en palabras">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="fecha" class="font-weight-medium">Fecha</label>
                                    <input type="datetime-local" name="fecha" id="fecha" required class="form-control"
                                        placeholder="">
                                </div>

                               
                            </div>

                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Crear Factura</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Clientes</h2>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Código Cliente</th>
                        <th>Almacén</th>
                        <th>Producto</th>
                        <th>NIT</th>
                        <th>NRO</th>
                        <th>Código de Autorización</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Descuento</th>
                        <th>Descripción del Monto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factura as $factura)
                        <tr>
                            {{-- <td>{{ $factura->cliente->codigo }} - {{ $factura->cliente->nombre }}</td>
                            <td>{{ $factura->almacen->nombre }} - {{ $factura->almacen->encargado }}</td>
                            <td>{{ $factura->producto->cod }} - {{ $factura->producto->nombre }}</td>
                            <td>{{ $factura->nit }}</td>
                            <td>{{ $factura->nro }}</td>
                            <td>{{ $factura->cod_aut }}</td>
                            <td>{{ $factura->cantidad }}</td>
                            <td>{{ number_format($factura->precio_unitario, 2) }}</td>
                            <td>{{ number_format($factura->descuento, 2) }}</td>
                            <td>{{ $factura->descripcion_monto }}</td> --}}
                            {{-- <td>
                                <a href="{{ url('/factura/' . $factura->id . '/edit') }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                <form action="{{ url('/factura/' . $factura->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar esta factura?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
@stop
