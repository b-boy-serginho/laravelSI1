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

                        <h1 style="text-align: center; font-weight: bold">Formulario de la Factura</h1>
                        

                        <br>

                        <form action="{{ url('/crear_factura_cliente', $cliente->id) }}" method="POST">
                            @csrf

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="cliente_id" class="font-weight-medium"></label>
                                    <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                                    <div style=" font-size: 20px">
                                        <strong>PARA: </strong> {{ $cliente->nombre }}
                                    </div>
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
                                            <option value="{{ $prod->id }}">{{ $prod->cod }} - {{ $prod->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
{{-- 
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
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label for="cantidad" class="font-weight-medium">Cantidad</label>
                                    <input type="number" name="cantidad" min="0" id="cantidad" required
                                        class="form-control" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="precio_unitario" class="font-weight-medium">Precio Unitario</label>
                                    <input type="number" name="precio_unitario" min="0" id="precio_unitario"
                                        required class="form-control" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="descuento" class="font-weight-medium">Descuento</label>
                                    <input type="number" name="descuento" min="0" id="descuento" required
                                        class="form-control" placeholder="">
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



        <div style="display: flex; align-items: center; justify-content: space-between; padding: 7%; ">
            <img style="height: 100px;" src="{{ asset('logo/logo.jpg') }}" alt="Logo" class="img-fluid">
            <div style="text-align: left; border: 4px solid black; border-radius: 5px; padding: 10px; width: fit-content;">
                <table style="width: 100%;">
                    <tr>
                        <td><strong>NIT:</strong></td>
                        <td>102812501</td>
                    </tr>
                    <tr>
                        <td><strong>NRO:</strong></td>
                        <td>5014</td>
                    </tr>
                    <tr>
                        <td><strong>COD. AUTORIZACIÓN:</strong></td>
                        <td>4513FKASALS</td>
                    </tr>
                </table>
            </div>
        </div>



        <div class="container py-2">
            <div class="text-center">
                <h1 class="font-weight-bold" style="font-size: 2.5rem; color: #4B4B4B;">FACTURA</h1>
            </div>

            <div class="mt-2">
                <p><strong>Fecha:</strong> {{ $cliente->fecha }} </p>
                <p><strong>Nombre del Cliente:</strong> {{ $cliente->nombre }}</p>
                <p><strong>CI:</strong> {{ $cliente->ci }}</p>
                <p><strong>Código del Cliente:</strong> {{ $cliente->codigo }}</p>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-striped table-bordered">
                    <thead>
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
                        @php $totalAPagar = 0; @endphp
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
                            @php $totalAPagar += $factura->subtotal; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <p><strong>Almacen:</strong> {{ $factura->first()->almacen->nombre ?? '' }} - <strong>Encargado:</strong>
                    {{ $factura->first()->almacen->encargado ?? '' }}</p>
                <div class="text-right" style="font-size: 1.25rem; font-weight: bold; color: #333;">
                    <p><strong>MONTO TOTAL A PAGAR:</strong> Bs {{ number_format($totalAPagar, 2) }}</p>
                </div>
            </div>
        </div>

        <a href="{{ route('pdf_factura', $cliente->id) }}" style="text-align: center; background-color: green; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px;">
            Imprimir Factura
        </a>
        
        

    </div>
@stop
