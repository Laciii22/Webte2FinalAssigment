@vite(['resources/css/app.css', 'resources/js/app.js'])


<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-teal-100 to-teal-300">

    <div class="py-12 w-1/2 relative">
        <img src="https://i.pngimg.me/thumb/f/720/m2H7K9Z5i8G6d3G6.jpg" class="absolute top-20 right-20 w-32 h-32 rounded-full ring-4 ring-teal-600" alt="Voting Badge">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">Code: {{ $question->code }}</h2>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Title: {{ $question->title }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Body: {{ $question->body }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Active: {{ $question->active }}
                </div>

                @if($question->category == 'text')
                <form action="{{ route('submitResponse') }}" method="POST">
                    @csrf
                    <input type="hidden" name="question_code" value="{{ $question->code }}">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <input type="text" name="text_input" placeholder="Enter text here">
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit
                            Text</button>
                    </div>
                </form>
                @else
                <form action="{{ route('submitResponse', $question->code) }}" method="POST">
                    @csrf
                    <input type="hidden" name="question_code" value="{{ $question->code }}">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @foreach($responses as $response)
                        <input id="teal-radio-{{ $response->id }}" type="radio" name="response[]" value="{{ $response->id }}" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="teal-radio-{{ $response->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $response->selected_value }}</label>
                        <br>
                        @endforeach
                    </div>

                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit
                            Options</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>