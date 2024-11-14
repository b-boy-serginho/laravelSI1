@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1 class="text-center text-primary">Lista de Usuarios</h1>
@stop

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">

                
                <h2 class="h5 font-weight-bold mb-0">Usuarios</h2>
            </div>
            <div class="card-body">
                @if (session('mensaje'))
                    <div class="alert alert-success text-center">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <div style="padding-bottom: 30px;">
                   
                </div>
                
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Nombre</th>                                
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $user)                              
                         
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="{{ url('editar_usuario', $user->id) }}" class="btn btn-link text-primary">Editar</a>
                                    
                                        
                                        {{-- <a href="{{ url('borrar_usuario', $user->id) }}" 
                                           class="btn btn-link text-danger" 
                                           onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</a> --}}
                                    </td>
                                </tr>
                               
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
