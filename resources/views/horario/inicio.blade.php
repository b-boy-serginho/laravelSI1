@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
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
                        Formulario de Horario
                    </h1>

                    <form action="{{ url('/crear_horario') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="horaInicio" class="font-weight-medium">Hora de Inicio</label>
                                <input type="time" name="horaInicio" id="horaInicio" 
                                       required class="form-control" 
                                       placeholder="HH">
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
                            <button type="submit" class="btn btn-primary">Crear Horario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Horarios</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Hora Inicio</th>
                    <th>Hora Final</th>
                    <th>Días</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($horarios as $hora)
                <tr>
                    <td>{{ $hora->id }}</td>
                    <td>{{ $hora->horaInicio }}:00</td>
                    <td>{{ $hora->horaFinal }}:00</td>
                    <td>{{ $hora->dia }}</td>
                    <td>
                        <a href="{{ url('editar', $hora->id) }}" class="btn btn-link text-primary">Editar</a>
                    </td>
                    <td>
                        <a href="{{ url('borrar_horario', $hora->id) }}" 
                           class="btn btn-link text-danger" 
                           onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
