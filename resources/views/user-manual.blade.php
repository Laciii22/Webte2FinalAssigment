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
    <div class="w-full max-w-2xl p-8 bg-black bg-opacity-70 rounded-lg shadow-lg overflow-y-auto" style="max-height: 90vh;">
        @if (!isset($forPdf))
        <header class="mb-4">
            <nav class="flex justify-between lg:col-span-2 mb-4">
                <a href="{{ url('/') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-teal-500">
                    &larr; Back
                </a>
            </nav>
        </header>
        @endif

        <h1 class="text-2xl font-semibold text-white mb-4 text-center">User Manual</h1>
        <p class="text-gray-200 mb-4">
            Welcome to the user manual. Here you will find all the information you need to use our application effectively.
        </p>

        <h2 class="text-xl font-semibold text-white myb-4">Home Page</h2>
        <p class="text-gray-200 mb-4">
            The home page of the application provides options for logging in , registering, and entering an access code to view the voting question.
        </p>


        <h3 class="text-white mb-4 bg-teal-500 p-2 rounded font-bold text-center">UNAUTHENTICATED USERS:</h3>
        <div class="list-decimal list-inside text-gray-200 mb-3">
            
                <strong><p class="text-xl font-semibold text-white my-2">Accessing the Voting Question:</p> </strong>
                <p>User can display the voting question by :</p>
                <ul class="list-disc list-inside pl-4">
                    <li>Scanning the published QR code.</li>
                    <li>Entering the access code on the home page of the application.</li>
                    <li>Entering the URL in the format <code>https://node48.webte.fei.stuba.sk/abcde</code> in the browser, where <code>abcde</code> represents a 5-character access code </li>
                </ul>
            
            
            
            <strong><p class="text-xl font-semibold text-white my-2">Displaying Voting Results:</p></strong>
                <p>After submitting the voting question by clicking on submit button, the user will be redirected to a page displaying the results of the voting for the given question. From there, they can return to the home page of the application by clicking to "Welcome" tab.</p>
                <strong> <p class="text-xl font-semibold text-white my-2">Formats for Displaying Voting Results:</p> </strong>
                <p>When displaying voting results for an open question, the answers will be shown either as items in an unordered list or using a "word cloud".The user can switch between these views by clicking on a toggle button.</p>
                    </div>

        <h3 class="text-white mb-4 bg-teal-500 p-2 rounded font-bold text-center">AUTHENTICATED USERS:</h3>
        <p class="text-gray-200 mt-4">A logged-in user has the same functionalities as an unauthenticated user.</p>
        <p class="text-gray-200 ">Plus:</p>
        
        <div class="list-decimal list-inside text-gray-200 mb-2">
            
        <strong> <p class="text-xl font-semibold text-white my-2">Login:</p> </strong>
                <p>Login to the application using their registration.</p>
           
                <strong> <p class="text-xl font-semibold text-white my-2">Edit profile:</p> </strong>
                <p>Edit profile by clicking on their username in the top right corner and then clicking on 'Profile'. On this page users can delete their profile, edit name, email or password.</p>
            
                <strong><p class="text-xl font-semibold text-white my-2">Logout:</p></strong>
                <p>Users can logout by clicking on their username in the top right corner and then clicking on 'Logout'.</p>

                <strong> <p class="text-xl font-semibold text-white my-2">Define Voting Questions:</p> </strong>
                <p>On the dashboard page, the user has the ability to click on the "Create new question" button, where a form field will appear to fill in their own question.</p>
            
                <strong><p class="text-xl font-semibold text-white my-2">Generate Codes:</p> </strong>
                <p>After creating the question, a QR code and a unique randomly generated 5-character code are generated, which are used to display the question.</p>
          
                <strong><p class="text-xl font-semibold text-white my-2">Types of Questions a user can create:</p> </strong>
                <ul class="list-disc list-inside pl-4">
                    <li>Questions with multiple choice answers.</li>
                    <li>Questions with an open-ended short answer.</li>
                </ul>
            
                <strong> <p class="text-xl font-semibold text-white my-2">Manage Questions:<p> </strong>
                <p>On the dashboard page, a logged-in user can see all their questions and can edit or delete their questions by clicking the buttons below the question.</p>
            
                <strong> <p class="text-xl font-semibold text-white my-2">Display Results:</p> </strong>
                <p>Clicking on the question code, displayed above the question, displays the question results.</p>
                
            
                <strong> <p class="text-xl font-semibold text-white my-2">Filter Questions:</p> </strong>
                <p>On the dashboard page, above the created questions, there is a filter where the user can filter their questions by lesson or creation date.</p>

            
                <strong> <p class="text-xl font-semibold text-white my-2">Close Voting:</p> </strong>
                <p>The user can close a question by clicking the edit button and setting "Active" to "No".</p>
            
                <strong> <p class="text-xl font-semibold text-white my-2">Export Questions and Answers:</p> </strong>
                <p>User can export questions and answers to an external file (csv, json, xml).</p>
            
                    </div>

        <h3 class="text-white mb-4 bg-teal-500 p-2 rounded font-bold text-center">ADMINISTRATOR:</h3>

        <p class="text-gray-200 mt-4">An Administrator has the same functionalities as a logged-in user.</p>
        <p class="text-gray-200 ">Plus:</p>

<div class="list-decimal list-inside text-gray-200 mb-2">
    
<strong> <p class="text-xl font-semibold text-white my-2">Access to the voting questions:</p> </strong>
        <p>The administrator has access to the voting questions of all logged-in users with the ability to filter by selected users on the dashboard page.</p>
    
        <strong> <p class="text-xl font-semibold text-white my-2">Creating New Voting Questions:</p> </strong>
        <p>When the administrator creates a new voting question, they must specify on whose behalf they are doing it.</p>
        <p>The administrator clicks on the "Create new question" button where there is a dropdown to select a user, and then selects the user.</p>
    
        <strong> <p class="text-xl font-semibold text-white my-2">Managing Users:</p> </strong>
        <p>When logged in as an administrator, there is a "Users" tab next to the "Dashboard" tab, where all users and administrators of the site are displayed.</p>
        <p>The administrator can manage registered users ( change passwords and change their roles, names, delete them or create new user) using buttons. </p>
    
        </div>

        @if (!isset($forPdf))
        <div class="my-4">
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
