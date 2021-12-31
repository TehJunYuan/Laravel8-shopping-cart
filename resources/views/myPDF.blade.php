<html>
    <head>
        <title>Southern Online</title>
    </head>

    <body>
        <h2>Order List</h2>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Order ID</td>
                        <td>Amount</td>
                        <td>Payment Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>RM {{$order->amount}}</td>
                        <td>{{$order->paymentStatus}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </body>
</html>