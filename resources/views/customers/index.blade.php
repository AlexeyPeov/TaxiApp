@extends ('app')

@section ('content')
    <div class="form-container" style="display: flex;">
        <form action="/order/submit" method="POST">
            <b style="font-size: 40px;"> Create order</b> <br> <br> <br>
            @csrf
            <label for="phoneNumber">Phone Number:</label><br>
            <input type="text" id="phoneNumber" name="phoneNumber" required><br>

            <label for="name">Name:</label><br>
            <input type="text" id="firstName" name="name" required><br>

            <div class="radio-toolbar">
                <p>Choose class:</p>
                <input type="radio" id="class1" name="carClass" value= "1" required>
                <label for="class1">1st</label>

                <input type="radio" id="class2" name="carClass" value= "2" checked>
                <label for="class2">2nd</label>

                <input type="radio" id = "class3" name ="carClass" value = "3">
                <label for ="class3">3rd</label>
            </div>
            <br>

            <label for="from">Where From:</label><br>
            <input type="text" id="from" name="from" required><br>

            <label for="to">Where To:</label><br>
            <input type="text" id="to" name="to" required><br><br>

            <input type="submit" value="Order">
        </form>
    </div>
    <script src="../../../public/js/parsePhoneNumber.js"></script>
@endsection
