@extends('app')

<style>
    fieldset {
        margin: 15 20px;
    }
</style>
@section('content')

    <form method="POST" action="/taxidriver/new">
        @csrf
        <div class="form-container" style="display: flex;">
            <fieldset>
                <legend>Driver</legend>
                <label for="firstName"> First Name </label><br>
                <input type="text" name="firstName" value="{{old('firstName')}}"/>
                @error('firstName')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <label for="secondName"> Second Name </label><br>
                <input type="text" name="secondName" value="{{old('secondName')}}"/>
                @error('secondName')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <label for="phoneNumber">Phone Number</label><br>
                <input type="text" name="phoneNumber" value="{{old('phoneNumber')}}"/>

                @error('phoneNumber')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <label for="birthday">Day of Birth</label><br>
                <input type="date" name="birthday" value="{{old('birthday')}}"/>

                @error('birthday')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </fieldset>

            <fieldset>
                <legend>Car</legend>
                <label for="brand">Brand</label><br>
                <input type="text" name="brand" value="{{old('brand')}}"/>
                @error('brand')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <label for="plates">Plates</label><br>
                <input type="text" name="plates" value="{{old('plates')}}"/>
                @error('plates')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <label for="color">Color</label><br>
                <input type="text" name="color" value="{{old('color')}}"/>

                @error('color')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <label for="carClass">Car Class</label><br>
                <input type="text" name="carClass" value="{{old('carClass')}}"/>

                @error('carClass')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </fieldset>
        </div>

        <fieldset style="display: inline-block">
            <label for="password">
                Password
            </label><br>
            <input type="password" name="password"
                   value="{{old('password')}}"/>

            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror


            <label for="password2">
                Confirm Password
            </label><br>
            <input type="password" name="password_confirmation"
                   value="{{old('password_confirmation')}}"/>

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{$message}}</p>
            @enderror
        </fieldset>

        <fieldset style="display: inline-block">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Sign Up
            </button>

            <p>
                Already have an account?
                <a href="/taxidriver/login" class="text-laravel">Login</a>
            </p>
        </fieldset>
    </form>

@endsection
