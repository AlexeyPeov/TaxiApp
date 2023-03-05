@extends('app')

@section('content')
    <div class="center">
        <button class="btn" id="login" onclick="location.href='/taxidriver/login'">Login</button>
        <button class="btn" id="signup" onclick="location.href='/taxidriver/signup'">Sign Up</button>
    </div>
@endsection
