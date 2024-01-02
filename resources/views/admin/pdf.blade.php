<!DOCTYPE html>
<html>
    <head>
        <title>Order PDF</title>
    </head>
    <body>
        

        <h1>Order Detail</h1>

        <h2>Costumer Data</h2>
        Name: <h3>{{$order->name}}</h3>
        Email: <h3>{{$order->email}}</h3>
        Phone: <h3>{{$order->phone}}</h3>
        Address: <h3>{{$order->address}}</h3>
        Id: <h3>{{$order->user_id}}</h3>
        <br>
        <h2>Product Data</h2>
        Name: <h3>{{$order->product_title}}</h3>
        Price: <h3>Rp.{{$order->price}}</h3>
        Quantity: <h3>{{$order->quantity}}</h3>
        Payment status: <h3>{{$order->payment_status}}</h3>
        Product Id: <h3>{{$order->product_id}}</h3>
        <img height="150" width="250" src="product/{{$order->image}}">

    </body>
</html>