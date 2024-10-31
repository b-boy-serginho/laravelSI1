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

                    <form action="{{ url('/editarCategoria', $categoria->id) }}" method="POST">
                        @csrf
                                <div>
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la categoria</label>
                                    <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del empleado">
                                </div>
                                <br>
                                <div>
                                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                    <input type="text" name="descripcion" id="descripcion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del empleado">
                                </div>

                                <div class="mt-4" style="margin-top: 20px; padding: 10px;">
                                    <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar Categoria</button>
                                    <a href="/ver_categoria" class="bg-green-500 text-black px-4 py-2 rounded">Regresar</a>
                                </div>

                        <div class="mt-4">                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>