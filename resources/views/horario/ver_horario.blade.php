<x-app-layout>


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        .table-container {
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        thead {
            background-color: #3498db;
            color: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e0e0e0;
        }

        .message {
            background-color: #27ae60;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .mt-4 {
            margin-top: 20px;
            text-align: center;
        }

        a {
            color: red;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px; /* Ajusta este valor según el tamaño que desees */
        }

        a:hover {
            text-decoration: underline;
        }

    </style>

<div class="mt-4">
    <a href="{{ route('dashboard') }}">Regresar</a>
</div>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (session('mensaje'))
                        <div class="bg-green-500 text-white p-3 rounded">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ url('/crear_horario') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="horainicio" class="block text-sm font-medium text-gray-700">Hora de Inicio</label>
                                <input type="time" name="horainicio" id="horainicio" 
                                required min="0" max="23" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                placeholder="HH">
                            </div>
                            <div>
                                <label for="horafinal" class="block text-sm font-medium text-gray-700">Hora Final</label>
                                <input type="time" name="horafinal" id="horafinal"
                                 required min="0" max="23" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                 placeholder="HH">
                            </div>
                            <div>
                                <label for="dias" class="block text-sm font-medium text-gray-700">Días</label>
                                <input type="text" name="dias" id="dias" required
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
                    <td>{{ $hora->horainicio }}:00</td>
                    <td>{{ $hora->horafinal }}:00</td>
                    <td>{{ $hora->dias }}</td>
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
                        <div class="bg-green-500 text-white p-3 rounded">
                            {{ session('sms') }}
                        </div>
                    @endif

                    <form action="{{ url('/crear_empleado') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="ci" class="block text-sm font-medium text-gray-700">CI</label>
                                <input type="number" name="ci" id="ci" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cédula de Identidad">
                            </div>
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Nombre del empleado">
                            </div>
                            <div>
                                <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>                              
                                <select name="sexo" id="sexo" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div>
                                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                                <input type="number" name="telefono" id="telefono" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Número de teléfono">
                            </div>
                            <div>
                                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                                <input type="text" name="direccion" id="direccion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Dirección del empleado">
                            </div>
                            <div>
                                <label for="fechacontratacion" class="block text-sm font-medium text-gray-700">Fecha de Contratación</label>
                                <input type="date" name="fechacontratacion" id="fechacontratacion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
                                <input type="text" name="cargo" id="cargo" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del empleado">
                            </div>
                            <div>
                                <label for="idhorario" class="block text-sm font-medium text-gray-700">Horario</label>
                                <select class="text_color" name="idhorario" required>
                                    <option value="" selected>Seleccionar horario...</option>
                                    @foreach ($horarios as $hora)
                                        <option value="{{ $hora->id }}">{{ $hora->horainicio }} - {{ $hora->horafinal }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Crear Empleado</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

   

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Telefono</th>
                    <th>Direccion</th>                   
                    <th>Cargo</th>
                    <th>Fecha de Contratacion</th>
                    <th>Horario Asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->ci }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->sexo }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->direccion }}</td>                    
                    <td>{{ $empleado->cargo }}</td>
                    <td>{{ $empleado->Fechacontratacion }}</td>
                    <td>{{ $empleado->horario->horainicio }}-{{ $empleado->horario->horafinal }}</td>
                    <td>
                    
                        <a style="color: green" 
                            href="{{url('editar_empl', $empleado->id)}}">editar
                        </a>                        
                    
                        <a style="color: red"  onclick="return confirm('estas seguro')"
                            href="{{url('borrar_empleado', $empleado->id)}}">eliminar
                        </a>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ route('dashboard') }}">Regresar</a>
    </div>

</x-app-layout>
