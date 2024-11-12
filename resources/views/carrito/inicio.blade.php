<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Floral</title>

    <link rel="stylesheet" href="{{ asset('inicio/estilos.css') }}">
    <style>
        /* Sección de producto */
        .product-section {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .product-card {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 600px;
            width: 100%;
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .img-box img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .product-details h5 {
            font-size: 2rem;
            margin: 15px 0;
            /* color: #8e44ad; */
        }

        .product-details h6 {
            font-size: 1.5rem;
            margin: 10px 0;
            /* color: #8e44ad; */
        }

        .discount-price {
            color: blue;
            font-weight: bold;
        }

        .original-price {
            color: red;
            text-decoration: line-through;
            font-size: 1.3rem;
        }

        .normal-price {
            color: green;
            font-weight: bold;
        }

        .product-details h6.category,
        .product-details h6.description,
        .product-details h6.quantity {
            font-size: 1.2rem;
            color: #555;
        }

        .cart-form {
            margin-top: 30px;
        }

        .cart-form input[type="number"] {
            width: 80px;
            padding: 10px;
            font-size: 1.2rem;
            margin-right: 20px;
        }

        .cart-form input[type="submit"] {
            padding: 15px 30px;
            background-color: #8e44ad;
            color: #fff;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .cart-form input[type="submit"]:hover {
            background-color: #733e90;
        }

        /* Estilos para la tabla */
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 10%;
            margin-right: 10%;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .th_deg {
            background-color: indigo;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #eafaf1;
        }

        /* Estilos para la imagen en la tabla */
        .img_deg {
            width: 80px;
            height: auto;
            border-radius: 8px;
        }

        /* Estilos para el botón */
        .btn-danger {
            padding: 8px 12px;
            color: #fff;
            background-color: #e74c3c;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* Estilos para el total */
        .total_dg {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
    </style>


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
        <div class="alert alert-success text-center">
            {{ session('mensaje') }}
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
                        Eliminar producto
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
        <a class="boton-tarjeta" href="{{url('stripe', $totalAPagar)}}">Pagar con Tarjeta</a>
    </div>
    

    <!-- Footer -->
    {{-- <footer>
        <p>&copy; {{ date('Y') }} Tienda Floral. Todos los derechos reservados.</p>
    </footer> --}}

</body>

</html>
