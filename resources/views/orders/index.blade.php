@extends ('app')

@section('content')

    @unless($customer == null)
        @foreach($orders as $order)
            <div class="sticker">
                <p>Order Price: {{ $order->price }}</p>
                <p>Point A: {{ $order->pointA }}</p>
                <p>Point B: {{ $order->pointB }}</p>
                <p>Class: {{ $order->classToString()}}</p>
                <p>Order status: {{ $order->statusToString() }}</p>
                @unless ($order['TaxiDriver'] == null)
                    <p>TaxiDriver: {{ $order['TaxiDriver']->firstName}}</p>
                    @if($order['TaxiDriver']->rating != null)
                        <p>TaxiDriver Rating: {{ $order['TaxiDriver']->rating}}</p>
                    @endif
                    <p>Car Color: {{ $order['Car']->color}}</p>
                    <p>Car Brand: {{ $order['Car']->brand}}</p>
                @endunless
                @if($order->orderStatus == 2 || $order->orderStatus == 1)
                    <form action="/order/update" method="POST">
                        @csrf
                        <input name="orderId" id="orderId" type="hidden" value="{{$order->id}}">
                        <input name="customerId" id="customerId" type="hidden" value="{{$order->customerId}}">
                        <input name="action" class = "Decline" id="DeclineAsCustomer" type="submit" value="Decline">
                    </form>
                @endif

                @if($order->orderStatus == 4 && !$order->reviewGiven)
                    <form action="/order/update" id = "starsForm" method="POST">
                        @csrf
                        <input name="orderId" id="orderId" type="hidden" value="{{$order->id}}">
                        <input name="customerId" id="customerId" type="hidden" value="{{$order->customerId}}">
                        <input type="hidden" name="rating" id="rating" value="">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span> <br>
                        <input name="action" class = "Decline" id="Submit" type="submit" value="Leave Review">
                    </form>
                    <script>
                        let stars = document.querySelectorAll('.star');

                        for (let i = 0; i < stars.length; i++) {
                            stars[i].addEventListener('click', function() {
                                let rating = this.getAttribute('data-value');
                                document.getElementById('rating').value = rating;

                                for (let j = 0; j < stars.length; j++) {
                                    if (j < rating) {
                                        stars[j].textContent = '★';
                                    } else {
                                        stars[j].textContent = '☆';
                                    }
                                }
                            });
                        }
                    </script>
                @endif
            </div>
        @endforeach

    @else
        <p>No Current Orders</p>
    @endunless

@endsection

