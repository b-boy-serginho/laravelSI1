<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if (session('sms'))
                        <div class="bg-green-500 text-white p-3 rounded mb-6">
                            {{ session('sms') }}
                        </div>
                    @endif

                    <form action="{{ url('/editar_horario', $horarios->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Hora de Inicio -->
                            <div>
                                <label for="horaInicio" class="block text-sm font-medium text-gray-700">Hora de Inicio</label>
                                <input type="time" name="horaInicio" id="horaInicio" required 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value="{{ old('horaInicio', $horarios->horaInicio) }}">
                            </div>

                            <!-- Hora Final -->
                            <div>
                                <label for="horaFinal" class="block text-sm font-medium text-gray-700">Hora Final</label>
                                <input type="time" name="horaFinal" id="horaFinal" required 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value="{{ old('horaFinal', $horarios->horaFinal) }}">
                            </div>

                            <!-- Días -->
                            <div>
                                <label for="dia" class="block text-sm font-medium text-gray-700">Días</label>
                                <input type="text" name="dia" id="dia" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value="{{ old('dia', $horarios->dia) }}"
                                    placeholder="Ej: Lunes, Martes">
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                                Actualizar Horario
                            </button>
                            <a href="/ver_horario" class="bg-green-500 text-white px-6 py-2 rounded shadow hover:bg-green-600">
                                Regresar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
