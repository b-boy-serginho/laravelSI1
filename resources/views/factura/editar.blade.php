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

                        
                        <form action="{{ url('/editarFactura', $factura->id) }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label for="proveedor_id">Proveedor</label>
                                    <select class="text_color" name="proveedor_id" required="">
                                        <option value="" selected>Seleccionar proveedor...</option>
                                        @foreach ($proveedor as $proveedor)
                                            <option value="{{ $proveedor->id}}">{{ $proveedor->id}}
                                                ...{{ $proveedor->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                                    <input type="date" name="fecha" id="fecha"
                                    required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                    placeholder="">
                                </div>
                                <br>
                                <div>
                                    <label for="importe" class="block text-sm font-medium text-gray-700">Importe</label>
                                    <input type="number" min="0" name="importe" id="importe" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                    placeholder="Precio total">
                                </div>
                            

                            <div class="mt-4">
                                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar Factura</button>
                                <a href="/ver_factura" class="bg-green-500 text-black px-4 py-2 rounded">Regresar</a>
                            </div>
                            
                            <div class="mt-4">                            
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
