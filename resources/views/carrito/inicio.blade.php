<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Floral</title>

    <link rel="stylesheet" href="{{ asset('inicio/carrito.css') }}">



</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="#">Tienda Floral</a>
        <div>

            <!-- Verificar si el usuario está autenticado -->
            @if (Auth::check())
                <span>Bienvenido, {{ Auth::user()->name }}</span>

                <a href="/">Productos</a>
                <a href="/ver_carrito">Ver Carrito</a>
                <a href="#contacto">Contacto</a>

                <!-- Enlace para cerrar sesión -->
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar Sesión
                </a>

                <!-- Formulario oculto para el cierre de sesión -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- Enlace de inicio de sesión si el usuario no está autenticado -->
                <a href="/login">Iniciar Sesión</a>
                <a href="/">Productos</a>
                <a href="#contacto">Contacto</a>
            @endif



        </div>
    </nav>

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    

    <table>
        <tr>
            <th class="th_deg">Título</th>
            <th class="th_deg">Cantidad</th>
            <th class="th_deg">Precio</th>
            <th class="th_deg">importe</th>
            <th class="th_deg">Imagen</th>
            <th class="th_deg">Acción</th>
        </tr>


        <?php $totalAPagar = 0; ?>
        @foreach ($carrito as $cart)
            <tr>
                <td>{{ $cart->nombreProducto }}</td>
                <td>{{ $cart->cantidad }}</td>
                <td>{{ $cart->precioVenta }} Bs</td>
                <td>{{ $cart->importe }} Bs</td>

                <td>
                    <img class="img_deg" src="/imagen/{{ $cart->imagen_url }}" alt="">
                </td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('¿Estás seguro?')"
                        href="{{ url('eliminar_carrito', $cart->id) }}">
                        eliminar
                    </a>
                </td>
            </tr>
            <?php $totalAPagar += $cart->importe; ?>
        @endforeach
    </table>

    <div class="total_dg">
        Precio Total: {{ $totalAPagar }} Bs
    </div>


    <h1 class="pedido-titulo">Proceder al Pedido</h1>

    <div class="boton-container">
        <a class="boton-pedido" href="/ver_pedido" onclick="return confirm('¿Estás seguro?')">Realizar Pedido</a>
        <a class="boton-tarjeta" href="{{ url('stripe', $totalAPagar) }}">Pagar con Tarjeta</a>
    </div>


    <!-- Footer -->
    {{-- <footer>
        <p>&copy; {{ date('Y') }} Tienda Floral. Todos los derechos reservados.</p>
    </footer> --}}

</body>

</html>
