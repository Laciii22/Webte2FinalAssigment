<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-image: url('https://variety.com/wp-content/uploads/2023/12/YVYV_Main.jpg?w=1000&h=563&crop=1');
            background-color: rgba(0, 0, 0, 0.7);
            background-blend-mode: multiply;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen">
    <div class="w-full max-w-sm p-8 bg-black bg-opacity-70 rounded-lg shadow-lg">
        <header class="mb-4">
            @if (Route::has('login'))
            <nav class="flex justify-center lg:col-span-2 mb-4">
                @auth
                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-teal-500">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-teal-500">
                    Log in
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-teal-500">
                    Register
                </a>
                @endif
                @endauth
            </nav>


            @endif
        </header>

        <div class="mb-4">
            <label for="votingCode" class="block text-lg font-semibold text-white mb-2">Enter voting Code:</label>
            <input type="text" id="votingCode" name="votingCode" maxlength="5" class="px-4 py-2 w-full rounded-md border-gray-300 shadow-sm focus:border-[#FF2D20] focus:ring focus:ring-[#FF2D20] focus:ring-opacity-50" placeholder="Enter code">
        </div>

        <div>
            <button onclick="submitVotingCode()" class="w-full bg-white text-teal-500 hover:bg-teal-500 hover:text-white px-4 py-2 rounded-md shadow-md transition">Submit</button>
        </div>
    </div>

    <script>
        function submitVotingCode() {
            var votingCode = document.getElementById("votingCode").value;
            console.log("Happened");
            var url = "{{ route('questions.show', ':votingCode') }}";
            url = url.replace(':votingCode', encodeURIComponent(votingCode));
            window.location.href = url;
        }
    </script>
</body>

</html>