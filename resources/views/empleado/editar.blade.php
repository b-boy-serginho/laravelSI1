<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if (session('mensaje'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Editar Empleado</h2>

                    <form action="{{ url('/editar_empleado', $empleado->id) }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="nombre" class="block text-gray-700 font-medium">Nombre del empleado</label>
                                <input type="text" name="nombre" id="nombre" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Nombre del empleado" value="{{ $empleado->nombre }}">
                            </div>

                            <div class="form-group">
                                <label for="idUsuario" class="block text-gray-700 font-medium">Usuario</label>
                                <select name="idUsuario" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="" disabled selected>Seleccionar correo...</option>
                                    @foreach ($usuarios as $user)
                                        <option value="{{ $user->id }}" @if($empleado->idUsuario == $user->id) selected @endif>
                                            {{ $user->name }} - {{ $user->email }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ci" class="block text-gray-700 font-medium">CI</label>
                                <input type="number" name="ci" min="1" id="ci" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="CI del empleado" value="{{ $empleado->ci }}">
                            </div>

                            <div class="form-group">
                                <label for="fechaContratacion" class="block text-gray-700 font-medium">Fecha de Contratación</label>
                                <input type="datetime-local" name="fechaContratacion" id="fechaContratacion" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    value="{{ $empleado->fechaContratacion }}">
                            </div>

                            <div class="form-group">
                                <label for="sexo" class="block text-gray-700 font-medium">Sexo</label>
                                <select name="sexo" id="sexo" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="" disabled selected>Seleccionar sexo...</option>
                                    <option value="M" @if($empleado->sexo == 'M') selected @endif>Masculino</option>
                                    <option value="F" @if($empleado->sexo == 'F') selected @endif>Femenino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cargo" class="block text-gray-700 font-medium">Cargo</label>
                                <input type="text" name="cargo" id="cargo" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Cargo del empleado" value="{{ $empleado->cargo }}">
                            </div>

                            <div class="form-group">
                                <label for="idHorario" class="block text-gray-700 font-medium">Horario</label>
                                <select name="idHorario" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="" disabled selected>Seleccionar horario...</option>
                                    @foreach ($horarios as $hora)
                                        <option value="{{ $hora->id }}" @if($empleado->idHorario == $hora->id) selected @endif>
                                            {{ $hora->horaInicio }} - {{ $hora->horaFinal }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                                Actualizar Empleado
                            </button>
                            <a href="/ver_empleado" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-600">
                                Regresar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
