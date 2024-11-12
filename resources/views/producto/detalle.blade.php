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

    <!-- Sección de Producto -->
    <section class="product-section">
        <div class="product-card">

            @if (session('mensaje'))
                <div class="alert alert-success text-center">
                    {{ session('mensaje') }}
                </div>
            @endif

            <div class="img-box">
                <img src="{{ asset('imagen/' . $producto->imagen_url) }}" alt="Imagen del producto">
            </div>
            <div class="product-details">
                <h5>{{ $producto->title }}</h5>

                @if ($producto->precioDescuento != null)
                    <h6 class="discount-price">OFERTA<br>{{ $producto->precioDescuento }} Bs</h6>
                    <h6 class="original-price">PRECIO<br>{{ $producto->precioVenta }} Bs</h6>
                @else
                    <h6 class="normal-price">PRECIO<br>{{ $producto->precioVenta }} Bs</h6>
                @endif

                <h6 class="category">Categoría: {{ $producto->categoria->nombre }}</h6>
                <h6 class="description">Descripción: {{ $producto->descripcion }}</h6>
                <h6 class="quantity">Cantidad Disponible: {{ $producto->cantidad }}</h6>

                <!-- Formulario para agregar al carrito -->
                @if (Auth::check())
                    <form class="cart-form" action="{{ url('agregar_carrito', $producto->id) }}" method="POST">
                        @csrf
                        <input type="number" name="cantidad" value="1" min="1">
                        <input onclick="return confirm('¿quieres agregar al carrito?')" type="submit" value="Añadir al carrito">
                    </form>
                    <br>

                    <div class="button-container">
                        <a class="add-to-cart mr-3" href="{{ url('/') }}">Regresar</a>
                        <a class="add-to-cart" style="background-color: rgb(79, 162, 79)" href="{{ url('/ver_carrito') }}">Ver carrito</a>                                        
                    </div>
                @endif
                
                
            </div>
        </div>
    </section>

    <!-- Footer -->
    <!-- <footer>
        <p>&copy; {{ date('Y') }} Tienda Floral. Todos los derechos reservados.</p>
    </footer>
-->
</body>

</html>