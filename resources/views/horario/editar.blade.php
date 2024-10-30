<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (session('sms'))
                        <div class="bg-green-green text-white p-3 rounded">
                            {{ session('sms') }}
                        </div>
                    @endif

                    <form action="{{ url('/editar_horario', $horarios->id) }}" method="POST">
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
                            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar Horario</button>
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