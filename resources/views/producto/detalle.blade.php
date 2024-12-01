<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Floral</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('inicio/detalle.css') }}">

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

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
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
                        <input onclick="return confirm('¿quieres agregar al carrito?')" type="submit"
                            value="Añadir al carrito">
                    </form>
                    <br>

                    <div class="button-container">
                        <a class="add-to-cart mr-3" href="{{ url('/') }}">Regresar</a>
                        <a class="add-to-cart" style="background-color: rgb(79, 162, 79)"
                            href="{{ url('/ver_carrito') }}">Ver carrito</a>
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
