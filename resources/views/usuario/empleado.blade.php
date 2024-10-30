@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
<style>
    /* Estilo General */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f7f9fc;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    /* Contenedor de la Tabla */
    .table-container {
        max-width: 1200px;
        margin: 0 auto;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        background-color: white;
    }

    /* Estilo de la Tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
    }

    thead {
        background-color: #3498db;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
    }

    th, td {
        padding: 15px 10px;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f4f7;
    }

    tbody tr:hover {
        background-color: #e9f2fa;
    }

    /* Mensaje de Éxito */
    .message {
        background-color: #27ae60;
        color: white;
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 15px;
        text-align: center;
        font-weight: bold;
    }

    /* Botones y Enlaces */
    .mt-4 {
        margin-top: 20px;
        text-align: center;
    }

    a {
        color: #3498db;
        font-weight: 600;
        text-decoration: none;
        font-size: 18px;
    }

    a:hover {
        color: #21618c;
        text-decoration: underline;
    }

    button {
        background-color: black;
        color: #fff;
        border: none;
        padding: 12px 18px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        background-color: #21618c;
    }

    /* Formulario */
    label {
        font-weight: 600;
        color: #4a5568;
    }

    input, select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #dcdcdc;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
    }

    /* Bordes de formulario */
    input:focus, select:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
    }
</style>

@stop

@section('content')
    <!-- <div class="mt-4">
        <a href="{{ route('dashboard') }}">Regresar</a>
    </div> -->

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        @if (session('message'))
                            <div class="message">
                                {{ session('message') }}
                            </div>
                        @endif

                        <h1>
                            Formulario de horario
                        </h1>
                        <form action="{{ url('/crear_horario') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label for="horaInicio" class="block text-sm font-medium text-gray-700">Hora de Inicio</label>
                                    <input type="time" name="horaInicio" id="horaInicio" 
                                    required min="0" max="23" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                    placeholder="HH">
                                </div>
                                <div>
                                    <label for="horaFinal" class="block text-sm font-medium text-gray-700">Hora Final</label>
                                    <input type="time" name="horaFinal" id="horaFinal"
                                    required min="0" max="23" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                    placeholder="HH">
                                </div>
                                <div>
                                    <label for="dia" class="block text-sm font-medium text-gray-700">Días</label>
                                    <input type="text" name="dia" id="dia" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                    placeholder="Ej: Lunes, Martes">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Crear Horario</button>
                            </div>
                            <div class="mt-4">                            
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <h1 style="margin-top: 20px; padding: 10px;">
            Lista de Horarios
        </h1>


        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hora Inicio</th>
                        <th>Hora Final</th>
                        <th>Días</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
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
                            <a style="color: green" 
                                href="{{url('editar', $hora->id)}}">editar
                            </a>                        
                        </td>
                        <td>
                            <a style="color: red"  onclick="return confirm('estas seguro')"
                                href="{{url('borrar_horario', $hora->id)}}">eliminar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        @if (session('sms'))
                            <div class="message">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        <h1 style="text-align: center; margin-top: 80px; padding: 20px;">
                            Formulario de Empleado 
                        </h1>
                        <form action="{{ url('/crear_empleado') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                
                                <div>
                                    <label for="idUsuario" class="block text-sm font-medium text-gray-700">Empleado</label>
                                    <select class="text_color" name="idUsuario" required>
                                        <option value="" selected>Seleccionar empleado...</option>
                                        @foreach ($usuarios as $user)
                                            <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div> 
                                    <label for="fechaContratacion" class="block text-sm font-medium text-gray-700">Fecha de Contratación</label>
                                    <input type="date" name="fechaContratacion" id="fechaContratacion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>

                                <div>
                                    <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
                                    <input type="text" name="cargo" id="cargo" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del empleado">
                                </div>

                                <div>
                                    <label for="idHorario" class="block text-sm font-medium text-gray-700">Horario</label>
                                    <select class="text_color" name="idHorario" required>
                                        <option value="" selected>Seleccionar horario...</option>
                                        @foreach ($horarios as $hora)
                                            <option value="{{ $hora->id }}">{{ $hora->horaInicio }} - {{ $hora->horaFinal }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="mt-4" style="margin-top: 20px; padding: 10px;">
                                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Crear Empleado</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 


        <h1 style="text-align: center; margin-top: 30px; padding: 10px; ">
            Lista de Empleados
        </h1>


        <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Nombre del empleado</th>                                   
                    <th>Cargo</th>
                    <th>Fecha de Contratacion</th>
                    <th>Horario Asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                <td>{{ $empleado->id}}</td> 
                    <td>{{ $empleado->idUsuario}}</td> 
                    <td>{{ $empleado->usuario->name}}</td>                                      
                    <td>{{ $empleado->cargo }}</td>
                    <td>{{ $empleado->fechaContratacion }}</td>
                    <td>{{ $empleado->horario->horaInicio }}-{{ $empleado->horario->horaFinal }}</td>
                    <td>
                    
                    <a style="color: green" href="{{ url('editar_empl', $empleado->id) }}">editar</a>                        
                    <a style="color: red" onclick="return confirm('¿Estás seguro?')" href="{{ url('borrar_empleado', $empleado->id) }}">eliminar</a>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- <div class="mt-4">
        <a href="{{ route('dashboard') }}">Regresar</a>
    </div> -->

@stop
