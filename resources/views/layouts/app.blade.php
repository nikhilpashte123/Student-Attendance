<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance system</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="font-sans">

    <header class="bg-blue-500 p-4">
        <nav class="flex items-center justify-between">
            <ul class="flex space-x-4 text-white">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/students') }}">Students</a></li>
                <li><a href="{{ url('/attendances') }}">Attendances</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mx-auto mt-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

</body>
</html>
