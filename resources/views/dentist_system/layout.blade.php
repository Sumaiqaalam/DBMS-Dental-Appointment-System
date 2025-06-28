<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'MEDICIO')</title>

    <!-- Centralized CSS -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #ffffff;
            color: #333;
        }

        nav {
            background-color: #3fbbc0;
            padding: 15px 30px;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav .logo {
            font-weight: bold;
            font-size: 1.5rem;
        }

        nav > div {
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #dff6f7;
        }

        .container {
            background-color: #ffffff;
            padding: 40px 20px;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        h1, h2 {
            margin-bottom: 30px;
            color: #444444;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: bold;
            color: #444444;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:hover,
        textarea:hover,
        select:hover {
            border-color: #3fbbc0;
            box-shadow: 0 0 5px rgba(63, 187, 192, 0.5);
        }

        .btn {
            background-color: #3fbbc0;
            border: none;
            color: #ffffff;
            padding: 12px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #059652;
        }

        .error {
            color: red;
            margin-bottom: 20px;
        }
    </style>

    @stack('styles')
</head>
<body>

    @include('dentist_system.navbar')

    <div class="container">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
