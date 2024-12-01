@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
@stop

@section('content')
    <div class="container py-5">        

        <h2 class="h5 font-weight-bold text-secondary mt-5">FACTURA</h2>

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
                        {{-- <th>Acciones</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factura as $factura)
                        <tr>
                            <td>{{ $factura->producto->cod }} - {{ $factura->producto->nombre }}</td>
                            <td>{{ $factura->producto->descripcion }}</td>                            
                            <td>{{ $factura->cantidad }}</td>
                            <td>{{ $factura->producto->medida }}</td>
                            <td>{{ number_format($factura->precio_unitario, 2) }}</td>
                            <td>{{ number_format($factura->descuento, 2) }}</td>
                            <td>{{ number_format($factura->subtotal, 2) }}</td>
{{--                             
                            <td>{{ $factura->descripcion_monto }}</td>
                            <td>{{ $factura->cliente->codigo }} - {{ $factura->cliente->nombre }}</td>
                            <td>{{ $factura->nit }}</td>
                            <td>{{ $factura->nro }}</td>
                            <td>{{ $factura->cod_aut }}</td> --}}

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
            {{ $factura->almacen->nombre }} - {{ $factura->almacen->encargado }}
            <p>Son: {{ $factura->descripcion_monto }}</p>
        </div>
        
    </div>
@stop
