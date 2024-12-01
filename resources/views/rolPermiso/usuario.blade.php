@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1 class="text-center text-primary">Lista de Usuarios</h1>
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

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
    
                      <h1 class="h4 font-weight-bold text-secondary mb-4">
                            Formulario de usuarios
                        </h1> 
    
                        <form action="{{ url('/crear_usuario') }}" method="POST">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="id" class="font-weight-medium">ID</label>
                                    <input type="number" min="1" name="id" id="id" 
                                           required class="form-control" value=""
                                           placeholder="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name" class="font-weight-medium">Nombre de usuario</label>
                                    <input type="text" name="name" id="name" value="" 
                                           required class="form-control" 
                                           placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="font-weight-medium">Correo Electronico</label>
                                    <input type="email" name="email" id="email" value=""
                                           required class="form-control" 
                                           placeholder="cornelio@gmail.com">
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="password" class="font-weight-medium">Contraseña</label>
                                    <input type="text" name="password" id="password" required value=""
                                           class="form-control" 
                                           placeholder="">
                                </div> 
                             </div>
    
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Crear Usuario</button>
                            </div>

                            
                        </form>

                        <form action="{{ route('usuario_excel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="archivo">Selecciona un archivo Excel</label>
                                <input type="file" name="archivo" id="archivo" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Importar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 



        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">

                
                <h2 class="h5 font-weight-bold mb-0">Usuarios</h2>
            </div>
            <div class="card-body">
                
                <div style="padding-bottom: 30px;">
                   
                </div>
                
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo Electrónico</th>
                                <th>Roles</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <!-- Mostrar los roles -->
                                        @if ($user->roles->isNotEmpty())                                            
                                                @foreach ($user->roles as $role)
                                                   <p style="text-align: center">{{$role->name}}</p>
                                                @endforeach                                            
                                        @else
                                            <p style="text-align: center">Cliente</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('editar_usuario_rol', $user->id) }}" class="btn btn-link text-primary">Editar</a>
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
