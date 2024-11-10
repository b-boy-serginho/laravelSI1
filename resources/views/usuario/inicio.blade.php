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
            padding: 15px 20px;
            background-color: #8e44ad;
            color: #fff;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
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
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: yellow;

        }

        .banner p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .banner a {
            text-decoration: none;
            background-color: #e3f2fd;
            color: #6a1b9a;
            padding: 10px 20px;
            border-radius: 5px;
        }

        /* Sección de categorías */
        .section {
            padding: 50px 20px;
            text-align: center;
        }

        .section h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: #5d4037;
        }

        .categories, .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            color: #8e44ad;
            margin-bottom: 10px;
        }

        /* Contacto */
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-form label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .contact-form button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #8e44ad;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #733e90;
        }

        /* Footer */
        footer {
            background-color: #8e44ad;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .banner h1 {
                font-size: 2rem;
            }
            .categories, .products {
                flex-direction: column;
                align-items: center;
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .col-sm-6,
        .col-md-4,
        .col-lg-4 {
            flex: 0 0 calc(50% - 20px);
            margin-bottom: 40px;
            padding: 0 10px;
        }

        .box {
            border: 1px solid #ddd;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .box:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .img-box {
            position: relative;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .img-box img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .img-box:hover img {
            transform: scale(1.1);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .img-box:hover .overlay {
            opacity: 1;
        }

        .overlay .text {
            text-align: center;
        }

        .option_container {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .options {
            background: rgba(255, 255, 255, 0.7);
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .option_container:hover .options {
            background: rgba(255, 255, 255, 0.9);
        }

        .option1 {
            color: #333;
            text-decoration: none;
        }

         /* Estilos específicos para texto de oferta y precio */
         .price {
            margin-bottom: 10px;
            text-align: center;
            font-size: 15px;
        }

        .price.discount {
            color: blue;
        }

        .price.regular {
            text-decoration: line-through;
            color: red;
        }

        .price.normal {
            color: green;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="#">Tienda Floral</a>
        <div>
            <a href="login">Iniciar sesion</a>
            <a href="register">Registrar</a>
            <a href="#categorias">Categorías</a>
            <a href="inicio">Productos</a>
            <a href="#contacto">Contacto</a>
        </div>
    </nav>

    <!-- Banner -->
    <section class="banner">
        <div>
            <h1>Bienvenidos a Tienda Floral</h1>
            <p>Encuentra una amplia variedad de productos inspirados en la naturaleza</p>

        </div>
    </section>

    <!-- Categorías -->
    <section id="categorias" class="section">
        <h2>Categorías Populares</h2>
        <div class="categories">
            <div class="card">
                <img src="/inicio/R.jpeg" alt="Flores">
                <div class="card-body">
                    <h3 class="card-title">Flores</h3>
                </div>
            </div>
            <div class="card">
                <img src="/inicio/OIP.jpeg" alt="Decoración">
                <div class="card-body">
                    <h3 class="card-title">Decoración</h3>
                </div>
            </div>
            <div class="card">
                <img src="/inicio/img1.jpg" alt="Juguetes">
                <div class="card-body">
                    <h3 class="card-title">Juguetes</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos Destacados -->
    <!-- <section id="productos" class="section">
    <h2>Productos Destacados</h2>
    @foreach ($producto as $products)
        <div class="products">
            <div class="card">
                <img src="imagen/{{$products->imagen_url}}" alt="Producto 1">
                <div class="card-body">
                    <h3 class="card-title">{{$products->nombre}}</h3>

                </div>

                @if ($products->precioDescuento != null)
                        <div class="price discount">
                            OFERTA <br>
                            Bs {{$products->precioDescuento}}
                        </div>
                        <div class="price regular">
                            PRECIO <br>
                            Bs {{$products->precioVenta}}
                        </div>
                        @else
                        <div class="price normal">
                            PRECIO <br>
                            Bs {{$products->precioVenta}}
                        </div>
                        @endif
            </div>         -->

            <!-- <div class="card">
                <img src="/inicio/img3.jpg" alt="Producto 2">
                <div class="card-body">
                    <h3 class="card-title">Producto 3</h3>
                    <p>$20.00</p>
                </div>
            </div>  -->
            <!-- Agrega más productos según sea necesario -->

        <!-- </div>


    @endforeach
    </section> -->

    <!-- Sección de productos -->
    <section class="product-section">
        <div class="container">
            <div class="section-title">
                <h2>Productos Destacados</h2>
            </div>
            <div class="row">
                @foreach ($producto as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <!-- Opciones (si las tienes) -->
                        </div>
                        <div class="img-box">
                            <img src="imagen/{{$products->imagen_url}}" alt="">
                            <div class="overlay">
                                <div class="text">
                                    <a style="color: white" href="/">Comprar</a>
                                    <br>
                                    <br>
                                    <a style="color: white" href="{{url('detalle_producto', $products->id)}}">Ver detalles</a>

                                </div>
                            </div>
                        </div>
                        <h2>{{$products->nombre}}</h2>
                        @if ($products->precioDescuento != null)
                        <div class="price discount">
                            OFERTA <br>
                            {{$products->precioDescuento}} Bs
                        </div>
                        <div class="price regular">
                            PRECIO <br>
                            {{$products->precioVenta}} Bs
                        </div>
                        @else
                        <div class="price normal">
                            PRECIO <br>
                            {{$products->precioVenta}} Bs
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach


            <!-- El paginado -->
            {!! $producto->withQueryString()->links('pagination::bootstrap-5') !!}

            </div>
        </div>
    </section>
    <!-- Fin de la sección de productos -->


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Tienda Floral. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

