@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1 class="text-center text-primary">Lista de Usuarios</h1>
@stop

@section('content')



    <div class="container py-5">

        {{-- <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        
                        @if (session('mensaje'))
                            <div class="alert alert-success text-center">
                                {{ session('mensaje') }}
                            </div>
                        @endif
    
                        <h1 class="h4 font-weight-bold text-secondary mb-4">
                            Formulario de permiso
                        </h1>
    
                        <form action="{{ url('/crear_permiso') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nombre" class="font-weight-medium">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" 
                                           required class="form-control" 
                                           placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="horaFinal" class="font-weight-medium">Hora Final</label>
                                    <input type="time" name="horaFinal" id="horaFinal" 
                                           required class="form-control" 
                                           placeholder="HH">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dia" class="font-weight-medium">Días</label>
                                    <input type="text" name="dia" id="dia" required
                                           class="form-control" 
                                           placeholder="Ej: Lunes, Martes">
                                </div>
                            </div>
    
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Crear </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">

                
                <h2 class="h5 font-weight-bold mb-0">Permisos</h2>
            </div>
            <div class="card-body">
              
                <div style="padding-bottom: 30px;">
                   
                </div>
                
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Nombre</th>
                                {{-- <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Fecha de Creacion</th> --}}
                                {{-- <th>Acciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permiso as $per)
                               
                         
                                <tr>
                                    <td>{{ $per->name}}</td>
                                     {{-- <td>
                                        <a href="" class="btn btn-link text-primary">Editar</a>
                                    </td> --}}
                                     {{--   
                                        <a href="{{ url('borrar_usuario', $user->id) }}" 
                                           class="btn btn-link text-danger" 
                                           onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</a>
                                    </td> --}}
                                </tr>
                               
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
