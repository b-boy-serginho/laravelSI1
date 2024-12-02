<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            margin-bottom: 30px;
        }

        .header img {
            height: 80px;
            padding: 2%;
        }

        .header .info {
            text-align: left;
            border: 2px solid black;
            border-radius: 5px;
            padding-top: 10px;
            width: auto;
        }

        .header .info table {
            border-collapse: collapse;
            margin-left: 10px;
        }

        .header .info td {
            padding: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        .additional-info {
            margin-top: 20px;
        }

        .right-align {
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('logo/logo.jpg') }}" alt="Logo">
        <div class="info">
            <table>
                <tr>
                    <td><strong>NIT:</strong></td>
                    <td>102812501</td>
                </tr>
                <tr>
                    <td><strong>NRO:</strong></td>
                    <td>5014</td>
                </tr>
                <tr>
                    <td><strong>COD. AUTORIZACIÓN:</strong></td>
                    <td>4513FKASALS</td>
                </tr>
            </table>
        </div>
    </div>

    <h2>FACTURA</h2>

    <p><strong>Fecha:</strong> {{ $cliente->fecha }} </p>
    <p><strong>Nombre del Cliente:</strong> {{ $cliente->nombre }}</p>
    <p><strong>CI:</strong> {{ $cliente->ci }}</p>
    <p><strong>Código del Cliente:</strong> {{ $cliente->codigo }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>CODIGO PRODUCTO</th>
                <th>DESCRIPCION</th>
                <th>CANTIDAD</th>
                <th>UNIDAD DE MEDIDA</th>
                <th>PRECIO UNITARIO</th>
                <th>DESCUENTO</th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            @php $totalAPagar = 0; @endphp
            @foreach ($facturas as $factura)
                <tr>
                    <td>{{ $factura->producto->cod }} - {{ $factura->producto->nombre }}</td>
                    <td>{{ $factura->producto->descripcion }}</td>
                    <td>{{ $factura->cantidad }}</td>
                    <td>{{ $factura->producto->medida }}</td>
                    <td>{{ number_format($factura->precio_unitario, 2) }}</td>
                    <td>{{ number_format($factura->descuento, 2) }}</td>
                    <td>{{ number_format($factura->subtotal, 2) }}</td>
                </tr>
                @php $totalAPagar += $factura->subtotal; @endphp
            @endforeach
        </tbody>>
    </table>

    <div class="additional-info">
        <p><strong>Almacén:</strong> ALM. VENTAS CIMAL - <strong>Encargado:</strong> PANIAGUA ESPINDOLA ALBERT</p>
    </div>

    <div class="total">
        <p><strong>Monto Total a Pagar:</strong> Bs {{ number_format($totalAPagar, 2) }}</p>
    </div>

</body>
</html>
