<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Clinic Management System')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f9;
            color: #263238;
        }

        .navbar {
            background: #087f8c;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .brand {
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        button, .btn {
            display: inline-block;
            background: #087f8c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 7px 0 15px;
            border: 1px solid #ccd5d8;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e5e9eb;
        }

        th {
            background: #e8f4f5;
        }

        .footer {
            text-align: center;
            color: #718096;
            padding: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a class="brand" href="{{ route('patients.dashboard') }}">
            Clinic Management System
        </a>

        <div class="nav-links">
            <a href="{{ route('patients.dashboard') }}">Dashboard</a>
            <a href="{{ route('patients.index') }}">Patient Records</a>
            <a href="{{ route('patients.create') }}">Add Patient</a>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="footer">
        Clinic Management System &copy; {{ date('Y') }}
    </footer>

</body>
</html>