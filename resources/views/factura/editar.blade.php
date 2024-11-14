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

                    <form action="{{ url('/editarFactura', $factura->id) }}" method="POST">
                        @csrf
                        {{-- @method('PUT') <!-- Para asegurarse de que la solicitud sea PUT y se actualice --> --}}

                        <div class="mb-4">
                            <label for="proveedor_id" class="block text-sm font-medium text-gray-700">Proveedor</label>
                            <select name="proveedor_id" required class="text_color w-full mt-1 block border-gray-300 rounded-md shadow-sm">
                                <option value="" selected>Seleccionar proveedor...</option>
                                @foreach ($proveedor as $prov)
                                    <option value="{{ $prov->id }}" {{ $prov->id == $factura->proveedor_id ? 'selected' : '' }}>
                                        {{ $prov->id }} ... {{ $prov->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                            <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $factura->fecha) }}" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="importe" class="block text-sm font-medium text-gray-700">Importe</label>
                            <input type="number" min="0" name="importe" id="importe" value="{{ old('importe', $factura->importe) }}" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Precio total">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Factura</button>
                            <a href="/ver_factura" class="bg-green-500 text-white px-4 py-2 rounded">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
