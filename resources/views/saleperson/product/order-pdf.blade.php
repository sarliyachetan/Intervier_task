<!DOCTYPE html>
<html>
<head>
    <title>Order List PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Order List</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SKU</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>TOTAL</th>
            <th>ORDER STATUS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Order as $order)
            @foreach ($order->orderItems as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->product->name ?? '/' }}</td>
                <td>{{ $p->product->sku ?? '/' }}</td>
                <td>{{ $p->price }}</td>
                <td>{{ $p->quantity }}</td>
                <td>{{ $order->total }}</td>
                <td>
                    @if($order->status == 1)
                        Pending
                    @elseif($order->status == 2)
                        Confirmed
                    @elseif($order->status == 3)
                        Cancelled
                    @else
                        Unknown
                    @endif
                </td>
            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
</body>
</html>
