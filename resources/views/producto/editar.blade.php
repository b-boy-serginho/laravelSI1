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
                                    <select class="text_color" name="categoria_id" >
                                        <option value="{{$producto->categoria_id}}" selected>Seleccionar categoria...</option>
                                        @foreach ($categoria as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="cod" class="block text-sm font-medium text-gray-700">Codigo del Producto</label>
                                    <input value="{{$producto->cod}}" type="text" name="cod" id="cod"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

                                </div>

                                <div>
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                                    <input value="{{$producto->nombre}}" type="text" name="nombre" id="nombre"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>

                                <div>
                                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                                    <input value="{{$producto->color}}" type="text" name="color" id="color"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                    <input value="{{$producto->descripcion}}" type="text" name="descripcion" id="descripcion"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="costoCompra" class="block text-sm font-medium text-gray-700">Costo de la compra</label>
                                    <input value="{{$producto->costoCompra}}" type="number" name="costoCompra" id="costoCompra"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="costoPromedio" class="block text-sm font-medium text-gray-700">Costo Promedio</label>
                                    <input value="{{$producto->costoPromedio}}" type="number" name="costoPromedio" id="costoPromedio"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="grosor" class="block text-sm font-medium text-gray-700">Grosor</label>
                                    <input value="{{$producto->grosor}}" type="text" name="grosor" id="grosor"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="material" class="block text-sm font-medium text-gray-700">Material</label>
                                    <input value="{{$producto->material}}" type="text" name="material" id="material"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="medida" class="block text-sm font-medium text-gray-700">Medida</label>
                                    <input value="{{$producto->medida}}"  type="text" name="medida" id="medida"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div>
                                    <label for="precioVenta" class="block text-sm font-medium text-gray-700">Precio de Venta</label>
                                    <input value="{{$producto->precioVenta}}" type="number" name="precioVenta" id="precioVenta"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="precioDescuento" class="font-weight-medium">Precio de Descuento</label>
                                    <input value="{{$producto->precioDescuento}}" type="number" name="precioDescuento" id="precioDescuento"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>

                                 <div class="form-group col-md-6">
                                       <label for="cantidad" class="font-weight-medium">Cantidad</label>
                                       <input value="{{$producto->cantidad}" type="number" name="cantidad" id="cantidad" class="form-control">
                                 </div>

                                <div class="form-group col-md-6">
                                    <label for="imagen_url" class="font-weight-medium">Imagen Actual</label>
                                    <img style="margin:auto;" height="200" width="200"
                                    src="/imagen/{{$producto->imagen_url}}">
                                </div>


                                <div>
                                    <label for="imagen_url" class="block text-sm font-medium text-gray-700">Cambiar Imagen</label>
                                    <input value="{{$producto->imagen_url}}" type="file" name="imagen_url" id="imagen_url"  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Cargo del categoria">
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
