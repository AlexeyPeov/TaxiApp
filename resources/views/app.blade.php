<!DOCTYPE html>
<html>
<head>
    <title>Taxi</title>

    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">
    <style>
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
        .form-container {
            display: flex;
            justify-content: center;
        }

        .form-wrapper {
            margin: 0 20px;
        }
        .text-red-500 {
            color: #ff7f7f;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

    </style>
</head>
<body>
@yield('header')
<main>
    @yield('content')
</main>

<footer>
    &copy; 2023 Taxi
</footer>
</body>
</html>
