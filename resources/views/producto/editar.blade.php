<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (session('mensaje'))
                        <div class="bg-green-green text-white p-3 rounded">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ url('/editarProducto', $producto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="grid grid-cols-2 gap-4">
                                
                                <div>
                                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                                    <select class="text_color" name="categoria_id" required>
                                        <option value="" selected>Seleccionar categoria...</option>
                                        @foreach ($categoria as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div> 
                                    <label for="cod" class="block text-sm font-medium text-gray-700">Codigo del Producto</label>
                                    <input type="text" name="cod" id="cod" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>

                                <div> 
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                                    <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>

                                <div>
                                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                                    <input type="text" name="color" id="color" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>                             

                                <div>
                                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                    <input type="text" name="descripcion" id="descripcion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="costoCompra" class="block text-sm font-medium text-gray-700">Costo de la compra</label>
                                    <input type="number" name="costoCompra" id="costoCompra" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="costoPromedio" class="block text-sm font-medium text-gray-700">Costo Promedio</label>
                                    <input type="number" name="costoPromedio" id="costoPromedio" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="grosor" class="block text-sm font-medium text-gray-700">Grosor</label>
                                    <input type="text" name="grosor" id="grosor" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="material" class="block text-sm font-medium text-gray-700">Material</label>
                                    <input type="text" name="material" id="material" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="medida" class="block text-sm font-medium text-gray-700">Medida</label>
                                    <input type="text" name="medida" id="medida" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="precioVenta" class="block text-sm font-medium text-gray-700">Precio de Venta</label>
                                    <input type="number" name="precioVenta" id="precioVenta" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="imagen_url" class="block text-sm font-medium text-gray-700">Imagen</label>
                                    <input type="file" name="imagen_url" id="imagen_url" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                            </div>

                            <div class="mt-4" style="margin-top: 20px; padding: 10px;">
                                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar Producto</button>
                                <a href="/ver_producto" class="bg-green-500 text-black px-4 py-2 rounded">Regresar</a>

                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    
</x-app-layout>