@extends ('app')

@section('content')


        @unless($customer == null)

            @foreach($orders as $order)
                <div class="sticker">
                <p>Order ID: {{ $order->id }}</p>
                <p>Order Price: {{ $order->price }}</p>
                <p>Class: {{ $order->class }}</p>
                <p>Order status: {{ $order->orderStatus }}</p>
                <p>Order Date: {{ $order->created_at }}</p>
                @unless ($taxiDriver == null)
                <p>TaxiDriver: {{ $taxiDriver->firstName}}</p>
                <p>TaxiDriver Rating: {{ $taxiDriver->firstName}}</p>
                <p>Car Color: {{ $car->color}}</p>
                <p>Car Plates: {{ $car->plates}}</p>
                @endunless
                </div>
            @endforeach

        @else
            <p>No listings found</p>
        @endunless


@endsection

