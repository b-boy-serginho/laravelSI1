<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Floral</title>
    <style>
        /* Estilos generales */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f5f0;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background-color: #8e44ad;
            color: #fff;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .navbar a:hover {
            color: #ffd1dc;
        }

        /* Banner */
        .banner {
            height: 60vh;
            background: url('banner-floral.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }
        .banner h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            color: yellow;
        }
        .banner p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .banner a {
            text-decoration: none;
            background-color: #e3f2fd;
            color: #6a1b9a;
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 5px;
        }

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
            color: #8e44ad;
        }
        .product-details h6 {
            font-size: 1.5rem;
            margin: 10px 0;
            color: #8e44ad;
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
        .product-details h6.category, .product-details h6.description, .product-details h6.quantity {
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

        /* Footer */
        footer {
            background-color: #8e44ad;
            color: #fff;
            padding: 30px;
            text-align: center;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="#">Tienda Floral</a>
        <div>
            <a href="login">Iniciar sesión</a>
            <a href="register">Registrar</a>
            <a href="/">Categorías</a>
            <a href="/">Productos</a>
            <a href="#contacto">Contacto</a>
        </div>
    </nav>

    <!-- Sección de Producto -->
    <section class="product-section">
        <div class="product-card">
            <div class="img-box">
                <img src="{{ asset('imagen/'.$producto->imagen_url) }}" alt="Imagen del producto">
            </div>
            <div class="product-details">
                <h5>{{$producto->title}}</h5>

                @if ($producto->precioDescuento != null)
                    <h6 class="discount-price">OFERTA<br>{{$producto->precioDescuento}} Bs</h6>
                    <h6 class="original-price">PRECIO<br>{{$producto->precioVenta}} Bs</h6>
                @else
                    <h6 class="normal-price">PRECIO<br>{{$producto->precioVenta}} Bs</h6>
                @endif

                <h6 class="category">Categoría: {{$producto->categoria_id}}</h6>
                <h6 class="description">Descripción: {{$producto->descripcion}}</h6>
                <h6 class="quantity">Cantidad Disponible: {{$producto->cantidad}}</h6>

                <!-- Formulario para agregar al carrito -->
                <form class="cart-form" action="{{url('add_cart', $producto->id)}}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1">
                    <input type="submit" value="Añadir al carrito">
                </form>
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
