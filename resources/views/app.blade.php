<!DOCTYPE html>
<html>
<head>
    <title>My Site</title>

    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">
    {{--<link rel="stylesheet" href="{{ asset('css/.css') }}">--}}
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
        .sticker {
            display: inline-block;
            padding: 10px;
            margin: 10px;
            border: 1px solid black;
            border-radius: 10px;
        }
    </style>
</head>
<body>
{{--<header>
    <nav>
        <a href="/sign-in">Sign In</a>
    </nav>
</header>--}}

<main>
    @yield('content')
</main>

<footer>
    &copy; 2023 Taxi
</footer>
</body>
</html>
