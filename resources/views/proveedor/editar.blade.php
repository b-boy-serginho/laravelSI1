<x-app-layout>

<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        @if (session('mensaje'))
                            <div class="mensaje">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                       
                        <form action="{{ url('/editarProveedor', $proveedor->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                
                                
                                <div> 
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del proveedor</label>
                                    <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>

                                <div>
                                    <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto</label>
                                    <input type="text" name="contacto" id="contacto" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="numero de contacto">
                                </div>

                                <div>
                                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
                                    <input type="email" name="correo" id="correo" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del empleado">
                                </div>

                                <div>
                                    <label for="direccion" class="block text-sm font-medium text-gray-700">Direccion</label>
                                    <input type="text" name="direccion" id="direccion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del empleado">
                                </div>

                                <div>
                                    <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono</label>
                                    <input type="number" name="telefono" id="telefono" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del empleado">
                                </div>
                               

                            </div>

                            <div class="mt-4" style="margin-top: 20px; padding: 10px;">
                                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar proveedor</button>
                                <a href="/ver_proveedor" class="bg-green-500 text-black px-4 py-2 rounded"> Regresar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
</x-app-layout>
