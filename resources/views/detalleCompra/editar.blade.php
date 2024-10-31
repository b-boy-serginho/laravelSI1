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

                       
                        <form action="{{ url('/editarDetalle', $detalle->id) }}" method="POST">
                            @csrf

                                    <label for="proveedor_id">Proveedor</label>
                                    <select class="text_color" name="proveedor_id" required>
                                        <option value="" selected>Seleccionar proveedor...</option>
                                        @foreach ($proveedor as $proveedor)
                                            <option value="{{ $proveedor->id}}">{{ $proveedor->nombre}} </option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <br>
                                    <label for="producto_id">Producto</label>
                                    <select class="text_color" name="producto_id" required>
                                        <option value="" selected>Seleccionar producto...</option>
                                        @foreach ($producto as $productos)
                                            <option value="{{ $productos->id}}">{{ $productos->nombre}} </option>
                                        @endforeach
                                    </select>

                                    

                                <div>
                                    <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                                    <input type="number" name="cantidad" id="cantidad" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                    placeholder="">
                                </div>

                                <div>
                                    <label for="costoUnitario" class="block text-sm font-medium text-gray-700">Costo Unitario</label>
                                    <input type="number" name="costoUnitario" id="costoUnitario" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                    placeholder="">
                                </div>

                            
                            <div class="mt-4" style="margin-top: 20px; padding: 10px;">
                                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar detalle</button>
                                <a href="/ver_detalle" class="bg-green-500 text-black px-4 py-2 rounded"> Regresar</a>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div> 
</x-app-layout>
