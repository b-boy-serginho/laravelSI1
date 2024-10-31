
<x-app-layout>

<div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        @if (session('message'))
                            <div class="message">
                                {{ session('message') }}
                            </div>
                        @endif

                        

                        <form action=" {{ url('/editarRol', $usuario_rol->id) }} " method="POST">
                            @csrf
                            <div class="">
                                <div class="form-group">
                                    <label for="tipo_servicio">Usuario</label>
                                    <select class="text_color" name="usuario_id" required="">
                                        <option value="" selected>Seleccionar usuario...</option>
                                        @foreach ($usuario as $user)
                                            <option value="{{ $user->id}}">{{ $user->id}}
                                                ...{{ $user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="tipo_servicio">Asignar rol</label>
                                    <select class="text_color" name="rol_id" required="">
                                        <option value="" selected>Seleccionar usuario...</option>
                                        @foreach ($rol as $rols)
                                            <option value="{{ $rols->id}}">{{ $rols->id}}
                                                ...{{ $rols->descripcion}}</option>
                                        @endforeach
                                    </select>              
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar Rol</button>
                                    <a href="/ver_rol" class="bg-green-500 text-black px-4 py-2 rounded"> Regresar</a>
                                </div>

                                
                            </div>                
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

      


        

