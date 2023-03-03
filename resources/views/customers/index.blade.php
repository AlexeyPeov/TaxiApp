<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">
    <style>
        .center {
            scale: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            padding: 15px 32px;
            font-size: 16px;
            cursor: pointer;
        }
         .radio-toolbar input[type="radio"] {
             display: none;
         }
        .radio-toolbar label {
            display: inline-block;
            padding: 4px 11px;
            font-size: 16px;
            cursor: pointer;
        }
        .radio-toolbar input[type="radio"]:checked + label {
            background-color: #856404;
        }

    </style>
    <title>Order Form</title>
</head>
<body>

<div class="center">
    <form action="/order/submit" method="POST">
        @csrf

        <label for="phone">Phone Number:</label><br>
        <input type="text" id="phone" name="phone" required><br>

        <div class="radio-toolbar">
            <p>Choose class:</p>
            <input type="radio" id="class1" name="carClass" value= "1" required>
            <label for="class1">1st</label>

            <input type="radio" id="class2" name="carClass" value= "2">
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

</body>
</html>
