@extends('app')

@section('content')


    <div class="center" style="scale: 150%">
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

    <script src="../../../public/js/parsePhoneNumber.js"></script>

@endsection

