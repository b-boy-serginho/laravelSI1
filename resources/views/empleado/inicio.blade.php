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

                    <h1 class="h4 font-weight-bold text-secondary mb-4">Formulario de Empleado</h1>
                    
                    <form action="{{ url('/crear_empleado') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="idUsuario" class="font-weight-medium">Empleado</label>
                                <select class="form-control" name="idUsuario" required>
                                    <option value="" selected>Seleccionar empleado...</option>
                                    @foreach ($usuarios as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fechaContratacion" class="font-weight-medium">Fecha de Contratación</label>
                                <input type="date" name="fechaContratacion" id="fechaContratacion" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ci" class="font-weight-medium">CI</label>
                                <input type="number" name="ci" id="ci" required class="form-control" placeholder="CI del empleado">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="font-weight-medium">Nombre del Empleado</label>
                                <select class="form-control" name="name" required>
                                    <option value="" selected>Seleccionar empleado...</option>
                                    @foreach ($usuarios as $user)
                                        <option value="{{ $user->name }}">{{ $user->id }} - {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sexo" class="font-weight-medium">Sexo</label>
                                <select name="sexo" id="sexo" required class="form-control">
                                    <option value="" selected>Seleccionar sexo...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cargo" class="font-weight-medium">Cargo</label>
                                <input type="text" name="cargo" id="cargo" required class="form-control" placeholder="Cargo del empleado">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="idHorario" class="font-weight-medium">Horario</label>
                                <select class="form-control" name="idHorario" required>
                                    <option value="" selected>Seleccionar horario...</option>
                                    @foreach ($horarios as $hora)
                                        <option value="{{ $hora->id }}">{{ $hora->horaInicio }} - {{ $hora->horaFinal }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Crear Empleado</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Empleados</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>CI</th>
                    <th>Nombre del Empleado</th>                                   
                    <th>Sexo</th>
                    <th>Cargo</th>
                    <th>Fecha de Contratación</th>
                    <th>Horario Asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->idUsuario }}</td> 
                    <td>{{ $empleado->ci }}</td>
                    <td>{{ $empleado->name }}</td>  
                    <td>{{ $empleado->sexo }}</td>                                                          
                    <td>{{ $empleado->cargo }}</td>
                    <td>{{ $empleado->fechaContratacion }}</td>
                    <td>{{ $empleado->horario->horaInicio }} - {{ $empleado->horario->horaFinal }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ url('editar_empl', $empleado->id) }}" class="btn btn-link text-primary">Editar</a>                        
                        <a href="{{ url('borrar_empleado', $empleado->id) }}" class="btn btn-link text-danger" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
