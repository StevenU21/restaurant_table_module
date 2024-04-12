<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de Reserva de Mesa - Restaurante X</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding-top: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #333;
        }

        p {
            color: #555;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        .table thead th {
            background-color: #f8f9fa;
            border: none;
        }

        .total {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .total p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Restaurante X</h1>
                <p>Factura de Reserva de Mesa</p>
            </div>
        </div>
        <div class="invoice-details">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p><strong>Factura ID:</strong> {{ $invoice->id }}</p>
                    <p><strong>Fecha:</strong> {{ $invoice->created_at }}</p>
                    <p><strong>Cliente:</strong> {{ $invoice->client->user->name }}</p>
                    <p><strong>Empleado:</strong> {{ $invoice->assignment->user->name }}</p>
                    <p><strong>No. Mesa:</strong> {{ $invoice->assignment->table->table_number }}</p>
                    <p><strong>Tipo Mesa:</strong> {{ $invoice->assignment->table->type->name }}</p>
                    <p><strong>Tipo Asignación:</strong> {{ $invoice->assignment->assignment_type }}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Precio Unitario</th>
                                <th>Fecha Reservación</th>
                                <th>Hora Reservación</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $invoice->details }}</td>
                                <td>{{ number_format($invoice->unit_price, 2, '.', ',') }}</td>
                                <td>{{ $invoice->assignment->reservation_date }}</td>
                                <td>{{ $invoice->assignment->reservation_time }}</td>
                                <td>{{ number_format($invoice->total_ammount, 2, '.', ',') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="total">
                    <p>Subtotal: {{ number_format($invoice->unit_price, 2, '.', ',') }}</p>
                    <p>IVA (15%): {{ number_format($invoice->unit_price * 0.15, 2, '.', ',') }}</p>
                    <p><strong>Total: {{ number_format($invoice->total_ammount, 2, '.', ',') }}</strong></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p>Gracias por su visita.</p>
            </div>
        </div>
    </div>
</body>

</html>
