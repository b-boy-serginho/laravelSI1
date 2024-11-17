<form action="{{ url('/crear_usuario') }}" method="POST">
    @csrf  <!-- Este es el token CSRF necesario -->
    <label for="nombre" class="font-weight-medium">nombre</label>
    <input type="text" name="nombre" id="nombre" required class="form-control">

    <label for="correo" class="font-weight-medium">correo</label>
    <input type="email" name="correo" id="correo" required class="form-control">

    <label for="telefono" class="font-weight-medium">telefono</label>
    <input type="number" name="telefono" id="telefono" required class="form-control">

    <label for="fecha" class="font-weight-medium">fecha</label>
    <input type="datetime-local" name="fecha" id="fecha" required class="form-control">

    <div class="text-right mt-4">
        <button type="submit" class="btn btn-success">guardar</button>
    </div>
</form>



                 <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>nombre</th>
                                    <th>correo</th>
                                    <th>telefono</th>
                                    <th>fecha</th>

                                </tr>
                            </thead>
                            <tbody>
                         @foreach($api as $a)
                                <tr>
                                    <td>{{ $a->nombre }}</td>
                                    <td>{{ $a->correo }}</td>
                                    <td>{{ $a->telefono }}</td>
                                    <td>{{ $a->fecha }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
