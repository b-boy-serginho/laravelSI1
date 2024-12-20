@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')

@stop

@section('content')

    @if (session('mensaje'))
        <div class="alert alert-success text-center">
            {{ session('mensaje') }}
        </div>
    @endif

    <h2 class="h5 font-weight-bold text-secondary mt-5">Lista de Clientes</h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    {{-- <th>HISTORIAL DE PAGOS</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($usuario as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->direccion }}</td>
                        <td>{{ $user->telefono }}</td>
                        {{-- <td class="d-flex justify-content-around">
                            <a href="{{ url('historial', $user->id) }}"
                                class="btn btn-link text-primary">VER</a>                      
                        </td>  --}}

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@stop
