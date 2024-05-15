<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Manual</title>

    <link rel="icon" href="{{ asset('webte_favicon/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center h-screen kk">
    <div class="w-full max-w-2xl p-8 bg-black bg-opacity-70 rounded-lg shadow-lg">
        @if (!isset($forPdf))
        <header class="mb-4">
            <nav class="flex justify-between lg:col-span-2 mb-4">
                <a href="{{ url('/') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-teal-500">
                    &larr; Back
                </a>
            </nav>
        </header>
        @endif

        <h1 class="text-2xl font-semibold text-white mb-4">User Manual</h1>
        <p class="text-gray-200 mb-4">
            Welcome to the user manual. Here you will find all the information you need to use our application effectively.
        </p>
        

        @if (!isset($forPdf))
        <div class="mt-4">
            <a href="{{ route('user-manual.export-pdf') }}" class="w-full bg-white text-teal-500 hover:bg-teal-500 hover:text-white px-4 py-2 rounded-md shadow-md transition text-center block">Export to PDF</a>
        </div>

        <div class="mt-4">
            <button onclick="goBack()" class="w-full bg-white text-teal-500 hover:bg-teal-500 hover:text-white px-4 py-2 rounded-md shadow-md transition">Back to welcome page</button>
        </div>
        @endif
    </div>

    @if (!isset($forPdf))
    <script>
        function goBack() {
            window.location.href = "{{ url('/') }}";
        }
    </script>
    @endif
</body>

</html>


