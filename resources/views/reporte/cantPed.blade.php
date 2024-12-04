<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Pedidos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Reporte de Pedidos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Importe</th>
                {{-- <th>Pago</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido as $pedido)
                <tr>
                    <td>{{ $pedido->nombreUsuario }}</td>
                    <td>{{ $pedido->correo }}</td>
                    <td>{{ $pedido->telefono }}</td>
                    <td>{{ $pedido->direccion }}</td>
                    <td>{{ $pedido->nombreProducto }}</td>
                    <td>{{ $pedido->cantidad }}</td>
                    <td>{{ number_format($pedido->precioVenta, 2) }}</td>
                    <td>{{ number_format($pedido->importe, 2) }}</td>
                    {{-- <td>{{ ucfirst($pedido->estado_pago) }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
