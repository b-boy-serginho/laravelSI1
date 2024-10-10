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

                    <form action="{{ url('/editar_horario', $horarios->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="horainicio" class="block text-sm font-medium text-gray-700">Hora de Inicio</label>
                                <input type="number" name="horainicio" id="horainicio" 
                                required min="0" max="23" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                placeholder="HH">
                            </div>
                            <div>
                                <label for="horafinal" class="block text-sm font-medium text-gray-700">Hora Final</label>
                                <input type="number" name="horafinal" id="horafinal"
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