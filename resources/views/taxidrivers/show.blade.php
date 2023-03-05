@extends('app')
@section('content')

    <div class="sticker">
        @unless ($taxiDriver == null)
            <p>TaxiDriver: {{ $taxiDriver['firstName']}}</p>
            <p>TaxiDriver phone num: {{ $taxiDriver['phoneNumber']}}</p>
        @endunless
    </div>

@endsection
