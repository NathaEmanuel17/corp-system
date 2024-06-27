<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Vendas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .client-name {
            font-weight: bold;
        }
        .total-amount {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 10px;
        }
        .item-details {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Relatório de Vendas</h2>

        <div class="total-amount">
            Total de Vendas: R$ {{ number_format($report['total_amount'], 2, ',', '.') }}
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Total da Venda</th>
                    <th>Detalhes dos Itens</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report['sales_details'] as $index => $sale)
                    <tr>
                        <td>{{ $sale['sale_id'] }}</td>
                        <td class="client-name">{{ $sale['client_name'] }}</td>
                        <td>{{ 'R$ ' . number_format($sale['total_amount'], 2, ',', '.') }}</td>
                        <td class="item-details">
                            @foreach ($sale['items'] as $item)
                                <div>
                                    <span><strong>{{ $item['product_name'] }}</strong></span><br>
                                    <span>Quantidade: {{ $item['quantity'] }}</span><br>
                                    <span>Preço Unitário: R$ {{ number_format($item['price'], 2, ',', '.') }}</span><br>
                                    <span>Total: R$ {{ number_format($item['total_price'], 2, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
