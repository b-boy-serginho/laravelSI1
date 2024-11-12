<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Detalles del Pedido</h1>

    <table>
        <tr>
            <th>Nombre</th>
            <td>{{ $pedido->nombreUsuario }}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{ $pedido->correo }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $pedido->direccion }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $pedido->telefono }}</td>
        </tr>
        <tr>
            <th>Producto</th>
            <td>{{ $pedido->nombreProducto }}</td>
        </tr>
        <tr>
            <th>Cantidad</th>
            <td>{{ $pedido->cantidad }}</td>
        </tr>
        <tr>
            <th>Precio</th>
            <td>{{ $pedido->precioVenta }}</td>
        </tr>
        <tr>
            <th>Importe</th>
            <td>{{ $pedido->importe }}</td>
        </tr>
        <tr>
            <th>Imagen</th>
            <td class="text-center">
                <img style="width: 60px; height: 60px; border-radius: 8px;" 
                     src="{{ public_path('imagen/' . $pedido->imagen_url) }}" 
                     alt="Imagen del producto">
            </td>
        </tr>
    </table>
</body>
</html>
