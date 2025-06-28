<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Dental Record</title>
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

        nav > div {
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: bold;
            font-size: 1.5rem;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .container {
            background-color: #ffffff;
            padding: 40px 20px;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        h2 {
            margin-bottom: 30px;
            color: #444;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: bold;
            color: #000000;
            margin-bottom: 5px;
        }

        input,
        textarea {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
            width: 100%;
        }

        input:hover,
        textarea:hover {
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

        .error-messages {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav>
    <div>
        <div class="logo">DentalCare</div>
        <ul>
            <li><a href="/home_page">HOME</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>
    </div>
</nav>

<!-- Form Container -->
<div class="container">
    <h2>Create New Dental Record for {{ $patient->Name }}</h2>

    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dental-records.store', ['patient' => $patient->id]) }}" method="POST">
        @csrf

        <div>
            <label>Treatment Provided:</label>
            <input name="Treatment_provided" value="{{ old('Treatment_provided') }}">
        </div>

        <div>
            <label>Diagnosis:</label>
            <input name="Diagnosis" value="{{ old('Diagnosis') }}">
        </div>

        <div>
            <label>Visit Date:</label>
            <input type="date" name="Visit_Date" value="{{ old('Visit_Date') }}">
        </div>

        <div>
            <label>Prescribtion:</label>
            <textarea name="Prescribtion">{{ old('Prescribtion') }}</textarea>
        </div>

        <div>
            <label>Notes:</label>
            <textarea name="Notes">{{ old('Notes') }}</textarea>
        </div>

        <button type="submit" class="btn">Save Dental Record</button>
    </form>
</div>

</body>
</html>
