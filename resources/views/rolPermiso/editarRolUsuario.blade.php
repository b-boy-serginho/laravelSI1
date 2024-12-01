@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1 class="text-center text-primary">Lista de roles</h1>
@stop

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    
                    @if (session('mensaje'))
                        <div class="alert alert-success text-center">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <h1 class="h4 font-weight-bold text-secondary mb-4">
                        Formulario de roles                       
                    </h1>

                    
                    <form action="{{ route('editar_rol_user', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Indicamos que este es un formulario PUT -->
                    
                        @foreach($roles as $rol)
                            <div>
                                <label for="roles_{{ $rol->id }}">
                                    <input type="checkbox" name="roles[]" value="{{ $rol->id }}" 
                                        {{ $usuario->hasRole($rol->name) ? 'checked' : '' }} 
                                        class="mr-1" id="roles_{{ $rol->id }}">
                                    {{ $rol->name }}
                                </label>
                            </div>
                        @endforeach
                    
                        <button type="submit">Asignar rol</button>
                    </form>
                    
                    
                                       

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">

            
            <h2 class="h5 font-weight-bold mb-0">Roles</h2>
        </div>
        <div class="card-body">
          
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
                    <tbody> --}}
                        {{-- @foreach ($permiso as $per) --}}
                           
                     
                            {{-- <tr> --}}
                                {{-- <td>{{ $per->name}}</td> --}}
                                {{-- <td>
                                    <a href="{{ url('editar_usuario', $user->id) }}" class="btn btn-link text-primary">Editar</a>
                                
                                    
                                    <a href="{{ url('borrar_usuario', $user->id) }}" 
                                       class="btn btn-link text-danger" 
                                       onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</a>
                                </td> --}}
                            {{-- </tr> --}}
                           
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@stop
