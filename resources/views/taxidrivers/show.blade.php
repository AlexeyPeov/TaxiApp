@extends('app')
@section('header')
    <style>
        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
        }

        .rating > span {
            display: inline-block;
            position: relative;
        }

        .Decline {
            background-color: #ff7f7f !important;
        }
        .Start {
            background-color: lightgreen !important;
        }

    </style>
@endsection
@section('content')
    <header>
        <form action="../logout" method="POST">
            @csrf
            {{--<input name="orderId" id="orderId" type="hidden" value="{{$order->id}}">--}}
            <input name="action" class = "Decline" id="LogOut" type="submit" value="LogOut">
        </form>
    </header>
    <div>
        <div class="rating">
            {{--Display rating if has one--}}
            @if($taxiDriver['rating'] != null)
                <p>Rating : {{$taxiDriver['rating']}}</p>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($taxiDriver['rating'] >= $i)
                        <span>★</span>
                    @elseif ($taxiDriver['rating'] > $i - 1)
                        <span>⯫</span>
                    @else
                        <span>☆</span>
                    @endif
                @endfor
            @else
                <p>Rating : {{$taxiDriver['reviewsGiven']}}/10 reviews given</p>
            @endif
        </div>

        @unless($taxiDriver == null)

            @unless($hisOrders == null)
                @foreach($hisOrders as $order)
                    <div class="sticker">
                        <p>Order Price: {{ $order->price }}</p>
                        <p>Class: {{ $order->classToString() }}</p>
                        <p>Order status: {{ $order->statusToString() }}</p>
                        <p>Point A: {{ $order->pointA }}</p>
                        <p>Point B: {{ $order->pointB }}</p>
                        <p>Order Date: {{ $order->created_at }}</p>
                        @if($order->taxiDriverId == $taxiDriver['id'])
                            @unless ($taxiDriver == null)
                                <p>Car Color: {{ $car->color}}</p>
                                <p>Car Plates: {{ $car->plates}}</p>
                            @endunless
                        @endif
                        @if($order->orderStatus == 2)
                            <form action="/order/update" method="POST">
                                @csrf
                                <input name="orderId" id="orderId" type="hidden" value="{{$order->id}}">
                                {{--<input name="taxiDriverId" id="taxiDriverId" type="hidden" value="{{$order->taxiDriverId}}">--}}
                                <input name="action" class = "Start" id="Start" type="submit" value="Start">
                                <input name="action" class = "Decline" id="Decline" type="submit" value="Decline">
                            </form>
                        @endif
                        @if($order->orderStatus == 3)
                            <form action="/order/update" method="POST">
                                @csrf
                                <input name="orderId" id="orderId" type="hidden" value="{{$order->id}}">
                                <input name="action" class = "Start" id="Finish" type="submit" value="Finish">
                            </form>
                        @endif
                    </div>
                @endforeach
            @endunless

            @foreach($orders as $order)
                <div class="sticker">
                    <p>Order Price: {{ $order->price }}</p>
                    <p>Class: {{ $order->classToString() }}</p>
                    <p>Order status: {{ $order->statusToString() }}</p>
                    <p>Point A: {{ $order->pointA }}</p>
                    <p>Point B: {{ $order->pointB }}</p>
                    <p>Order Date: {{ $order->created_at }}</p>
                    @if($order->taxiDriverId == $taxiDriver['id'])
                        @unless ($taxiDriver == null)
                            <p>TaxiDriver: {{ $taxiDriver['firstName']}}</p>
                            @if($taxiDriver['rating'] == null || $taxiDriver['reviewsGiven'] < 10)
                                <p>TaxiDriver Rating: Calibrating..({{$taxiDriver['reviewsGiven']}}/10)</p>
                            @else
                                <p>TaxiDriver Rating: {{ $taxiDriver['rating']}}</p>
                            @endif
                            <p>Car Color: {{ $car->color}}</p>
                            <p>Car Plates: {{ $car->plates}}</p>
                        @endunless
                    @endif
                    @if($order->orderStatus == 1)
                        <form action="/order/update" method="POST">
                            @csrf
                            <input name="taxiDriverId" id="taxiDriverID" type="hidden" value="{{$taxiDriver['id']}}">
                            <input name="orderId" id="orderId" type="hidden" value="{{$order->id}}">
                            <input name="action" id="Accept" type="submit" value="Take">
                        </form>
                    @endif
                </div>
            @endforeach

        @else
            <p>No listings found</p>
        @endunless

    </div>

    <div class="center">
        <div class="container">
            @unless ($taxiDriver == null)
                <p>TaxiDriver: {{ $taxiDriver['firstName']}}</p>
                <p>TaxiDriver phone num: {{ $taxiDriver['phoneNumber']}}</p>
            @endunless
        </div>
    </div>

@endsection
