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

                    <form action="{{ url('/editarDetalle', $detalle->id) }}" method="POST">
                        @csrf
                        {{-- @method('PUT') <!-- Asegúrate de que sea un PUT para actualizar --> --}}

                        <div class="mb-4">
                            <label for="proveedor_id" class="block text-sm font-medium text-gray-700">Proveedor</label>
                            <select name="proveedor_id" required class="text_color w-full mt-1 block border-gray-300 rounded-md shadow-sm">
                                <option value="" selected>Seleccionar proveedor...</option>
                                @foreach ($proveedor as $prov)
                                    <option value="{{ $prov->id }}" {{ $prov->id == $detalle->proveedor_id ? 'selected' : '' }}>
                                        {{ $prov->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="producto_id" class="block text-sm font-medium text-gray-700">Producto</label>
                            <select name="producto_id" required class="text_color w-full mt-1 block border-gray-300 rounded-md shadow-sm">
                                <option value="" selected>Seleccionar producto...</option>
                                @foreach ($producto as $prod)
                                    <option value="{{ $prod->id }}" {{ $prod->id == $detalle->producto_id ? 'selected' : '' }}>
                                        {{ $prod->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $detalle->cantidad) }}" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="">
                        </div>

                        <div class="mb-4">
                            <label for="costoUnitario" class="block text-sm font-medium text-gray-700">Costo Unitario</label>
                            <input type="number" name="costoUnitario" id="costoUnitario" value="{{ old('costoUnitario', $detalle->costoUnitario) }}" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="">
                        </div>

                        <div class="mt-4" style="margin-top: 20px; padding: 10px;">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar detalle</button>
                            <a href="/ver_detalle" class="bg-green-500 text-white px-4 py-2 rounded">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
