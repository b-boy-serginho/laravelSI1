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

                    <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario del Producto</h1>
                    <form action="{{ url('/crear_producto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="categoria_id" class="font-weight-medium">Categoría</label>
                                <select class="form-control" name="categoria_id" required>
                                    <option value="" selected>Seleccionar categoría...</option>
                                    @foreach ($categoria as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cod" class="font-weight-medium">Código del Producto</label>
                                <input type="text" name="cod" id="cod" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nombre" class="font-weight-medium">Nombre del Producto</label>
                                <input type="text" name="nombre" id="nombre" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="color" class="font-weight-medium">Color</label>
                                <input type="text" name="color" id="color" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="descripcion" class="font-weight-medium">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="costoCompra" class="font-weight-medium">Costo de la Compra</label>
                                <input type="number" name="costoCompra" id="costoCompra" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="costoPromedio" class="font-weight-medium">Costo Promedio</label>
                                <input type="number" name="costoPromedio" id="costoPromedio" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="grosor" class="font-weight-medium">Grosor</label>
                                <input type="text" name="grosor" id="grosor" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="material" class="font-weight-medium">Material</label>
                                <input type="text" name="material" id="material" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="medida" class="font-weight-medium">Medida</label>
                                <input type="text" name="medida" id="medida" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="precioVenta" class="font-weight-medium">Precio de Venta</label>
                                <input type="number" name="precioVenta" id="precioVenta" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="imagen_url" class="font-weight-medium">Imagen</label>
                                <input type="file" name="imagen_url" id="imagen_url" required class="form-control">
                            </div>
                        </div>

                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-primary">Crear Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Productos</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Categoría</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Color</th>                                   
                    <th>Descripción</th>
                    <th>Costo de Compra</th>
                    <th>Costo Promedio</th>
                    <th>Grosor</th>
                    <th>Material</th>
                    <th>Medida</th>
                    <th>Precio de Venta</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($producto as $productos)
                <tr>
                    <td>{{ $productos->categoria->nombre }}</td> 
                    <td>{{ $productos->cod }}</td>
                    <td>{{ $productos->nombre }}</td>
                    <td>{{ $productos->color }}</td>  
                    <td>{{ $productos->descripcion }}</td>                                                          
                    <td>{{ $productos->costoCompra }}</td>
                    <td>{{ $productos->costoPromedio }}</td>
                    <td>{{ $productos->grosor }}</td>
                    <td>{{ $productos->material }}</td> 
                    <td>{{ $productos->medida }}</td>
                    <td>{{ $productos->precioVenta }}</td>  
                    <td><img style="width: 100px; height: 100px;" src="/imagen/{{ $productos->imagen_url }}" alt="Imagen del producto"></td>
                    <td>
                        <a href="{{ url('editar_producto', $productos->id) }}" class="btn btn-link text-primary">Editar</a>                        
                        <a href="{{ url('borrar_producto', $productos->id) }}" class="btn btn-link text-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
