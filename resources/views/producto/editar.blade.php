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

                    <form action="{{ url('/editarProducto', $producto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') <!-- Aseguramos que sea una actualización --> --}}

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Categoría -->
                            <div>
                                <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                                <select name="categoria_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="{{ $producto->categoria_id }}" selected>{{ $producto->categoria->nombre }}</option>
                                    @foreach ($categoria as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Código del Producto -->
                            <div>
                                <label for="cod" class="block text-sm font-medium text-gray-700">Código del Producto</label>
                                <input value="{{ old('cod', $producto->cod) }}" type="text" name="cod" id="cod" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Nombre del Producto -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                                <input value="{{ old('nombre', $producto->nombre) }}" type="text" name="nombre" id="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Color -->
                            <div>
                                <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                                <input value="{{ old('color', $producto->color) }}" type="text" name="color" id="color" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Descripción -->
                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                                <input value="{{ old('descripcion', $producto->descripcion) }}" type="text" name="descripcion" id="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Costo de Compra -->
                            <div>
                                <label for="costoCompra" class="block text-sm font-medium text-gray-700">Costo de la Compra</label>
                                <input value="{{ old('costoCompra', $producto->costoCompra) }}" type="number" name="costoCompra" id="costoCompra" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Costo Promedio -->
                            <div>
                                <label for="costoPromedio" class="block text-sm font-medium text-gray-700">Costo Promedio</label>
                                <input value="{{ old('costoPromedio', $producto->costoPromedio) }}" type="number" name="costoPromedio" id="costoPromedio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Grosor -->
                            <div>
                                <label for="grosor" class="block text-sm font-medium text-gray-700">Grosor</label>
                                <input value="{{ old('grosor', $producto->grosor) }}" type="text" name="grosor" id="grosor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Material -->
                            <div>
                                <label for="material" class="block text-sm font-medium text-gray-700">Material</label>
                                <input value="{{ old('material', $producto->material) }}" type="text" name="material" id="material" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Medida -->
                            <div>
                                <label for="medida" class="block text-sm font-medium text-gray-700">Medida</label>
                                <input value="{{ old('medida', $producto->medida) }}" type="text" name="medida" id="medida" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Precio de Venta -->
                            <div>
                                <label for="precioVenta" class="block text-sm font-medium text-gray-700">Precio de Venta</label>
                                <input value="{{ old('precioVenta', $producto->precioVenta) }}" type="number" name="precioVenta" id="precioVenta" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Precio de Descuento -->
                            <div>
                                <label for="precioDescuento" class="block text-sm font-medium text-gray-700">Precio de Descuento</label>
                                <input value="{{ old('precioDescuento', $producto->precioDescuento) }}" type="number" name="precioDescuento" id="precioDescuento" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Cantidad -->
                            <div>
                                <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                                <input value="{{ old('cantidad', $producto->cantidad) }}" type="number" name="cantidad" id="cantidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Imagen Actual -->
                            <div>
                                <label for="imagen_url" class="block text-sm font-medium text-gray-700">Imagen Actual</label>
                                <img src="/imagen/{{ $producto->imagen_url }}" alt="Imagen del producto" class="mx-auto" height="200" width="200">
                            </div>

                            <!-- Cambiar Imagen -->
                            <div>
                                <label for="imagen_url" class="block text-sm font-medium text-gray-700">Cambiar Imagen</label>
                                <input type="file" name="imagen_url" id="imagen_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Producto</button>
                            <a href="/ver_producto" class="bg-green-500 text-white px-4 py-2 rounded">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
