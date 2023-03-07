@extends('app')

@section('content')

    <div class="center", style="scale: 150%">
        <div class="form-container" style="display: flex;">
            <form method="POST" id = "login" action="/taxidriver/authenticate">
                @csrf

                <label for="phoneNumber">Phone Number</label>
                <input type="text" name="phoneNumber" id = "phoneNumber" value="{{old('phoneNumber')}}"/>

                @error('phoneNumber')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                       value="{{old('password')}}"/>

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                <div class="mb-6">
                    <button type="submit" id = "submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Sign In
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Don't have an account?
                        <a href="/taxidriver/signup" class="text-laravel">Sign Up</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("login").addEventListener("submit", function(event) {
            // Get the phone number entered by the user
            let phoneNumber = document.getElementById("phoneNumber").value;
            // Remove all non-digit characters from the phone number
            phoneNumber = phoneNumber.replace(/\D/g, "");

            // Format the phone number according to your desired format
            phoneNumber = "+ " + phoneNumber.slice(0, 1) + " (" + phoneNumber.slice(1, 4) + ") " + phoneNumber.slice(4, 6) + " " + phoneNumber.slice(6, 8) + " " + phoneNumber.slice(8);

            // Update the value of the input element with the formatted phone number
            document.getElementById("phoneNumber").value = phoneNumber;
        });
    </script>

@endsection
{{--
<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
            <p class="mb-4">Log into your account to post gigs</p>
        </header>

        <form method="POST" action="/taxidriver/authenticate">
            @csrf

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                       value="{{old('password')}}" />

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign In
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
--}}
