<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pedidos</title>
    <style>
        table {
            width: 100%; /* Cambiar a un 80% para reducir el tamaño de la tabla */
            border-collapse: collapse;
            font-size: 12px; /* Reducir el tamaño de la fuente */
        }
        th, td {
            border: 1px solid #000;
            padding: 6px; /* Reducir el padding para hacer la tabla más compacta */
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 40px; /* Reducir el tamaño de la imagen */
            height: 40px;
            border-radius: 4px; /* Ajustar el borde */
        }
    </style>
</head>
<body>
    <h1>Lista de Pedidos</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Importe</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->nombreUsuario }}</td>
                    <td>{{ $pedido->correo }}</td>
                    <td>{{ $pedido->direccion }}</td>
                    <td>{{ $pedido->telefono }}</td>
                    <td>{{ $pedido->nombreProducto }}</td>
                    <td>{{ $pedido->cantidad }}</td>
                    <td>{{ $pedido->precioVenta }}</td>
                    <td>{{ $pedido->importe }}</td>
                    <td class="text-center">
                        <img src="{{ public_path('imagen/' . $pedido->imagen_url) }}" 
                             alt="Imagen del producto">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
