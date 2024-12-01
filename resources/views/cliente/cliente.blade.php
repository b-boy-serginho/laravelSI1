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

                    <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario del Cliente</h1>
                    
                    <form action="{{ url('/crear_cliente') }}" method="POST">
                        @csrf
                
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="codigo" class="font-weight-medium">Codigo</label>
                                <input type="number" name="codigo" min="1" id="codigo" required class="form-control" placeholder="CI del cliente">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ci" class="font-weight-medium">CI</label>
                                <input type="number" name="ci" min="1" id="ci" required class="form-control" placeholder="CI del cliente">
                            </div>                           

                            <div class="form-group col-md-6">
                                <label for="nombre" class="font-weight-medium">Nombre del cliente</label>
                                <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Nombre del cliente">
                            </div> 
                            
                            <div class="form-group col-md-6">
                                <label for="fecha" class="font-weight-medium">Fecha</label>
                                <input type="datetime-local" name="fecha" id="fecha" required class="form-control"
                                    placeholder="">
                            </div>                        
                            
                        </div> 

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Crear Cliente</button>
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
                    
                    <th>Codigo</th>
                    <th>CI</th>
                    <th>Nombre</th> 
                    <th>Fecha</th>                                   
                    <th>Factura</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cliente as $cliente)
                <tr>
                    <td>{{ $cliente->codigo }}</td>
                    <td>{{ $cliente->ci }}</td>
                    <td>{{ $cliente->nombre}}</td> 
                    <td>{{ $cliente->fecha}}</td> 
                    <td class="d-flex justify-content-around">
                        <a href="{{ url('facturar', $cliente->id) }}"
                            class="btn btn-link text-primary">CREAR FACTURA</a>                      
                    </td> 
                   
                   
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@stop

