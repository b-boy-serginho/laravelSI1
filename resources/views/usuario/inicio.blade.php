<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tienda ARTEDEC</title>

    <link rel="stylesheet" href="{{ asset('inicio/estilos.css') }}">

    {{-- PARA LOS COMENTARIOS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .box {
            position: relative;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
    
        .box:hover {
            transform: scale(1.05);
        }
    
        .img-box {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 200px; /* Tamaño fijo de imagen */
        }
    
        .img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Asegura que la imagen se adapte sin deformarse */
        }
    
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10px;
        }
    
        .img-box:hover .overlay {
            opacity: 1;
        }
    
        .text {
            font-size: 14px;
        }
    
        .price {
            font-weight: bold;
            margin-top: 10px;
        }
    
        .discount {
            color: red;
        }
    
        .regular {
            text-decoration: line-through;
            color: #999;
        }
    
        .button-container {
            margin-top: 15px;
        }
    
        .add-to-cart {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
    
        .add-to-cart:hover {
            background-color: #0056b3;
        }
    
        /* Responsivo */
        @media (max-width: 767px) {
            .col-sm-6 {
                width: 100%;
            }
        }
    
        @media (min-width: 768px) and (max-width: 991px) {
            .col-md-4 {
                width: 50%;
            }
        }
    
        @media (min-width: 992px) {
            .col-lg-4 {
                width: 33.33%;
            }
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="#">Tienda ARTEDEC</a>
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
                <a href="register">Crear Cuenta</a>
                <a href="/">Productos</a>
                <a href="#contacto">Contacto</a>
            @endif


        </div>
    </nav>

    <!-- Banner -->
    <section class="banner">
        <div>
            <h1 style="">Bienvenidos a Tienda ARTEDEC</h1>
            <p>Encuentra una amplia variedad de productos inspirados en la naturaleza</p>

        </div>
    </section>

    <!-- Categorías -->
    <section id="categorias" class="section">
        <h2>Categorías Populares</h2>
        <div class="categories">
            <div class="card">
                {{-- <img src="/inicio/R.jpeg" alt="Flores"> --}}
                <img src="/inicio/img3.jpg" alt="Flores">
                <div class="card-body">
                    <h3 class="card-title">Decoracion</h3>
                </div>
            </div>
            <div class="card">
                {{-- <img src="/inicio/img1.jpg" alt="Decoración"> --}}
                <img src="/inicio/img2.jpg" alt="Decoración">
                <div class="card-body">
                    <h3 class="card-title">Casita en PVC</h3>
                </div>
            </div>
            <div class="card">
                <img src="/inicio/img1.jpg" alt="Juguetes">
                <div class="card-body">
                    <h3 class="card-title">Robusto</h3>
                </div>
            </div>
        </div>
    </section>
            
    <!-- Agrega más productos según sea necesario -->

    <!-- Sección de productos -->
    <section class="product-section">
        <div class="container">

            <div class="section-title">
                <h2>Productos Destacados</h2>
            </div>

            @if (session('mensaje'))
                <div class="alert alert-success">
                    <p>{{ session('mensaje') }}</p>
                </div>
            @endif

           <div class="row">
                 {{--<div class="card">
                    <img src="/inicio/img3.jpg" alt="Producto 2">
                    <div class="card-body">
                        <h3 class="card-title">Producto 1</h3>
                        <p>Bs 20</p>
                    </div>
                </div> 
                <div class="card">
                    <img src="/inicio/img2.jpg" alt="Producto 2">
                    <div class="card-body">
                        <h3 class="card-title">Producto 2</h3>
                        <p>Bs 80</p>
                    </div>
                </div>  --}}
                 
                @foreach ($producto as $products)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <!-- Opciones (si las tienes) -->
                            </div>                            
                
                            <div class="img-box">
                                <img src="imagen/{{ $products->imagen_url }}" alt="">
                                <div class="overlay">
                                    <div class="text">


                                        @if (Auth::check())
                                            <form action="{{ url('agregar_carrito', $products->id) }}" method="POST"
                                                class="add-to-cart-form">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-col">
                                                        <input type="number" name="cantidad" value="1"
                                                            min="1" class="quantity-input">
                                                    </div>
                                                    <div class="form-col">
                                                        <input
                                                            onclick="return confirm('¿Quieres agregar este producto al carrito?')"
                                                            type="submit" value="Añadir al carrito"
                                                            class="carrito-inicio">
                                                    </div>
                                                </div>
                                            </form>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <h2>{{ $products->nombre }}</h2>
                            @if ($products->precioDescuento != null)
                                <div class="price discount">
                                    OFERTA <br>
                                    {{ $products->precioDescuento }} Bs
                                </div>
                                <div class="price regular">
                                    PRECIO <br>
                                    {{ $products->precioVenta }} Bs
                                </div>
                            @else
                                <div class="price normal">
                                    PRECIO <br>
                                    {{ $products->precioVenta }} Bs
                                </div>
                            @endif
                            <div class="button-container">
                                <a class="add-to-cart" href="{{ url('detalle_producto', $products->id) }}">Ver
                                    detalles</a>
                            </div>


                        </div>

                    </div>
                @endforeach



            </div>
        </div>
    </section>
    <!-- Fin de la sección de productos -->


    {{-- COMENTARIO --}}
    <div style="text-align: center; padding-top: 20px;">
        <h1 style="font-size: 30px; color: #4b0082; text-align: center; padding-top: 20px; padding-bottom: 20px;">
            Comentarios
        </h1>
        <form action="{{ url('agregar_comentario') }}" style="display: inline-block; text-align: left; width: 600px;"
            method="POST">
            @csrf
            <textarea
                style="height: 150px; width: 100%; padding: 10px; font-size: 1rem; border-radius: 8px; border: 1px solid #ccc; resize: vertical;"
                name="comentario" id="" cols="30" rows="10" placeholder="Escribe un comentario aquí"></textarea>
            <br><br>
            <input type="submit"
                style="background-color: indigo; color: white; padding: 10px 20px; font-size: 1rem; border: none; border-radius: 5px; cursor: pointer;"
                value="comentario">
        </form>
    </div>


    {{-- RESPUESTAS DEL USUARIO CLIENTE --}}
    <div style="padding-left: 20%; padding-top: 20px;">
        <h1 style="font-size: 30px; color: #4b0082;">
            Todos los comentarios
        </h1>

        @foreach ($comentario as $comentario)
            <div
                style="margin-bottom: 20px; border: 1px solid #ccc; padding: 15px; border-radius: 10px; background-color: #f9f9f9;">
                <b>{{ $comentario->nombre }}</b>
                <p>{{ $comentario->comentario }}</p>
                <a href="javascript:void(0);" onclick="reply(this)"
                    style=""
                    data-Commentid="{{ $comentario->id }}">
                    Responder
                </a>

                @foreach ($respuesta as $resp)
                    @if($resp->comentario_id ==  $comentario->id  )
                        <div style="margin-bottom: 20px; border: 1px solid #ccc; padding: 15px; padding-left: 30px; border-radius: 10px; background-color: #f9f9f9; ">
                            <b>{{ $resp->nombre }}</b>
                            <p>{{ $resp->respuesta }}</p>
                            <a href="javascript:void(0);" onclick="reply(this)"
                                style="color: #4b0082; text-decoration: underline; cursor: pointer;"
                                data-Commentid="{{ $comentario->id }}">
                                Responder
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>
        @endforeach


        <div style="display: none; padding-top: 10px;" class="replyDiv">
            <form action="{{ url('agregar_respuesta') }}" method="POST">
                @csrf

                <input type="text" id="comentarioId" name="comentarioId" hidden>
                <textarea name="respuesta" placeholder="Escribe tu respuesta aquí"
                    style="height: 100px; width: 100%; padding: 10px; font-size: 1rem; border-radius: 8px; border: 1px solid #ccc; resize: vertical;"></textarea>
                <br><br>

                <button type="submit"
                    style="background-color: indigo; color: white; padding: 10px 20px; font-size: 1rem; border: none; border-radius: 5px; cursor: pointer;">
                    Responder
                </button>

                <a href="javascript:void(0);" onclick="reply_close(this)"
                    style="background-color: red; color: white; padding: 10px 20px; font-size: 1rem; border: none; border-radius: 5px; cursor: pointer;">
                    cerrar
                </a>

            </form>
        </div>
    </div>


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Tienda Floral. Todos los derechos reservados.</p>
    </footer>


    {{-- FUNCION DEL COMENTARIO --}}
    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('comentarioId').value = $(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller) {
            $('.replyDiv').hide();
        }
    </script>

    {{-- PARA QUE NO SE RECARGUE EL COMENTARIO --}}
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });
        
        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    


</body>

</html>
