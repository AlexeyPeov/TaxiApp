<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .btn {
            padding: 15px 32px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="center">
    <button class="btn" id="passenger" onclick="location.href='/customer'">I'm a passenger</button>
    <button class="btn" id="driver" onclick="location.href='/taxidriver'">I'm a driver</button>
</div>

</body>
</html>
