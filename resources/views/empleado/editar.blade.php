<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (session('mensaje'))
                        <div class="bg-green-500 text-white p-3 rounded">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ url('/editar_empleado', $empleados->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">

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
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar Empleado</button>
                            <a href="/ver_empleado" class="bg-green-500 text-black px-4 py-2 rounded">Regresar</a>
                        </div>

                        <div class="mt-4">                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>